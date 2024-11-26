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



    public function editAssignExam($AssignId)
    {
        return AssignExam::with(['course', 'subject', 'batch'])->findOrFail($AssignId);
    }
    public function updateAssignExam($AssignId, $request)
    {
        
        $Assign = $this->editAssignExam($AssignId);
        $Assign->update(
            [
                'name' => $request->ExamName,
                'CourseId' => $request->CourseId,
                'SubjectId' => $request->SubjectId,
                'BatchId' => $request->BatchId
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