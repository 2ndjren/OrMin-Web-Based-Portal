<?php

namespace App\Exports;

use App\Models\volunteers;
use Maatwebsite\Excel\Concerns\FromCollection;

class Export_Volunteers implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        
        $data = volunteers::where('status','VALIDATED')->limit(50)-> get();
        return $data;
        
    }
    

}
