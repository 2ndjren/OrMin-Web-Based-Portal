<?php
use App\Models\Insurance;
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

         // Get the value for the 'level' column (assuming it's in the first row and first column)
         $category= $array[0][0] ?? 'NULL'; // Set a default value if needed
      

        // Start reading from the third row (excluding first and second rows)
        foreach ($array as $row) {
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
                'level' => $category, // Static value for the entire sheet
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

        Insurance::insert($data);
    }

    public function startRow(): int
    {
        return 3; // Start reading from the third row
    }
}
