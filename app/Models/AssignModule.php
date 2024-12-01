<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignModule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function module()
    {
        return $this->belongsTo(moduleMcq::class, 'moduleId'); // Foreign key is 'moduleId'
    }

    // Relationship with AssignExam
    public function exam()
    {
        return $this->belongsTo(AssignExam::class, 'examId'); // Foreign key is 'examId'
    }

}