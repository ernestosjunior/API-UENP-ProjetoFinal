<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'cpfcnpj', 
    ];

    public function debits()
    {
        return $this->hasMany(Debit::class, 'cpfcnpj_people');
    }
}
