<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\appointments;
use App\Models\donations;
use App\Models\insurance;
use App\Models\municipality;
use App\Models\user;
use App\Models\volunteers;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function Dashboard(){
        if(session('ADMIN') || session('STAFF')){
        
        return view('Admin.dashboard');
        }
        elseif (session('USER')) {
          return redirect('/');
        }
        else{
          return redirect('signin');
        }
        
    }
    public function Charity_Donations(){
      $year= date('Y');
      $today=date('Y-m-d');
      $mon= date('m', strtotime($today));
      $annual=donations::whereYear('created_at',$year)->sum('donated_amount');
      $monthly=donations::whereMonth('created_at',$mon)->sum('donated_amount');
      $data=[
        'annual'=>$annual,
        'monthly'=>$monthly,
        'year'=>$year,
        'mon'=>$mon,
      ];
      return response()->json($data);

    }
    public function User_Accounts(){
      $user=user::where('account_status','VERIFIED')->where('type','USER')->count();
      $staff=user::where('account_status','VERIFIED')->where('type','STAFF')->count();
      $admin=user::where('account_status','VERIFIED')->where('type','ADMIN')->count();

      $data=[
        'user'=>$user,
        'staff'=>$staff,
        'admin'=>$admin,
      ];
      return response()->json($data);
    }
    public function Membeship_Program_Counts(){
      $count=[];
      $classic=insurance::where('level','CLASSIC')->where('status','ACTIVATED')->count();
      $bronze=insurance::where('level','BRONZE')->where('status','ACTIVATED')->count();
      $silver=insurance::where('level','SILVER')->where('status','ACTIVATED')->count();
      $gold=insurance::where('level','GOLD')->where('status','ACTIVATED')->count();
      $platinum=insurance::where('level','PLATINUM')->where('status','ACTIVATED')->count();
      $senior=insurance::where('level','SENIOR')->where('status','ACTIVATED')->count();
      $senior_plus=insurance::where('level','SENIOR PLUS')->where('status','ACTIVATED')->count();
      $data=[
        'bronze'=>$bronze,
        'classic'=>$classic,
        'silver'=>$silver,
        'gold'=>$gold,
        'platinum'=>$platinum,
        'senior'=>$senior,
        'senior_plus'=>$senior_plus,

      ];
      return response()->json($data);
      
    }
    public function Memberships_Count_Per_Municipalities(){

      $puerto_galera=insurance::where('municipality','PUERTO GALERA')->where('status','ACTIVATED')->count();
      $san_teodoro=insurance::where('municipality','SAN TEODORO')->where('status','ACTIVATED')->count();
      $baco=insurance::where('municipality','BACO')->where('status','ACTIVATED')->count();
      $calapan_city=insurance::where('municipality','LIKE','CALAPAN')->where('status','ACTIVATED')->count();
      $naujan=insurance::where('municipality','NAUJAN')->where('status','ACTIVATED')->count();
      $victoria=insurance::where('municipality','VICTORIA')->where('status','ACTIVATED')->count();
      $socorro=insurance::where('municipality','SOCORRO')->where('status','ACTIVATED')->count();
      $pola=insurance::where('municipality','POLA')->where('status','ACTIVATED')->count();
      $pinamalayan=insurance::where('municipality','PINAMALAYAN')->where('status','ACTIVATED')->count();
      $gloria=insurance::where('municipality','GLORIA')->where('status','ACTIVATED')->count();
      $bansud=insurance::where('municipality','BANSUD')->where('status','ACTIVATED')->count();
      $bongabong=insurance::where('municipality','BONGABONG')->where('status','ACTIVATED')->count();
      $roxas=insurance::where('municipality','ROXAS')->where('status','ACTIVATED')->count();
      $mansalay=insurance::where('municipality','MANSALAY')->where('status','ACTIVATED')->count();
      $bulalacao=insurance::where('municipality','BULALACAO')->where('status','ACTIVATED')->count();

      $data=[

        'puerto_galera'=>$puerto_galera,
        'san_teodoro'=>$san_teodoro,
        'baco'=>$baco,
        'calapan_city'=>$calapan_city,
        'naujan'=>$naujan,
        'victoria'=>$victoria,
        'socorro'=>$socorro,
        'pola'=>$pola,
        'pinamalayan'=>$pinamalayan,
        'gloria'=>$gloria,
        'bansud'=>$bansud,
        'bongabong'=>$bongabong,
        'roxas'=>$roxas,
        'mansalay'=>$mansalay,
        'bulalacao'=>$bulalacao,
 

      ];
      return response()->json($data);
      
    }
    public function Memberships_Dashboard_Main(){
      $now= date('Y');
      $month_now= date('Y-m');
      $annual_sales= insurance::where('status','ACTIVATED')->where('start_at','LIKE','%'.$now.'%')->sum('amount');
      $monthly_sales= insurance::where('status','ACTIVATED')->where('start_at','LIKE','%'.$month_now.'%')->sum('amount');
      $activated= insurance::where('status','ACTIVATED')->count();
      $pending= insurance::where('status','PENDING')->count();
      $expired= insurance::where('status','EXPIRED')->count();
      $declined= insurance::where('status','DECLINED')->count();




      $classic=insurance::where('level','CLASSIC')->where('status','ACTIVATED')->sum('amount');
      $bronze=insurance::where('level','BRONZE')->where('status','ACTIVATED')->sum('amount');
      $silver=insurance::where('level','SILVER')->where('status','ACTIVATED')->sum('amount');
      $gold=insurance::where('level','GOLD')->where('status','ACTIVATED')->sum('amount');
      $platinum=insurance::where('level','PLATINUM')->where('status','ACTIVATED')->sum('amount');
      $senior=insurance::where('level','SENIOR')->where('status','ACTIVATED')->sum('amount');
      $senior_plus=insurance::where('level','SENIOR PLUS')->where('status','ACTIVATED')->sum('amount');


      $data=[
        'annual_sales'=>$annual_sales,
        'monthly_sales'=>$monthly_sales,
        'activated'=>$activated,
        'pending'=>$pending,
        'expired'=>$expired,
        'declined'=>$declined,
        'bronze'=>$bronze,
        'classic'=>$classic,
        'silver'=>$silver,
        'gold'=>$gold,
        'platinum'=>$platinum,
        'senior'=>$senior,
        'senior_plus'=>$senior_plus,
      ];
      return response()->json($data);
    }


    // APPROVED AND ONGOING 




    public function Volunteers_Per_Municipalities(){
      $puerto_galera= volunteers::where('status','VALIDATED')->where('municipal','LIKE','PUERTO GALERA')->count();
      $san_teodoro= volunteers::where('status','VALIDATED')->where('municipal','LIKE','SAN TEODORO')->count();
      $baco= volunteers::where('status','VALIDATED')->where('municipal','LIKE','BACO')->count();
      $calapan_city= volunteers::where('status','VALIDATED')->where('municipal','LIKE','CALAPAN')->count();
      $naujan= volunteers::where('status','VALIDATED')->where('municipal','LIKE','NAUJAN')->count();
      $victoria= volunteers::where('status','VALIDATED')->where('municipal','LIKE','VICTORIA')->count();
      $socorro= volunteers::where('status','VALIDATED')->where('municipal','LIKE','SOCORRO')->count();
      $pinamalayan= volunteers::where('status','VALIDATED')->where('municipal','LIKE','PINAMALAYAN')->count();
      $pola= volunteers::where('status','VALIDATED')->where('municipal','LIKE','POLA')->count();
      $gloria= volunteers::where('status','VALIDATED')->where('municipal','LIKE','GLORIA')->count();
      $bansud= volunteers::where('status','VALIDATED')->where('municipal','LIKE','BANSUD')->count();
      $bongabong= volunteers::where('status','VALIDATED')->where('municipal','LIKE','BONGABONG')->count();
      $roxas= volunteers::where('status','VALIDATED')->where('municipal','LIKE','ROXAS')->count();
      $mansalay= volunteers::where('status','VALIDATED')->where('municipal','LIKE','MANSALAY')->count();
      $bulalacao= volunteers::where('status','VALIDATED')->where('municipal','LIKE','BULALACAO')->count();
      $data=[
        'puerto_galera'=>$puerto_galera,
        'san_teodoro'=>$san_teodoro,
        'baco'=>$baco,
        'calapan_city'=>$calapan_city,
        'naujan'=>$naujan,
        'victoria'=>$victoria,
        'socorro'=>$socorro,
        'pola'=>$pola,
        'pinamalayan'=>$pinamalayan,
        'gloria'=>$gloria,
        'bansud'=>$bansud,
        'bongabong'=>$bongabong,
        'roxas'=>$roxas,
        'mansalay'=>$mansalay,
        'bulalacao'=>$bulalacao,

      ];
      return response()->json($data);
    }
 
    public function Volunteer_Roles_Count(){
      $first_aider= volunteers::where('status','VALIDATED')->where('role','LIKE','FIRST AIDER')->count();
      $blood= volunteers::where('status','VALIDATED')->where('role','LIKE','BLOOD')->count();
      $welfare= volunteers::where('status','VALIDATED')->where('role','LIKE','WELFARE')->count();
      $wash= volunteers::where('status','VALIDATED')->where('role','LIKE','WASH')->count();
      $health= volunteers::where('status','VALIDATED')->where('role','LIKE','HEALTH')->count();
      $dms= volunteers::where('status','VALIDATED')->where('role','LIKE','DMS')->count();
      $rcy= volunteers::where('status','VALIDATED')->where('role','LIKE','RCY')->count();

      $data=[
        'first_aider'=>$first_aider,
        'blood'=>$blood,
        'welfare'=>$welfare,
        'wash'=>$wash,
        'health'=>$health,
        'dms'=>$dms,
        'rcy'=>$rcy
      ];
      return response()->json($data);
    }
 
}
