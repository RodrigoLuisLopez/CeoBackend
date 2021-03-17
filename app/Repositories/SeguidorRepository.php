<?php

namespace App\Repositories;

use App\Models\Seguidor;
use App\Repositories\BaseRepository;

/**
 * Class SeguidorRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:16 pm UTC
*/

class SeguidorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seguido_id',
        'seguidor_id'
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
        return Seguidor::class;
    }
}
