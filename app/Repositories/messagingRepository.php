<?php

namespace App\Repositories;

use App\Models\messaging;
use App\Repositories\BaseRepository;

/**
 * Class messagingRepository
 * @package App\Repositories
 * @version May 31, 2021, 4:46 pm UTC
*/

class messagingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'registeration_id',
        'message'
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
        return messaging::class;
    }
}
