<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['capacidad' , 'plataform_id' , 'user_id' , 'credential_id'];



    //Relacion en 1 grupo hya muchos usuarios
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    //Relacion con plataforma , 1 grupo tiene 1 plataforma
    public function plataform(){
        return $this->belongsTo(Plataform::class);
    }

    public function owner(){
        return $this->belongsTo(User::class , 'user_id');
    }


    //Relacion con credentials
    public function credential(){
        return $this->belongsTo(Credential::class);
    }


    //Relacion con Message , 1 grupo tiene muchos mensajes
    public function messages(){
        return $this->hasMany(Message::class);
    }


}
