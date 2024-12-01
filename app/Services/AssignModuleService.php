<?php

namespace App\Services;

use App\Models\Batch;
use App\Models\Course;
use App\Models\AssignModule;
;
use App\Models\AssignExam;

class AssignModuleService
{
    public function GetAllAssignModule()
    {
        return AssignModule::with(['module', 'exam'])->get();
    }

    public function AssignModuleStore($request)
    {
        // Save the subject
        $AssignModule = new AssignModule();
        $AssignModule->module_id = $request->ModuleId;
        $AssignModule->exam_id = $request->ExamId;

        $AssignModule->save();
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