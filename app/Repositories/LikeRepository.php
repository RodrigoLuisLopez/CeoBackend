<?php

namespace App\Repositories;

use App\Models\Like;
use App\Repositories\BaseRepository;

/**
 * Class LikeRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:14 pm UTC
*/

class LikeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'post_id'
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
        return Like::class;
    }
}
