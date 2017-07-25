<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Card extends Model
{
   
    protected $table = 'tasks';
    protected $fillable = ['Other',
            'Name',
            'Platecar',
            'IdCardT',
            'Telhand',
            'CtID',
            'Status'];
}
