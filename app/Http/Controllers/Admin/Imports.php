<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\Imports_data;
use Maatwebsite\Excel\Facades\Excel;


class Imports extends Controller
{
    //--->>> membership
    public function import(Request $request)
    {
        $file = $request->file('file'); // Get the uploaded file

        Excel::import(new Imports_data, $file); // Perform the import using your import class

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
