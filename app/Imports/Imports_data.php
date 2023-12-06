<?php

namespace App\Imports;

use App\Models\insurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DateTime;
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

            // Extract the formula string from the cell
            $dateString = $row[7]; // Assuming the formula '=EDATE(G2,12)' is in column H (index 7)

            $endAt = null;
            if (!empty($dateString)) {
                // Extract the cell reference (e.g., 'G2') from the formula string
                preg_match('/\(([^\)]+)\)/', $dateString, $matches);
                $cellReference = $matches[1]; // This will contain the dynamic cell reference (e.g., 'G2')

                // Get the value of the dynamic cell based on the reference
                $dynamicCellValue = $row[$cellReference]; // Assuming $row is an associative array

                // Calculate the result of the formula manually
                $dateTime = new DateTime($dynamicCellValue); // Create a DateTime object with the value of the dynamic cell
                $dateTime->modify('+12 months'); // Add 12 months to the date

                $endAt = $dateTime->format('Y-m-d'); // Format the date as needed
            }

            $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', strtotime($endAt)) : null;

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
            ]);
        }

        // Return null if the row is empty or missing crucial data
        return null;
    }
}
