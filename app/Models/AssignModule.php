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
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

}
