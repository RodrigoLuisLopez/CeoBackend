<?php

namespace App\Repositories;

use App\Models\Alcance;
use App\Repositories\BaseRepository;

/**
 * Class AlcanceRepository
 * @package App\Repositories
 * @version March 15, 2021, 8:51 pm UTC
*/

class AlcanceRepository extends BaseRepository
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
        return Alcance::class;
    }
}
