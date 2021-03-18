<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'edad',
        'direccion',
        'telefono',
        'biografia',
        'facebook',
        'twiter',
        'instagram',
        'estado_id',
        'privacidad_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public static $rules = [
        'edad'=>'required',
        'name'=>'required',
        'direccion'=>'required',
        'telefono'=>'required',
        'biografia'=>'required',
        'facebook'=>'required',
        'twiter'=>'required',
        'instagram'=>'required',
        'estado_id'=>'required',
        'privacidad_id'=>'required'
    ];

    public function estado(){
        
        return $this->hasOne(Estado::class,'id','estado_id');
        
    }

    public function likes(){
        
        return $this->hasMany(Likes::class,'usuario_id','id');
        
    }

    public function posts(){
        
        return $this->hasMany(Post::class,'usuario_id','id');
        
    }

    public function privacidad(){
        
        return $this->hasOne(Privacidad::class,'id','privacidad_id');
        
    }

    public function recomendador()
    {
        return $this->hasMany(Recomendacion::class,'recomendador_id','id');
    }

    public function recomendado()
    {
        return $this->hasMany(Recomendacion::class,'recomendado_id','id');
    }

    public function seguidor()
    {
        return $this->hasMany(Seguidor::class,'seguidor_id','id');
    }

    public function seguido()
    {
        return $this->hasMany(Seguidor::class,'seguido_id','id');
    }

    public function fotouser()
    {
        return $this->morphOne(Ilustrable::class,'Ilustrable');
    }

}
