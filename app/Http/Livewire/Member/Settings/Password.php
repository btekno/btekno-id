<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;

class Password extends Component
{
    public User $user;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public function mount()
    {
        $this->user = me();
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'currentPassword' => ['required'],
            'newPassword'     => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'same:newPassword'],
        ]);
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => ['required'],
            'newPassword'     => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'same:newPassword'],
        ]);

        if(!Hash::check($this->currentPassword, me()->password)):
            toast($this, 'error', 'Current password does not match!');
        endif;

        me()->password = Hash::make($this->newPassword);
        me()->plain = base64_encode($this->newPassword);
        me()->save();
        
        logify(request(), 'User', me(), 'Changed account password');

        return toast($this, 'success', 'Your password has been changed!');
    }
}
