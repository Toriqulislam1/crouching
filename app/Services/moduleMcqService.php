<?php

namespace App\Services;

use App\Models\moduleMcq;
use App\Models\Subject;

class moduleMcqService
{
    public function getAllcoduleMcq()
    {
        return moduleMcq::latest()->with('module','exam')->get();
    }
    public function editModuleMcq($moduleId)
    {
        return moduleMcq::findOrFail($moduleId);
    }
    public function moduleMcqStore($request)
    {
        // Save the subject
        $module = new moduleMcq();
        $module->moduleName = $request->moduleName;
        $module->save();

    }
    public function updateModuleMcq($moduleId, $request)
    {

        $module = $this->editModuleMcq($moduleId);
        $module->update([
            'moduleName' => $request->moduleName,
        ]);

    }
    public function deleteModuleMcq($moduleId)
    {
        $package = $this->getModuleMcqById($moduleId);
        $package->delete();
    }
}
