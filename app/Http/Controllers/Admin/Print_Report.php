<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\insurance;
use Illuminate\Http\Request;

class Print_Report extends Controller
{
    //
    public function Print_View(){
        return view('Print.print');
    }
    public function Annual_Print_Report(Request $request){
        $report=$request->annual_report;
        if($report!=null){
            $check=insurance::whereYear("start_at",$report)->count();
            if($check>0){
            $annual_report_classic=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','CLASSIC')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_bronze=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','BRONZE')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_silver=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SILVER')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_gold=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','GOLD')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_platinum=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','PLATINUM')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_senior=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SENIOR')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_report_senior_plus=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SENIOR PLUS')->whereYear('start_at',$report)->groupBy('level')->sum('amount');
            $annual_data=[
                'annual_year'=>$request->annual_report,
                'annual_classic'=>$annual_report_classic,
                    'annual_bronze'=>$annual_report_bronze,
                    'annual_silver'=>$annual_report_silver,
                    'annual_gold'=>$annual_report_gold,
                    'annual_platinum'=>$annual_report_platinum,
                    'annual_senior'=>$annual_report_senior,
                    'annual_senior_plus'=>$annual_report_senior_plus,
            ];
            $data=[
                'success'=>'Result found!',
                'annual'=>$annual_data
                    
            ];
                return response()->json($data);
            }else if($check<=0){
                return response()->json(['failed'=>'No results found!']);
            }
            else{
                return response()->json(['failed'=>'All fields are required!']);

            }
        }

    }
    public function Monthly_Print_Report(Request $request){
        $year=$request->monthly_sales_year;
        $month=$request->monthly_sales_month;
        if($year!=null && $month !=null){
            $check=insurance::whereYear("start_at",$year)->count();
            if($check>0){
            $monthly_report_classic=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','CLASSIC')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_bronze=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','BRONZE')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_silver=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SILVER')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_gold=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','GOLD')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_platinum=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','PLATINUM')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_senior=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SENIOR')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly_report_senior_plus=insurance::select('level','amount')->whereIn('status',['ACTIVATED','EXPIRED'])->where('level','SENIOR PLUS')->whereYear('start_at',$year)->whereMonth('start_at',$month)->groupBy('level')->sum('amount');
            $monthly=[
                'monthly_year'=>$year,
                'month_of_sales'=>$month,
                'monthly_classic'=>$monthly_report_classic,
                    'monthly_bronze'=>$monthly_report_bronze,
                    'monthly_silver'=>$monthly_report_silver,
                    'monthly_gold'=>$monthly_report_gold,
                    'monthly_platinum'=>$monthly_report_platinum,
                    'monthly_senior'=>$monthly_report_senior,
                    'monthly_senior_plus'=>$monthly_report_senior_plus,
            ];
            $data=[
                'success'=>'Result found!',
                'monthly'=>$monthly
                    
            ];
                return response()->json($data);
            }else if($check<=0){
                return response()->json(['failed'=>'No results found!']);
            }
            else{
                return response()->json(['failed'=>'All fields are required!']);

            }
        }

    }
    public function Membership_per_Program_Print_Report(Request $request){
        $level=$request->level;
        $year=$request->year;
        if($level!=null && $year!=null ){
            $check=insurance::where('level',$level)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->count();

            if($check>0){
            $membership_per_program_data=insurance::where('level',$level)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->get();
            
            $program=[
                'year'=>$year,
                'program'=>$level,
                'level'=>$membership_per_program_data,
           
            ];
            $data=[
                'success'=>'Result found!',
                'program'=>$program
                    
            ];
                return response()->json($data);
            }else if($check<=0){
                return response()->json(['failed'=>'No results found!']);
            }
            else{
                return response()->json(['failed'=>'All fields are required!']);

            }
        }

    }
    public function Membership_per_Municipality_Print_Report(Request $request){
        $municipality=$request->municipality;
        $year=$request->year;
        if($municipality!=null&&$year!=null ){
            $check=insurance::where('municipality',$municipality)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->count();

            if($check>0){
            $membership_per_program_data=insurance::where('municipality',$municipality)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->get();
            
            $municipal_data=[
                'year'=>$year,
                'municipality'=>$municipality,
                'members'=>$membership_per_program_data,
           
            ];
            $data=[
                'success'=>'Result found!',
                'municipal_data'=>$municipal_data
                    
            ];
                return response()->json($data);
            }else if($check<=0){
                return response()->json(['failed'=>'No results found!']);
            }
            else{
                return response()->json(['failed'=>'All fields are required!']);

            }
        }   else{
            return response()->json(['failed'=>'All fields are required!']);

        }

    }
    public function Membership_per_Barangay_Print_Report(Request $request){
        $municipality=$request->municipality;
        $barangay=$request->barangay;
        $year=$request->year;
        if($municipality!=null &&$barangay!=null &&$year!=null ){
            $check=insurance::where('municipality',$municipality)->where('barangay','LIKE',$barangay)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->count();

            if($check>0){
            $membership_per_program_data=insurance::where('municipality',$municipality)->where('barangay','LIKE',$barangay)->whereIn('status',['ACTIVATED','EXPIRED'])->whereYear('start_at',$year)->get();
            
            $municipal_data=[
                'year'=>$year,
                'municipality'=>$municipality,
                'barangay'=>$barangay,
                'members'=>$membership_per_program_data,
           
            ];
            $data=[
                'success'=>'Result found!',
                'barangay_data'=>$municipal_data
                    
            ];
                return response()->json($data);
            }else if($check<=0){
                return response()->json(['failed'=>'No results found!']);
            }
            else{
                return response()->json(['failed'=>'All fields are required!']);

            }
        }
        else{
            return response()->json(['failed'=>'All fields are required!']);

        }

    }
}
