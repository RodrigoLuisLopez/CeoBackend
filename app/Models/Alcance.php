<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Alcance
 * @package App\Models
 * @version March 15, 2021, 8:51 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class Alcance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'alcances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    public function recomendaciones()
    {
        return $this->hasMany(Recomendacion::class,'alcance_id','id');
    }
    

    
}
