<?php

namespace App\Livewire;

use App\Models\Session;
use App\Traits\FilterBar;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSessions extends Component
{
    use WithPagination, FilterBar;

    public $boxes = [];

    public function show(int $id): void
    {
        $this->redirectRoute('sessions.show', $id);
    }

    public function sortAsc($key): void
    {
    }

    public function sortDesc($key): void
    {
    }

    public function render()
    {
        return view('livewire.show-sessions')->with([
            'sessions' => Session::with('school', 'course', 'instructor')
                ->when(
                    $this->schoolsProperty,
                    fn ($q) =>
                    $q->schools($this->schoolsProperty)
                )
                ->when(
                    $this->coursesProperty,
                    fn ($q) =>
                    $q->courses($this->coursesProperty)
                )
                ->when(
                    $this->instructorsProperty,
                    fn ($q) =>
                    $q->instructors($this->instructorsProperty)
                )
                ->latest()
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
