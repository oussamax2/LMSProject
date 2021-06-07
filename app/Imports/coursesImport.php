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

        return $course->firstOrCreate([
            // 'name_on_card'     => $row[0],
            'company_id'    => auth()->user()->companies->id,
            'title'    => $row[0],
            'body'    => $row[1],
            'category_id'    => isset(categories::where('name', 'LIKE', "%{$row[2]}%")->first()->id)?categories::where('name', 'LIKE', "%{$row[2]}%")->first()->id:categories::where('name', 'LIKE', "%Others%")->first()->id,

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
