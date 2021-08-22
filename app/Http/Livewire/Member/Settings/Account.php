<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use App\Rules\ReservedSlug;
use Livewire\Component;

class Account extends Component
{
    public User $user;
    public $username;
    public $email;

    public function mount()
    {
        $this->user = me();
        $this->username = $this->user->username;
        $this->email = $this->user->email;
    }

    public function enrollPrivate()
    {
        $this->user->is_private = ! $this->user->is_private;
        $this->user->save();

        $this->emit('enrolledPrivate');
        if($this->user->is_private):
            logify(request(), 'User', me(), 'Enrolled as a private user');
            return toast($this, 'success', 'All your information are now private.');
        endif;

        logify(request(), 'User', me(), 'Enrolled as a public user');

        return toast($this, 'success', 'All your information are now public.');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'username' => ['required', 'min:2', 'max:20', 'alpha_dash', 'unique:users,username,'.$this->user->id, new ReservedSlug()],
            'email'    => ['required', 'email', 'max:255', 'indisposable', 'unique:users,email,'.$this->user->id],
        ]);
    }

    public function updateAccount()
    {
        $this->validate([
            'username' => ['required', 'min:2', 'max:20', 'alpha_dash', 'unique:users,username,'.$this->user->id, new ReservedSlug()],
            'email'    => ['required', 'email', 'max:255', 'indisposable', 'unique:users,email,'.$this->user->id],
        ]);

        $this->user->username = $this->username;
        if($this->email !== $this->user->email):
            $this->user->email_verified_at = null;
            $this->user->sendEmailVerificationNotification();
        endif;

        $this->user->email = $this->email;
        $this->user->save();
        
        $this->emit('accountUpdated');
        logify(request(), 'User', me(), 'Updated account settings');
        return toast($this, 'success', 'Your account has been updated!');
    }
}
