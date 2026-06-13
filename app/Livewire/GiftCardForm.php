<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\GiftCard;
use Illuminate\Support\Str;

class GiftCardForm extends Component
{
    public $recipient_name = '';
    public $amount = '500';
    public $design = 'gold';
    public $message = '';
    public $cardNumber = '';
    public $cardExpiry = '';
    public $cardCvc = '';
    public $isSuccess = false;

    protected $rules = [
        'recipient_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:1',
        'design' => 'required|string|in:gold,silver,platinum',
        'message' => 'nullable|string',
        'cardNumber' => 'required|string|min:16',
        'cardExpiry' => 'required|string',
        'cardCvc' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        // Simulate payment processing here...
        
        $code = 'LUXE-GIFT-' . strtoupper(Str::random(6));

        GiftCard::create([
            'recipient_name' => $this->recipient_name,
            'amount' => $this->amount,
            'design' => $this->design,
            'message' => $this->message,
            'code' => $code,
            'status' => 'active',
        ]);

        $this->reset(['recipient_name', 'cardNumber', 'cardExpiry', 'cardCvc']);
        $this->amount = '500';
        $this->design = 'gold';
        $this->message = '';
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.gift-card-form');
    }
}
