<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function examName()
    {
        return $this->belongsTo(AssignExam::class, 'exam_name_id', 'id');
    }


    public function question()
{
    return $this->belongsTo(mcq::class, 'question_id');
}

public function option()
{
    return $this->belongsTo(mcq_options::class, 'option_id');
}

}
