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
        $id = mt_rand(111111111, 999999999);

        $birthday = !empty($row[3]) && is_numeric($row[3]) ? Date::excelToTimestamp($row[3]) : null;
        $startAt = !empty($row[6]) && is_numeric($row[6]) ? Date::excelToTimestamp($row[6]) : null;
        $endAt = !empty($row[7]) && is_numeric($row[7]) ? Date::excelToTimestamp($row[7]) : null;

        $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
        $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
        $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;


        return new <i></i>nsurance([
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
           // Retrieve the last added sheet name for the current row
        ]);
    }
}
