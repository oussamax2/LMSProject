<?php

namespace App\Imports;

use App\Models\sessions;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class sessionsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        $sessions = new sessions();
        //dd($this->transformDate($row[3]));
$target = explode(".",$row[5]);
        $sessions = $sessions->firstOrCreate([

            'course_id'    => $row[0],
            'fee'    => $row[1],
            'start'    => $this->transformDate($row[2]),
            'end'    => $this->transformDate($row[3]),
            'language'    => $row[4],
            'country_id'    => $row[5],
            'state'    => $row[6],
            'city'    => $row[7],
            'note'    => $row[8],
            'status'    => 1,
            'publish'    => 0,
            'sess_type'    => $row[9],
        ]);

return $sessions;

    }

    public function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}

    public function startRow(): int
    {
        return 2;
    }
}
