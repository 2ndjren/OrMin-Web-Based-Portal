<?php

namespace App\Exports;

use App\Models\insurance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpParser\Node\Expr\Cast\Int_;
use Ramsey\Uuid\Type\Integer;

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
        return $this->data;
    }
    
  


}
