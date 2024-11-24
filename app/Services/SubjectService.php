<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Subject;

class SubjectService
{
    public function getAllPackages()
    {
        return Package::latest()->get();
    }

    public function editSubject($SubjectId)
    {
        return Subject::findOrFail($SubjectId);
    }


    public function updateSubject($subjectId, array $data)
    {

        $subject_name = $data['subject_name'];
        $Subject = $this->editSubject($subjectId);
        $Subject->update(['subject_name' => $subject_name,
        ]);
    }

    public function deletePackage($packageId)
    {
        $package = $this->getPackageById($packageId);
        $package->delete();
    }
}

?>