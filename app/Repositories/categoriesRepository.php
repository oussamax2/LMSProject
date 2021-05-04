<?php

namespace App\Repositories;

use App\Models\categories;
use App\Repositories\BaseRepository;

/**
 * Class categoriesRepository
 * @package App\Repositories
 * @version May 4, 2021, 11:16 am UTC
*/

class categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'order'
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
        return categories::class;
    }
}
