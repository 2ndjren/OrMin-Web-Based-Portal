<?php

namespace App\Imports;

use App\Models\Insurance;
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
        $id = mt_rand(111111111, 999999999);
        // Convert Excel date serial number to a Unix timestamp
        // $birthday = !empty($row[3]) ? Date::excelToTimestamp($row[3]) : null;
        // $startAt = !empty($row[6]) ? Date::excelToTimestamp($row[6]) : null;
        // $endAt = !empty($row[7]) ? Date::excelToTimestamp($row[7]) : null;

        // // Convert Unix timestamp to 'YYYY-MM-DD' format
        // $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
        // $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
        // $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

        $formattedBirthday = date('Y-m-d', $row[3]);
        $formattedStartAt =date('Y-m-d', $row[6]);
        $formattedEndAt =  date('Y-m-d', $row[7]);

        return new Insurance([
            'id' => $id,
            'fname' => $row[1],
            'lname' => $row[2],
            'birthday' => $formattedBirthday,
            'municipality' => $row[4],
            'type_of_payment' => $row[5],
            'start_at' => $formattedStartAt,
            'end_at' => $formattedEndAt,
            'mem_id' => $row[8],
            'OR#' => $row[9],
            'level' => 'CLASSIC',
            'status' => "ACTIVATED",

        ]);
    }
}
