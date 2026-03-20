<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactGeneral extends Model
{

    protected $table = 'contact_generals';
    protected $guarded = [];

    public function person()
    {
        return $this->hasOne(ContactPerson::class);
    }

    public function company()
    {
        return $this->hasOne(ContactCompany::class);
    }

    public function detail()
    {

        return $this->hasOne(ContactPerson::class);
    }
}
