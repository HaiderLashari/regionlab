<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Csv\Reader;
use League\Csv\Statement;



class Client extends Model
{ 

     protected $fillable = [
        'new',
        'lead_id',
        'name',
        'email',
        'phone',
        'status',
        'time_of_cell',
        'person_responsible',
        'address',
        'company',
        'position',
        'other_email',
        'other_phone',
        'type',
        'comment',
        'country_of_residence',
        'nationality',
        'addtional_detail',
    ];

public function users()
{
    return $this->belongsToMany(User::class, 'user_client')->withTimestamps();
}



}
