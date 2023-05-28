<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table='accounts'; 

    protected $fillable = [
        'id',
        'id_user',
        'name' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function movement()
    {
        return $this->belongsToMany(Movement::class, 'movements');
    }

}
