<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

/**
 * Class Comentable
 * @package App\Models
 * @version March 15, 2021, 9:47 pm UTC
 *
 * @property integer $comentable_id
 * @property string $comentable_type
 * @property string $comentario
 */
class Comentable extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'comentables';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'comentable_id',
        'comentable_type',
        'comentario',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'comentable_id' => 'integer',
        'comentable_type' => 'string',
        'comentario' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'comentable_id' => 'required',
        'comentable_type' => 'required',
        'comentario' => 'required'
    ];

    public function Comentable()
    {
        return $this->morphTo();
    }   
    

    public function usuario(){
        
        return $this->hasOne(User::class,'id','user_id');
        
    }
}
