<?php

namespace App\Exports;

use App\Models\insurance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class Membership_Export implements FromCollection,ShouldAutoSize
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
    // Ensure the $this->data is a collection
    $collection = collect($this->data)->map(function ($item, $key) {
        return array_merge(['No.' => $key + 1], $item->toArray());
    });

    return $collection;
}


    public function headings(): array
    {
        // Define headers here
        return [
            'N0',
            'FIRST NAME',
            'LAST NAME',
            'BIRTHDAY',
            'ADDR/ORG/CO',
            'PAYMENT',
            'DATE OF REGISTRATION',
            'VALIDITY END',
            'PROGRAM',
            'PRC ID',
            'OR#',

        ];
    }
}

