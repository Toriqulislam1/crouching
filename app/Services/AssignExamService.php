<?php

namespace App\Services;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Subject;
use App\Models\AssignExam;

class AssignExamService
{
    public function GetAllCourse()
    {
        return Course::latest()->get();
    }
    public function GetAllSubjet()
    {
        return Subject::latest()->get();
    }
    public function GetAllBatch()
    {
        return Batch::latest()->get();
    }

    public function editBatch($SubjectId)
    {
        return Batch::findOrFail($SubjectId);
    }

    public function AssignExamStore($request)
    {
                // Save the subject
                $exam = new AssignExam();
                $exam->name = $request->ExamName;
                $exam->CourseId = $request->CourseId;
                $exam->SubjectId = $request->SubjectId;
                $exam->BatchId = $request->BatchId;
                $exam->save();
    }


    editAssignExam
    public function updateBatch($SubjectId, array $data)
    {
        $batch_name = $data['batchName'];
        $Subject = $this->editBatch($SubjectId);
        $Subject->update(
            [
                'batch_name' =>$batch_name,
            ]
        );
    }

    public function deletePackage($packageId)
    {
        $package = $this->getPackageById($packageId);
        $package->delete();
    }
}

?>
