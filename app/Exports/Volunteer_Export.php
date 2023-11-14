<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Volunteer_Export implements  FromCollection,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
 
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
}
