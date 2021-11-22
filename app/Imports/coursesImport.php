<?php

namespace App\Imports;

use App\Models\courses;
use App\Models\categories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class coursesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        $course = new courses();
$target = explode(".",$row[5]);
        $course = $course->firstOrCreate([
            // 'name_on_card'     => $row[0],
            'company_id'    => $row[0],
            'title'    => $row[1],
            'body'    => $row[2],
            'category_id'    => $row[3],
            'subcateg_id'    => $row[4]
        ]);
        $course->target_audiance()->attach($target);
return $course;

    }

    public function startRow(): int
    {
        return 2;
    }
}
