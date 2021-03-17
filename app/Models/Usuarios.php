<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Usuarios
 * @package App\Models
 * @version March 15, 2021, 9:37 pm UTC
 *
 * @property string $nombre
 * @property string $edad
 * @property string $direccion
 * @property string $correo
 * @property string $telefono
 * @property string $biografia
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property integer $estado_id
 * @property integer $privacidad_id
 */
class Usuarios extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'usuarios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'edad' => 'string',
        'direccion' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'biografia' => 'string',
        'facebook' => 'string',
        'twitter' => 'string',
        'instagram' => 'string',
        'estado_id' => 'integer',
        'privacidad_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'edad' => 'required',
        'direccion' => 'required',
        'correo' => 'required',
        'telefono' => 'required',
        'biografia' => 'required',
        'facebook' => 'required',
        'twitter' => 'required',
        'instagram' => 'required',
        'estado_id' => 'required',
        'privacidad_id' => 'required'
    ];


    public function privacidad(){
        
        return $this->hasOne(Privacidad::class,'id','privacidad_id');
        
    }

    public function estado(){
        
        return $this->hasOne(Estado::class,'id','estado_id');
        
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'usuario_id','id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'usuario_id','id');
    }




    public function seguidores()
    {
        return $this->hasMany(Seguidor::class,'seguido_id','id');
    }

    public function seguidos()
    {
        return $this->hasMany(Seguidor::class,'seguidor_id','id');
    }




    public function recomendadores()
    {
        return $this->hasMany(Recomendacion::class,'recomendado_id','id');
    }


    public function recomendados()
    {
        return $this->hasMany(Recomendacion::class,'recomendador_id','id');
    }


    public function fotousuario()
    {
        return $this->morphOne(Ilustrable::class,'Ilustrable');
    }

    public function comentusuario()
    {
        return $this->morphOne(Ilustrable::class,'Ilustrable');
    }

    
}
