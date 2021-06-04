<?php

namespace App\Imports;

use App\Models\courses;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class coursesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new courses([
            // 'name_on_card'     => $row[0],
            'company_id'    => 1,
            'title'    => $row[0],
            'body'    => $row[1],
            'category_id'    => 1,
          'published_on' => Carbon::now()
        ]);
    }
}
