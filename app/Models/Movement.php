<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table='movements';

    protected $fillable = [
        'id',
        'value',
        'id_account',
        'type',
        'description' 
    ];

    public function account()
    {
        return $this->belongsTo(Account::class,'id_account');
    }

}
