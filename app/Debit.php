<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    protected $fillable = [
      'cpfcnpj_people', 'credor','valor',
    ];

}
 