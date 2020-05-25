<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFormEntry extends Model
{
    protected $table = 'contact_form_entries';
    protected $fillable = [
        'entry_number',
        'contact_form_fields_id',
        'data',
    ];
}
