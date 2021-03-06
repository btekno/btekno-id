<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Livewire\Component;

class Appearance extends Component
{
    public $listeners = [
        'toggledMode' => 'render',
    ];
    public User $user;

    public function mount()
    {
        $this->user = me();
    }

    public function toggleMode($mode)
    {
        $this->user->dark_mode = $mode;
        $this->user->save();
        $this->emit('toggledMode');
        
        logify(request(), 'User', me(), 'Toggled appearance');

        return redirect()->route('member.settings.appearance');
    }

    public function render(): View
    {
        return view('livewire.member.settings.appearance');
    }
}
