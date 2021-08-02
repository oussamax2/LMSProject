<?php

namespace App\Repositories;

use App\Models\subscribers;
use App\Repositories\BaseRepository;

/**
 * Class subscribersRepository
 * @package App\Repositories
 * @version July 8, 2021, 3:38 pm UTC
*/

class subscribersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
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
        return subscribers::class;
    }
}
