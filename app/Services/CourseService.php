<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Package;

class CourseService
{
    public function getAllCourse()
    {
        return Package::latest()->get();
    }

    public function editCourse($SubjectId)
    {
        return Course::findOrFail($SubjectId);
    }

    public function updateBatch($CourseId, array $data)
    {
        $batch_name = $data['CourseName'];
        $Subject = $this->editCourse($CourseId);
        $Subject->update(
            [
                'Course_name' =>$batch_name,
            ]
        );
    }

    public function deleteCourse($CourseId)
    {
        $package = $this->getCourseById($CourseId);
        $package->delete();
    }
}

?>
