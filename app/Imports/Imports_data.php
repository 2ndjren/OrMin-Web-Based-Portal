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
        return 3; // Start importing from the 2nd row (row index 1)
    }

    protected $category;

    public function model(array $row)
    {
        // Set the 'level' value from the first row's first column
        if (empty($this->category) && !empty($row[0])) {
            $this->category = $row[0];
            return null; // Skip the first row as it's a header
        }

        // Check if any data exists in the row before attempting to process
        if (!empty($row[1])) {
            $id = mt_rand(111111111, 999999999);

            $birthday = !empty($row[3]) && is_numeric($row[3]) ? Date::excelToTimestamp($row[3]) : null;
            $startAt = !empty($row[6]) && is_numeric($row[6]) ? Date::excelToTimestamp($row[6]) : null;
            $endAt = !empty($row[7]) && is_numeric($row[7]) ? Date::excelToTimestamp($row[7]) : null;

            $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

            return new insurance([
                'id' => $id,
                'mem_id' => $row[8],
                'level' => $this->category,
                'fname' => $row[1],
                'lname' => $row[2],
                'birthday' => $formattedBirthday,
                'municipality' => $row[4],
                'status' => "ACTIVATED",
                'type_of_payment' => $row[5],
                'start_at' => $formattedStartAt,
                'end_at' => $formattedEndAt,
                'OR#' => $row[9],
            ]);
        }

        // Return null if the row is empty or missing crucial data
        return null;
    }
}
