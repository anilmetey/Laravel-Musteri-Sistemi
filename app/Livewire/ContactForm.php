<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\ContactMessage;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $subject = 'Genel Sorular & Bilgi';
    public $message = '';
    public $isSuccess = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'unread',
        ]);

        $this->reset(['name', 'email', 'phone', 'message']);
        $this->subject = 'Genel Sorular & Bilgi';
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
