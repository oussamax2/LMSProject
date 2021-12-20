<?php

namespace App\Repositories;

use App\Models\courses;
use App\Repositories\BaseRepository;

/**
 * Class coursesRepository
 * @package App\Repositories
 * @version May 4, 2021, 10:06 am UTC
*/

class coursesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'title',
        'body',
        'created_at',
        'category_id',
        'tags'
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
        return courses::class;
    }
}
