<?php

namespace App\Livewire\Web\ContactUs;

use App\Models\ContactUs;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $mobile;
    public $message;

    public function render()
    {
        return view('livewire.web.contact-us.index');
    }

    public function storeContact()
    {
        $this->validate([
            'name' => 'required|string',
            'mobile' => 'nullable|string',
            'message' => 'required|string',
        ]);

        $contactUs = ContactUs::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'message' => $this->message,
        ]);

        if ($contactUs) {
            $this->reset();
            return Alert($this, __('contact.success'), __('contact.message_saved_success'), 'success');
        }
    }
}
