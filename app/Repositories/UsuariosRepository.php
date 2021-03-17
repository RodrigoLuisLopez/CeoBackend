<?php

namespace App\Repositories;

use App\Models\Usuarios;
use App\Repositories\BaseRepository;

/**
 * Class UsuariosRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:37 pm UTC
*/

class UsuariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'edad',
        'direccion',
        'correo',
        'telefono',
        'biografia',
        'facebook',
        'twitter',
        'instagram',
        'estado_id',
        'privacidad_id'
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
        return Usuarios::class;
    }
}
