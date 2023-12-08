<?php

namespace App\Imports;

use App\Models\insurance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Imports_data implements ToModel, WithStartRow
{
    protected $level; // Variable to store the CLASSIC value

    public function startRow(): int
    {
        return 3; // Start importing from the 3rd row (row index 2)
    }

    public function model(array $row)
    {
        // Get the CLASSIC value from the first row, first column
        if (empty($this->level) && isset($row[0])) {
            $this->level = $row[0];
            return null; // Skip processing the header row
        }

        // Check if any data exists in the row before attempting to process
        if (!empty($row[1])) {
            $birthday = !empty($row[3]) ? Date::excelToTimestamp($row[3]) : null;
            $startAt = !empty($row[6]) ? Date::excelToTimestamp($row[6]) : null;
            $endAt = !empty($row[7]) ? Date::excelToTimestamp($row[7]) : null;

            $formattedBirthday = $birthday !== null ? date('Y-m-d', $birthday) : null;
            $formattedStartAt = $startAt !== null ? date('Y-m-d', $startAt) : null;
            $formattedEndAt = $endAt !== null ? date('Y-m-d', $endAt) : null;

            return new insurance([
                'mem_id' => $row[8],
                'level' => $this->level, // Set the CLASSIC value obtained from the first row
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
