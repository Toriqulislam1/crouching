<?php

namespace App\Services;

use App\Models\mcq_options;
use App\Models\Mcq;
use App\Models\Package;
use App\Models\moduleMcq;

class McqService
{
    public function GetAllModule()
    {
        return moduleMcq::latest()->get();
    }

    public function McqStore($request)
    {
        // Save the MCQ
        $mcq = Mcq::create([
            'module_id' => $request->module_id,
            'question' => $request->question,
        ]);

        // Save the options
        foreach ($request->options as $key => $option) {
            mcq_options::create([
                'mcq_id' => $mcq->id,
                'option_text' => $option,
                'is_correct' => $option === $request->correct_answer,
            ]);
        }
    }
        public function editMcq($mcqId)
    {
        return Mcq::with('options')->findOrFail($mcqId);
    }


    public function updateMcq($id, $request)
    {

        // Find the MCQ by its ID
        $mcq = Mcq::findOrFail($id);

        // Update the MCQ question
        $mcq->update([
            'module_id' => $request->module_id,
            'question' => $request->question,
        ]);
        // Handle the options update
        foreach ($request->options as $key => $option) {
            $mcqOption = mcq_options::where('mcq_id', $mcq->id)->skip($key)->first();

            if ($mcqOption) {
                // Update the existing option
                $mcqOption->update([
                    'option_text' => $option,
                    'is_correct' => $option === $request->correct_answer,
                ]);
            } else {
                // If there's no existing option, create a new one
                mcq_options::create([
                    'mcq_id' => $mcq->id,
                    'option_text' => $option,
                    'is_correct' => $option === $request->correct_answer,
                ]);
            }
        }

    }

    public function deletePackage($Id)
    {
        $package = $this->getPackageById($Id);
        $package->delete();
    }
}