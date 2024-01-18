<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Export_Waiting_Appointments;
use App\Exports\Membership_Export;
use App\Exports\Volunteer_Export;
use App\Http\Controllers\Controller;
use App\Models\appointments;
use App\Models\insurance;
use App\Models\volunteers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class Generate_Reports extends Controller
{
    //
    public function Membership_exportFilteredData(Request $request)
    {
        session()->forget('Export_Membership');
        $rules=[
            'status'=>'required',
            'year'=>'required',
            'level'=>'required',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'All fields are required!']);
        }
        $status = strtoupper($request->status);
        $year = $request->year;
        $level = strtoupper($request->level);

        // Query the database with the condition
        if($status=="DECLINED" || $status == "PENDING"){
            $check = insurance::select('mem_id','fname','mname','lname','birthday','barangay_street','barangay','municipality','level')->where('level',$level)->where('status', $status)->where('created_at','LIKE','%'.$year.'%')->count();

        }else{
            $check = insurance::select('mem_id','fname','mname','lname','birthday','barangay_street','barangay','municipality','level')->where('level',$level)->where('status', $status)->where('start_at','LIKE','%'.$year.'%')->count();
         
        }
  
        if($check > 0){
            $data=[
                'level'=>$level,
                'status'=>$status,
                'year'=>$year,
            ];
           session()->put('Export_Membership',$data);
           if(session()->has('Export_Membership')){
                return response()->json(['success'=>'Results found!']);

           }else{
           return response()->json(['failed'=>session()]);

           }
        }else{
            return response()->json(['failed'=>'No results found!']);

        }

        // Perform any additional processing on $filteredData if needed

    }


    public function Export_Membership(){
        $level = session('Export_Membership')['level'];
        $status = session('Export_Membership')['status'];
        $year = session('Export_Membership')['year'];
    
        if ($status == "DECLINED" || $status == "PENDING") {
            $collection = insurance::select('fname','lname','birthday', 'municipality','type_of_payment','start_at','end_at','level', 'mem_id', 'OR#')
                ->where('level', $level)
                ->where('status', $status)
                ->where('created_at', 'LIKE', '%' . $year . '%')
                ->get();
        } else {
            $collection = insurance::select('fname','lname','birthday', 'municipality','type_of_payment','start_at','end_at','level', 'mem_id', 'OR#')
                ->where('level', $level)
                ->where('status', $status)
                ->where('start_at', 'LIKE', '%' . $year . '%')
                ->get();
        }
    
        return Excel::download(new Membership_Export($collection), 'PRC ORMIN_Membership.xlsx');
    }


   
    
    // public function Volunteer_exportFilteredData(Request $request)
    // {
    //     session()->forget('Export_Volunteer');
    //     $rules = [
    //         'municipal' => 'required',
    //         'status' => 'required',
    //         'year' => 'required',
    //     ];
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return response()->json(['failed' => 'All fields are required!']);
    //     }
    
    //     $municipal = strtoupper($request->municipal);
    //     $barangay = strtoupper($request->barangay);
    //     $year = $request->year;
    //     $status = strtoupper($request->status);
    
    //     // Query the database with the condition
    //     $filteredData = volunteers::where('municipal', 'LIKE', '%' . $municipal . '%')
    //         ->when($status == "EXPIRED" || $status == "VALIDATED", function ($query) use ($status, $year) {
    //             return $query->where('status', $status)->where('created_at', 'LIKE', '%' . $year . '%');
    //         })
    //         ->when(!($status == "EXPIRED" || $status == "VALIDATED"), function ($query) use ($status, $year) {
    //             return $query->where('status', $status)->where('created_at', 'LIKE', '%' . $year . '%');
    //         })
    //         ->get();
    
    //     if ($filteredData->count() > 0) {
    //         $data = [
    //             'municipal' => $municipal,
    //             'barangay' => $barangay,
    //             'status' => $status,
    //             'year' => $year,
    //         ];
    
    //         session()->put('Export_Volunteer', $data);
    
    //         return response()->json(['success' => 'Results found!', 'preview' => $filteredData]);
    //     } else {
    //         return response()->json(['failed' => 'No results found!']);
    //     }
    // }
    
    // public function Export_Volunteer()
    // {
    //     $municipal = session('Export_Volunteer')['municipal'];
    //     $barangay = session('Export_Volunteer')['barangay'];
    //     $status = session('Export_Volunteer')['status'];
    //     $year = session('Export_Volunteer')['year'];
    
    //     $collection = volunteers::select('fname', 'mname', 'lname', 'phone_no', 'barangay', 'municipal', 'role')
    //         ->where('municipal', $municipal)
    //         ->where('status', $status)
    //         ->where('created_at', 'LIKE', '%' . $year . '%')
    //         ->get();
    
    //     return Excel::download(new Volunteer_Export($collection), 'Volunteer.xlsx');
    // }

    public function Volunteer_exportFilteredData(Request $request)
    {
        session()->forget('Export_Volunteer');

        
    
        // Get input values from query parameters
        $municipal = strtoupper($request->query('municipal'));
        $year = $request->query('year');
        $status = strtoupper($request->query('status'));
    
        // Validation rules
        $rules = [
            'municipal' => 'required',
            'status' => 'required',
            'year' => 'required',
        ];
    
        // Validation
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['failed' => 'All fields are required!']);
        }
    
        // Query the database with the conditions


        $filteredData = volunteers::where('municipal', 'LIKE', '%' . $municipal . '%')
                ->when($status == "EXPIRED" || $status == "VALIDATED", function ($query) use ($status, $year) {
                    return $query->where('status', $status)->where('created_at', 'LIKE', '%' . $year . '%');
                })
                ->when(!($status == "EXPIRED" || $status == "VALIDATED"), function ($query) use ($status, $year) {
                    return $query->where('status', $status)->where('created_at', 'LIKE', '%' . $year . '%');
                })
                ->get();

        // Check if data is found
        if ($filteredData->count() > 0) {
            // Store data in session
            $data = [
                'municipal' => $municipal,
                'status' => $status,
                'year' => $year,
            ];
    
            session()->put('Export_Volunteer', $data);
    
            // Return data to the view
            return response()->json($data);
        } else {
            return response()->json(['failed' => 'No results found!']);
        }
    }
    
    
    public function Export_Volunteer()
    {
        $municipal = session('Export_Volunteer')['municipal'];
        // $barangay = session('Export_Volunteer')['barangay'];
        $status = session('Export_Volunteer')['status'];
        $year = session('Export_Volunteer')['year'];
    
        $collection = volunteers::select('fname', 'mname', 'lname', 'phone_no', 'barangay', 'municipal', 'role')
            ->where('municipal', $municipal)
            ->where('status', $status)
            ->where('created_at', 'LIKE', '%' . $year . '%')
            ->get();
    
        return Excel::download(new Volunteer_Export($collection), 'Volunteer.xlsx');
    }
    
}
