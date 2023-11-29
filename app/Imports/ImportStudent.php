<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'student_id' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'gender' => $row[3],
            'birth_date' => $row[4],
            'email' => $row[5],
            'phone' => $row[6],
            'option_id' => $row[7],
            'bourse' => $row[8],
            'level_id' => $row[9],
            'school_year_id' => $row[10],
        ]);
    }
}
