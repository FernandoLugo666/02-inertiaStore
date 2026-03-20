<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $table = 'contact_details';
    protected $guarded = [];



    public function general()
    {
        return $this->belongsTo(ContactGeneral::class);
    }
}
