<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
     use SoftDeletes;

      protected $table = 'tasks';
      protected $fillable = ['Other',
            'Name',
            'Platecar',
            'IdCardT',
            'IDCard',
            'Telhand',
            'CtID',
            'Status'];


}
