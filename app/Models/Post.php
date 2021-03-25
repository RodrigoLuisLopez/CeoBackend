<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

/**
 * Class Post
 * @package App\Models
 * @version March 15, 2021, 9:10 pm UTC
 *
 * @property string $titulo
 * @property string $subtitulo
 * @property string $contenido
 * @property integer $user_id
 * @property integer $privacidad_id
 * @property integer $estado_id
 */
class Post extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titulo',
        'subtitulo',
        'contenido',
        'usuario_id',
        'privacidad_id',
        'estado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'subtitulo' => 'string',
        'contenido' => 'string',
        'usuario_id' => 'integer',
        'privacidad_id' => 'integer',
        'estado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'subtitulo' => 'required',
        'contenido' => 'required',
        'usuario_id' => 'required',
        'privacidad_id' => 'required',
        'estado_id' => 'required'
    ];


    public function likes(){
        
        return $this->hasMany(Likes::class,'post_id','id');
        
    }

    public function privacidad(){
        
        return $this->hasOne(Privacidad::class,'id','privacidad_id');
        
    }

    public function estado(){
        
        return $this->hasOne(Estado::class,'id','estado_id');
        
    }


    public function usuario(){
        
        return $this->hasOne(User::class,'id','usuario_id');
        
    }
    public function usuariobasico(){
        
        return $this->hasOne(User::class,'id','usuario_id')
        ->selectRaw('id, name, email');
        
    }


    public function fotopost()
    {
        return $this->morphOne(Ilustrable::class,'Ilustrable');
    }

    public function comentpost()
    {
        return $this->morphOne(Ilustrable::class,'Ilustrable');
    }
    public function getCreatedAtAttribute($value){
        setlocale(LC_ALL,'es_ES.UTF-8');
        setlocale(LC_TIME,'es_ES');
        Carbon::setLocale('es_ES');
        $fecha = Carbon::parse($value);

        return $fecha->formatLocalized('%d de %B de %Y');
    }


}
