<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Recomendacion
 * @package App\Models
 * @version March 15, 2021, 9:20 pm UTC
 *
 * @property string $nota
 * @property integer $recomendador_id
 * @property integer $recomendado_id
 * @property integer $alcance_id
 * @property integer $giro_id
 */
class Recomendacion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'recomendacions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nota',
        'recomendador_id',
        'recomendado_id',
        'alcance_id',
        'giro_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nota' => 'string',
        'recomendador_id' => 'integer',
        'recomendado_id' => 'integer',
        'alcance_id' => 'integer',
        'giro_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nota' => 'required',
        'recomendador_id' => 'required',
        'recomendado_id' => 'required',
        'alcance_id' => 'required',
        'giro_id' => 'required'
    ];


    public function alcance(){
        
        return $this->hasOne(Alcance::class,'id','alcance_id');
        
    }

    public function giro(){
        
        return $this->hasOne(Giro::class,'id','giro_id');
        
    }


    public function recomendado()
    {
        return $this->hasOne(Usuarios::class,'id','recomendado_id');
    }

    
    public function recomendador()
    {
        return $this->hasOne(Usuarios::class,'id','recomendador_id');
    }
    
}
