<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table    = "packages";
    protected $guarded  = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
