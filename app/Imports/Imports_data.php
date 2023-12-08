<?php

namespace App\Imports;
use App\Models\insurance;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Imports_data implements ToArray, WithStartRow
{
    public function array(array $array)
    {
        if (empty($array)) {
            // Handle case when Excel file has no data
            return;
        }

        $data = [];
        $category = null;

        // Loop through the rows to find the 'level' value in the first column of the first row
        foreach ($array as $index => $row) {
            if ($index === 0) {
                $category = $row[0] ?? null; // Retrieve the 'level' value from the first row and first column
                break; // Break the loop after finding the 'level' value
            }
        }

        // Start reading from the third row (excluding first and second rows)
        for ($i = 2; $i < count($array); $i++) {
            $row = $array[$i];
            $id = mt_rand(111111111, 999999999);

            // Assuming your columns' references start from column A (index 0)
            $birthday = !empty($row[3]) && is_numeric($row[3]) ? Date::excelToTimestamp($row[3]) : null;
            $startAt = !empty($row[6]) && is_numeric($row[6]) ? Date::excelToTimestamp($row[6]) : null;
            $endAt = !empty($row[7]) && is_numeric($row[7]) ? Date::excelToTimestamp($row[7]) : null;

            $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

            $data[] = [
                'id' => $id,
                'mem_id' => $row[8],
                'level' => $category, // Assign the retrieved 'level' value
                'fname' => $row[1],
                'lname' => $row[2],
                'birthday' => $formattedBirthday,
                'municipality' => $row[4],
                'status' => "ACTIVATED",
                'type_of_payment' => $row[5],
                'start_at' => $formattedStartAt,
                'end_at' => $formattedEndAt,
                'OR#' => $row[9],
            ];
        }

        insurance::insert($data);
    }

    public function startRow(): int
    {
        return 3; // Start reading from the third row
    }
}
