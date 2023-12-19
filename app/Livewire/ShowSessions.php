<?php

namespace App\Livewire;

use App\Models\Session;
use Livewire\Component;

class ShowSessions extends Component
{
    public $boxes = [];
    public function show(int $id): void
    {
        $this->redirectRoute('sessions.show', $id);
    }
    public function render()
    {
        return view('livewire.show-sessions')->with([
            'sessions' => Session::latest()->paginate(10)->withQueryString()
        ]);
    }
}
