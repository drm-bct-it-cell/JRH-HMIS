<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = 'patient';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','date','umid','pf_ppo','name','mobile','appoint_for','age','gender','opd','timing'
    ];

    protected $dates = ['date'];
}
