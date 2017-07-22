<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['Other',
            'Name',
            'Platecar',
            'IdCardT',
            'IDCard',
            'Telhome',
            'Telhand',
            'Carbrand1',
            'CarColor1',
            'CtID',
            'Status'];
}
