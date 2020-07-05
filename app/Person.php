<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'cpfcnpj', 
    ];

    public function debit()
    {
        return $this->hasMany(Debit::class, 'id_people');
    }
}
