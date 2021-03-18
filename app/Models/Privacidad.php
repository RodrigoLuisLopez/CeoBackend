<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Privacidad
 * @package App\Models
 * @version March 15, 2021, 8:49 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class Privacidad extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'privacidads';
    

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
    

    public function posts(){
        
        return $this->hasMany(Post::class,'privacidad_id','id');
        
    }

    public function usuarios(){
        
        return $this->hasMany(User::class,'privacidad_id','id');
        
    }

    
}
