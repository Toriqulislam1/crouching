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

    public function updateCourse($CourseId, array $data)
    {
        $Course_name = $data['Course_name'];
        
        $Course = $this->editCourse($CourseId);
        $Course->update(
            [
                'Course_name' => $Course_name,
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