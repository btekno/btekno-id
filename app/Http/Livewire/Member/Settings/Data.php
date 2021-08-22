<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Livewire\Component;

class Data extends Component
{
    public User $user;
    public $confirming;

    public function mount()
    {
        $this->user = me();
    }

    // public function render()
    // {
    //     return view('livewire.member.settings.data');
    // }
}
