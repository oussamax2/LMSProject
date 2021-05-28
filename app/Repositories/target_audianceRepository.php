<?php

namespace App\Repositories;

use App\Models\target_audiance;
use App\Repositories\BaseRepository;

/**
 * Class target_audianceRepository
 * @package App\Repositories
 * @version May 28, 2021, 9:13 am UTC
*/

class target_audianceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return target_audiance::class;
    }
}
