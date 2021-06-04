<?php

namespace App\Repositories;

use App\Models\language;
use App\Repositories\BaseRepository;

/**
 * Class languageRepository
 * @package App\Repositories
 * @version June 3, 2021, 10:03 am UTC
*/

class languageRepository extends BaseRepository
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
        return language::class;
    }
}
