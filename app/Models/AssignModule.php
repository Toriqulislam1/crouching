<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignExam;

class AssignModule extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function module()
    {
        return $this->belongsTo(moduleMcq::class, 'module_id');
    }

    public function exam()
    {
        return $this->belongsTo(AssignExam::class, 'exam_id');
    }

}
