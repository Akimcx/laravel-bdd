<?php

namespace App\Traits;

use Livewire\Attributes\Url;


trait FilterBar
{

    #[Url(as: 'ss')]
    public $schoolsProperty = [];
    #[Url(as: 'ps')]
    public $instructorsProperty = [];
    #[Url(as: 'cs')]
    public $coursesProperty = [];
    public function rset(...$properties): void
    {
        $this->reset(...$properties);
    }
}
