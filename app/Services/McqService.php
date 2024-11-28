<?php

namespace App\Services;

use App\Models\Package;
use App\Models\moduleMcq;

class McqService
{
    public function GetAllModule()
    {
        return moduleMcq::latest()->get();
    }

    public function McqStore($SubjectId)
    {
        return Subject::findOrFail($SubjectId);
    }


    public function updateSubject($SubjectId, array $data)
    {

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