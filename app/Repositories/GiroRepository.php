<?php

namespace App\Repositories;

use App\Models\Giro;
use App\Repositories\BaseRepository;

/**
 * Class GiroRepository
 * @package App\Repositories
 * @version March 15, 2021, 8:50 pm UTC
*/

class GiroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
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
        return Giro::class;
    }
}
