<?php

namespace App\Repositories;

use App\Models\Comentable;
use App\Repositories\BaseRepository;

/**
 * Class ComentableRepository
 * @package App\Repositories
 * @version March 15, 2021, 9:47 pm UTC
*/

class ComentableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comentable_id',
        'comentable_type',
        'comentario'
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
        return Comentable::class;
    }
}
