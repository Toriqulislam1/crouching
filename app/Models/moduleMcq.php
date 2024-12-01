<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moduleMcq extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function assignModules()
    {
        return $this->hasMany(AssignModule::class, 'moduleId'); // Foreign key in AssignModule is 'moduleId'
    }
}
