<?php

namespace App\Services;

use App\Models\Batch;
use App\Models\Package;

class BatchService
{
    public function getAllPackages()
    {
        return Package::latest()->get();
    }

    public function editBatch($SubjectId)
    {
        return Batch::findOrFail($SubjectId);
    }


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
