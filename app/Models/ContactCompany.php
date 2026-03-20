<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    protected $table = 'contact_companies';
    protected $guarded = [];




    public function general()
    {
        return  $this->belongsTo(ContactGeneral::class); //Esto lo hace automáticamente laravel porque espera "nombre_del_modelo_en_singular + _id"
    }
}
