<?php

namespace App\Repositories;

use App\Models\subcategorie;
use App\Repositories\BaseRepository;

/**
 * Class subcategorieRepository
 * @package App\Repositories
 * @version May 6, 2021, 2:25 pm UTC
*/

class subcategorieRepository extends BaseRepository
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
        return subcategorie::class;
    }
}
