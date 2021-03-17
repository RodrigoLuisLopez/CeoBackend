<?php

namespace App\Repositories;

use App\Models\Recomendacion;
use App\Repositories\BaseRepository;

/**
 * Class RecomendacionRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:20 pm UTC
*/

class RecomendacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nota',
        'recomendador_id',
        'recomendado_id',
        'alcance_id',
        'giro_id'
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
        return Recomendacion::class;
    }
}
