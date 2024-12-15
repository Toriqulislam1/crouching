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
        $exam->SubjectId = $request->Subject_id;
        $exam->BatchId = $request->Batch_id;
        $exam->question = json_encode($request->question);
        $exam->examDate = $request->examDate;
        $exam->ExamTime = $request->examTime;
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
                'SubjectId' => $request->SubjectId,
                'BatchId' => $request->BatchId,
                'question' => json_encode($request->questions),
                'examDate' => $request->exam_date,
                'ExamTime' => $request->exam_time
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
