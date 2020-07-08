<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    protected $fillable = [
      'id_people', 'credor','valor',
    ];

}
 