<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignExam extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'SubjectId', 'id');
    }


    public function batch()
    {
        return $this->belongsTo(Batch::class, 'BatchId');
    }
    public function assignModules()
    {
        return $this->hasMany(AssignModule::class, 'examId'); // Foreign key in AssignModule is 'examId'
    }

}
