<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFormField extends Model
{
    protected $table = 'contact_form_fields';
    protected $fillable = ['name'];
}
