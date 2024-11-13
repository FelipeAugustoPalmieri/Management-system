<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class CollaboratorsExport implements FromCollection
{
    protected $collaborators;

    public function __construct(Collection $collaborators)
    {
        $this->collaborators = $collaborators;
    }

    public function collection()
    {
        return $this->collaborators;
    }
}
