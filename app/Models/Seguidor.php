<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Seguidor
 * @package App\Models
 * @version March 15, 2021, 9:16 pm UTC
 *
 * @property integer $seguido_id
 * @property integer $seguidor_id
 */
class Seguidor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'seguidors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'seguido_id',
        'seguidor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'seguido_id' => 'integer',
        'seguidor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seguido_id' => 'required',
        'seguidor_id' => 'required'
    ];

    public function seguido()
    {
        return $this->hasOne(Usuarios::class,'id','seguido_id');
    }

    
    public function seguidor()
    {
        return $this->hasOne(Usuarios::class,'id','seguidor_id');
    }


    
}
