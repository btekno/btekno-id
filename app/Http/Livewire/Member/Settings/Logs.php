<?php

namespace App\Http\Livewire\Member\Settings;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class Logs extends Component
{
    use WithPagination;

    public User $user;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->user = me();
    }

    public function render(): View
    {
        $activities = Activity::causedBy($this->user)
            ->latest()
            ->paginate(10);

        return view('livewire.member.settings.logs', [
            'activities' => $activities,
        ]);
    }
}
