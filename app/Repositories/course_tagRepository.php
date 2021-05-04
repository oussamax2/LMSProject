<?php

namespace App\Repositories;

use App\Models\course_tag;
use App\Repositories\BaseRepository;

/**
 * Class course_tagRepository
 * @package App\Repositories
 * @version May 4, 2021, 10:07 am UTC
*/

class course_tagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'course_id',
        'tag_id'
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
        return course_tag::class;
    }
}
