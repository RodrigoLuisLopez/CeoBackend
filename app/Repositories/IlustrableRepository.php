<?php

namespace App\Repositories;

use App\Models\Ilustrable;
use App\Repositories\BaseRepository;

/**
 * Class IlustrableRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:45 pm UTC
*/

class IlustrableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ilustrable_id',
        'ilustrable_type',
        'url',
        'urls'
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
        return Ilustrable::class;
    }
}
