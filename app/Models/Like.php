<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Like
 * @package App\Models
 * @version March 15, 2021, 9:14 pm UTC
 *
 * @property integer $user_id
 * @property integer $post_id
 */
class Like extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'likes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'usuario_id',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'usuario_id' => 'integer',
        'post_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'usuario_id' => 'required',
        'post_id' => 'required'
    ];

    public function usuario(){
        
        return $this->hasOne(Usuarios::class,'id','usuario_id');
        
    }

    public function post(){
        
        return $this->hasOne(Post::class,'id','post_id');
        
    }
    
}
