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
        // Check if the row has the expected number of columns
        $expectedColumnCount = 5; // Define the expected number of columns
    
        if (count($row) !== $expectedColumnCount) {
            throw new \Exception("Error: Row doesn't have $expectedColumnCount columns as expected.");
        }
    
        // If the row has the expected number of columns, proceed with processing
        if (!empty($row[1])) {
            $id = mt_rand(111111111, 999999999);
           
            return new volunteers([
                'id' => $id,
                'fname' => $row[1],
                'phone_no' => $row[2],
                'municipal'  => $row[3],
                'role'  => $row[4],
                'status' => 'VALIDATED',
            ]);
        } else {
            // Return an error message if the row is empty or missing crucial data
            return new \Exception("Error: Please ensure the Excel file matches the required format for importing.");
        }
    }

}
