<?php

namespace App\Imports;

use App\Models\Insurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Imports_data implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Start importing from the 2nd row (row index 1)
    }

    public function model(array $row)
    {
        $id = mt_rand(111111111, 999999999);
    // Convert Excel date serial number to a Unix timestamp
    $birthday = !empty($row[2]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row[2]) : null;
    $startAt = !empty($row[7]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row[7]) : null;
    $endAt = !empty($row[8]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row[8]) : null;

    // Convert Unix timestamp to 'YYYY-MM-DD' format
    $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
    $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
    $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

        return new Insurance([
            'id' => $id,
            'fname' => $row[0],
            'lname' => $row[1],
            'birthday' => $formattedBirthday,
            'municipality' => $row[3],
            'level' => $row[4],
            'status' => $row[5],
            'type_of_payment' => $row[6],
            'start_at' => $formattedStartAt,
            'end_at' => $formattedEndAt,    
            'mem_id' => $row[9],
            'OR#' => $row[10],
            // Map other columns as needed
        ]);
    }
}
