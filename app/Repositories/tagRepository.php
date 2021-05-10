<?php

namespace App\Repositories;

use App\Models\tag;
use App\Repositories\BaseRepository;

/**
 * Class tagRepository
 * @package App\Repositories
 * @version May 6, 2021, 1:19 pm UTC
*/

class tagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'category_id'
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
        return tag::class;
    }
}
