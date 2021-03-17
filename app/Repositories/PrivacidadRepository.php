<?php

namespace App\Repositories;

use App\Models\Privacidad;
use App\Repositories\BaseRepository;

/**
 * Class PrivacidadRepository
 * @package App\Repositories
 * @version March 15, 2021, 8:49 pm UTC
*/

class PrivacidadRepository extends BaseRepository
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
        return Privacidad::class;
    }
}
