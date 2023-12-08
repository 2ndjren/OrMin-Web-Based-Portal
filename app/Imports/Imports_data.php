<?php

namespace App\Imports;

use App\Models\insurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Imports_data implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2; // Start importing from the 2nd row (row index 1)
    }


    public function model(array $row)
    {
        // Check if any data exists in the row before attempting to process
        if (!empty($row[1])) {
            $id = mt_rand(111111111, 999999999);

            $birthday = !empty($row[3]) && is_numeric($row[3]) ? Date::excelToTimestamp($row[3]) : null;
            $startAt = !empty($row[6]) && is_numeric($row[6]) ? Date::excelToTimestamp($row[6]) : null;
            $endAt = !empty($row[7]) && is_numeric($row[7]) ? Date::excelToTimestamp($row[7]) : null;

            $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

            // Get the level value from the row
    $level = strtoupper($row[8] ?? ''); // Assuming level is in the 9th column (index 8)

    // Set default amount
    $amount = 0;

    
    // Determine the amount based on the level
    switch ($level) {
        case 'CLASSIC':
            $amount = 60;
            break;
        case 'BRONZE':
            $amount = 150;
            break;
        case 'SILVER':
            $amount = 300;
            break;
        case 'GOLD':
            $amount = 500;
            break;
        case 'PLATINUM':
            $amount = 1000;
            break;
        case 'SENIOR':
            $amount = 300;
            break;
        case 'SENIOR PLUS':
            $amount = 350;
            break;
        default:
            // Handle other cases or set a default amount
            break;
    }
            return new insurance([
                'id' => $id,
                'mem_id' => $row[9],
                'level' => $row[8],
                'fname' => $row[1],
                'lname' => $row[2],
                'birthday' => $formattedBirthday,
                'municipality' => $row[4],
                'status' => "ACTIVATED",
                'type_of_payment' => $row[5],
                'start_at' => $formattedStartAt,
                'end_at' => $formattedEndAt,
                'OR#' => $row[10],
                'amount' => $amount, // Set the determined amount based on level
            ]);
        }

        // Return null if the row is empty or missing crucial data
        return null;
    }
}
