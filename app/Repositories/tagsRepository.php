<?php

namespace App\Repositories;

use App\Models\tags;
use App\Repositories\BaseRepository;

/**
 * Class tagsRepository
 * @package App\Repositories
 * @version May 4, 2021, 10:01 am UTC
*/

class tagsRepository extends BaseRepository
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
        return tags::class;
    }
}
