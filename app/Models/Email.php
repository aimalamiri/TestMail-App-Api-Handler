<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'id',
        'email_id',
        'name',
        'from',
        'to',
        'subject',
        'text',
        'html',
        'date',
        'headers',
    ];

    protected function casts()
    {
        return [
            'date' => 'datetime',
            'headers' => 'array',
        ];
    }
}
