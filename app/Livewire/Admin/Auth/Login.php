<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    public $mobile;
    public $password;
    public $remember;

    public function render()
    {
        return view('livewire.admin.auth.login');
    }

    public function checkLogin()
    {
        $this->validate([
            'mobile' => ['required', 'min:11'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt(['mobile' => $this->mobile, 'password' => $this->password], $this->remember)) {
            return  redirect()->route('admin.home');
        }

        $alert = new LivewireAlert($this);
        $alert->title('ورود ناموفق')
            ->text('ایمیل یا پسورد اشتباه است')
            ->error()
            ->show();
    }
}
