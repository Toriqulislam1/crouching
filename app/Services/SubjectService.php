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


    public function updateSubject($SubjectId, array $data)
    {
        dd($data);
        $Subject = $this->editSubject($SubjectId);

        $data['subject_name'] = $totalAmount;

        $Subject->update($data);
        return $package;
    }

    public function deletePackage($packageId)
    {
        $package = $this->getPackageById($packageId);
        $package->delete();
    }
}

?>