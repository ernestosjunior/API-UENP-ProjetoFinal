<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'sobrenome', 'sexo', 'cpfcnpj', 'nascimento',
    ];

    public function debits()
    {
        return $this->hasMany(Debit::class, 'id_people');
    }


}
