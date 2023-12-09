<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\volunteers;
use Maatwebsite\Excel\Concerns\ToModel;


class Imports_data_vol implements ToModel, WithStartRow
{
     
     public function startRow(): int
    {
        return 3; // Start importing from the 2nd row (row index 1)
    }


    public function model(array $row)
    {
        // Check if any data exists in the row before attempting to process
        if (!empty($row[1])) {
            $id = mt_rand(111111111, 999999999);
           
            return new volunteers([
                'id' => $id,
                'fname' => $row[1],
                'phone_no' => $row[2],
                'municipal'  => $row[3],
                'role'  => $row[4],

            ]);

           } else {
           
    // Return an error message if the row is empty or missing crucial data
            return new \Exception("Error: Please ensure the Excel file matches the required format for importing.");
        }
    }

}
