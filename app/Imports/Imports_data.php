<?php

namespace App\Imports;

use App\Models\insurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Datetime;

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

            $birthday = !empty($row[3]) && is_numeric($row[3]) ? Date::excelToTimestamp($row[3]) : strtotime('0000-00-00');
            $startAt = !empty($row[6]) && is_numeric($row[6]) ? Date::excelToTimestamp($row[6]) : null;
            $endAt = !empty($row[7]) && is_numeric($row[7]) ? Date::excelToTimestamp($row[7]) : null;

          
            $formatBirthday =  $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

            // Calculate age from the birthday
        $age = null;
        if ($formatBirthday !== null) {
            $birthdate = new DateTime($formatBirthday);
            $currentDate = new DateTime();
            $age = $birthdate->diff($currentDate)->y;
        }

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
                'age' => $age,
                'birthday' => $formatBirthday,
                'municipality' => $row[4],
                'amount' => $amount, // Set the determined amount based on level
                'status' => "ACTIVATED",
                'start_at' => $formattedStartAt,
                'end_at' => $formattedEndAt,
                'type_of_payment' => $row[5],
                'OR#' => $row[10],
            ]);

           } else {
           
    // Return an error message if the row is empty or missing crucial data
            return new \Exception("Error: Please ensure the Excel file matches the required format for importing.");
        }
    }

}
