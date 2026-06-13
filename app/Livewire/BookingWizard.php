<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingWizard extends Component
{
    public bool $showWizard = false;
    public int $step = 1;

    // Selections
    public ?int $service_id = null;
    public ?int $employee_id = null;
    public ?string $date = null;
    public ?string $time = null;

    // Customer info
    public string $customer_name = '';
    public string $customer_email = '';
    public string $customer_phone = '';

    // Promo Code Simulation
    public string $promoCode = '';
    public float $discountAmount = 0.0;
    public string $promoError = '';
    public string $promoSuccess = '';

    protected $rules = [
        1 => ['service_id' => 'required|exists:services,id'],
        2 => ['employee_id' => 'required|exists:employees,id'],
        3 => ['date' => 'required|date', 'time' => 'required'],
        4 => [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ],
    ];

    public function mount()
    {
        $this->date = Carbon::tomorrow()->format('Y-m-d');

        if (auth()->check()) {
            $user = auth()->user();
            $this->customer_name = $user->name;
            $this->customer_email = $user->email;
        }

        // Capture query parameter selections
        if (request()->has('service')) {
            $this->service_id = (int) request('service');
        }
        if (request()->has('employee')) {
            $this->employee_id = (int) request('employee');
        }

        // Determine step based on pre-selections
        if ($this->service_id && $this->employee_id) {
            $this->step = 3; // Go straight to Date & Time selection
            $this->showWizard = true;
        } elseif ($this->service_id) {
            $this->step = 2; // Go to Employee selection
            $this->showWizard = true;
        } elseif ($this->employee_id) {
            $this->step = 1; // Start at Service selection
            $this->showWizard = true;
        }
    }

    public function startWizard()
    {
        $this->showWizard = true;
    }

    public function selectService($id)
    {
        $this->service_id = $id;
        $this->promoCode = '';
        $this->discountAmount = 0.0;
        $this->promoError = '';
        $this->promoSuccess = '';
        $this->nextStep();
    }

    public function applyPromoCode()
    {
        $code = strtoupper(trim($this->promoCode));
        $service = Service::find($this->service_id);
        
        if (!$service) {
            $this->promoError = 'Lütfen önce bir hizmet seçin.';
            return;
        }

        if ($code === 'LUXE20') {
            $this->discountAmount = $service->price * 0.20;
            $this->promoSuccess = '%20 Luxe indirim uygulandı!';
            $this->promoError = '';
        } elseif ($code === 'WELCOME100') {
            $this->discountAmount = min($service->price, 100.0);
            $this->promoSuccess = '100 ₺ Hoş geldin indirimi uygulandı!';
            $this->promoError = '';
        } elseif ($code === 'SPECIAL50') {
            $this->discountAmount = min($service->price, 50.0);
            $this->promoSuccess = '50 ₺ Özel indirim uygulandı!';
            $this->promoError = '';
        } else {
            $this->promoError = 'Geçersiz indirim kodu.';
            $this->promoSuccess = '';
            $this->discountAmount = 0.0;
        }
    }

    public function selectEmployee($id)
    {
        $this->employee_id = $id;
        $this->nextStep();
    }

    public function selectTime($time)
    {
        $this->time = $time;
        $this->nextStep();
    }

    public function nextStep()
    {
        $this->validate($this->rules[$this->step]);
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function confirmBooking()
    {
        $this->validate($this->rules[4]);

        $this->step = 5; // Go to Payment step
    }

    public function processPayment()
    {
        // Simulate payment processing delay
        sleep(1);
        
        $service = Service::find($this->service_id);
        
        $start_time = Carbon::parse($this->date . ' ' . $this->time);
        $end_time = $start_time->copy()->addMinutes($service->duration_minutes);

        // Lock for update to prevent double booking
        $success = DB::transaction(function () use ($start_time, $end_time) {
            // Check for overlaps with pessimistic lock (start_time < new_end_time AND end_time > new_start_time)
            $conflict = Appointment::where('employee_id', $this->employee_id)
                ->where('start_time', '<', $end_time)
                ->where('end_time', '>', $start_time)
                ->lockForUpdate()
                ->first();

            if ($conflict) {
                return false;
            }

            $appointment = Appointment::create([
                'service_id' => $this->service_id,
                'employee_id' => $this->employee_id,
                'user_id' => auth()->id(), // Assign logged in user if any
                'customer_name' => $this->customer_name,
                'customer_email' => $this->customer_email,
                'customer_phone' => $this->customer_phone,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'status' => 'confirmed'
            ]);

            // Senkron veya kuyruklu mail gönderimi (şu an senkron)
            \Illuminate\Support\Facades\Mail::to($this->customer_email)->send(new \App\Mail\BookingConfirmed($appointment));
            
            return true;
        });

        if (!$success) {
            $this->addError('time', 'Seçilen saatte randevu alınmış. Lütfen başka bir saat seçin.');
            $this->step = 3;
            return;
        }

        $this->step = 6; // Success step
    }

    public function getAvailableTimeSlots()
    {
        if (!$this->service_id || !$this->employee_id || !$this->date) {
            return [];
        }

        $service = Service::find($this->service_id);
        $duration = $service->duration_minutes;

        // Varsayılan çalışma saatleri: 09:00 - 18:00
        $startOfDay = Carbon::parse($this->date . ' 09:00:00');
        $endOfDay = Carbon::parse($this->date . ' 18:00:00');

        $appointments = Appointment::where('employee_id', $this->employee_id)
            ->whereDate('start_time', $this->date)
            ->get();

        $slots = [];
        $current = $startOfDay->copy();
        $now = Carbon::now();

        while ($current->copy()->addMinutes($duration)->lte($endOfDay)) {
            $slotStart = $current->copy();
            $slotEnd = $current->copy()->addMinutes($duration);

            $isAvailable = true;
            
            // Eğer tarih bugünse ve slot başlama saati şu andan (ve +1 saat hazırlık payından) önceyse randevu alınamaz
            if ($this->date === $now->format('Y-m-d') && $slotStart->lt($now->copy()->addHours(1))) {
                $isAvailable = false;
            } else {
                foreach ($appointments as $appointment) {
                    // If the slot overlaps with an appointment
                    if ($slotStart->lt($appointment->end_time) && $slotEnd->gt($appointment->start_time)) {
                        $isAvailable = false;
                        break;
                    }
                }
            }

            if ($isAvailable) {
                $slots[] = $slotStart->format('H:i');
            }

            $current->addMinutes($duration);
        }

        return $slots;
    }

    public function render()
    {
        return view('livewire.booking-wizard', [
            'services' => Service::where('is_active', true)->get(),
            'employees' => Employee::where('is_active', true)->get(),
            'timeSlots' => $this->step === 3 ? $this->getAvailableTimeSlots() : [],
            'selectedService' => $this->service_id ? Service::find($this->service_id) : null,
            'selectedEmployee' => $this->employee_id ? Employee::find($this->employee_id) : null,
        ]);
    }
}
