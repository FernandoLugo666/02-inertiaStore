<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $table = 'contact_persons';
    protected $guarded = [];


    public function general()
    {

        return $this->belongsTo(ContactGeneral::class);
    }
}
