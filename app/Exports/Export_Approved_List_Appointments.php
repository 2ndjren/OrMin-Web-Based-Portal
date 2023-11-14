<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class Export_Approved_List_Appointments implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $matchedData = DB::table('appointments')
        ->join('user', 'appointments.u_id', '=', 'user.id')
        ->where('appointments.status','APPROVED')
        ->select('user.id','user.fname','user.mname','user.lname','appointments.app_date', 'appointments.app_time')
        ->limit(10)
        ->get();
        return $matchedData;
    }
    public function headings ():array{
        return ['ID','First Name','Middle Name','Last Name','Date','Time'];
    }
}
