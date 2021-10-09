<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';

    protected $fillable = ['id', 'name', 'company_id', 'email', 'created_at', 'updated_at'];

    public function companies(){
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
