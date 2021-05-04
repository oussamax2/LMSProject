<?php

namespace App\Repositories;

use App\Models\sessions;
use App\Repositories\BaseRepository;

/**
 * Class sessionsRepository
 * @package App\Repositories
 * @version May 4, 2021, 11:18 am UTC
*/

class sessionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start',
        'end',
        'fee',
        'language',
        'course_id',
        'country_id',
        'state',
        'city',
        'note'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sessions::class;
    }
}
