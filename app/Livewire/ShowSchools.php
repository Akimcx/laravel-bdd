<?php

namespace App\Livewire;

use App\Models\School;
use Livewire\Component;

class ShowSchools extends Component
{

    public function show(int $id): void
    {
        $this->redirectRoute('schools.show', $id, navigate: true);
    }
    public function render()
    {
        return view('livewire.show-schools')->with([
            'schools' => School::all(),
        ]);
    }
}
