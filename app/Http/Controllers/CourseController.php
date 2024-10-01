<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Unit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        // eager loading
        $course->load(['unit', 'students']);
        $studentCount = $course->studentCount();
        return view('course', ['course' => $course, 'students' => $course->students, 'studentCount' => $studentCount]);
    }

    public function create()
    {
        $units = Unit::all()->where('is_active', 1);
        return view('course.create', ['units' => $units]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|unique:courses|size:6',
            'curriculum_year' => 'required',
            'unit_id' => 'required',
            'course_name_en' => 'required|string|max:255'
        ], [
            'course_name.required' => 'Course name harus diisi',
            'course_code.required' => 'Course code harus diisi',
            'course_code.unique' => 'Course code sudah ada',
            'course_code.size' => 'Course code harus 6 karakter',
            'curriculum_year.required' => 'Curriculum year harus diisi',
            'unit_id.required' => 'Unit harus diisi',
            'course_name_en.required' => 'Course name (EN) harus diisi'
        ]);

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->year = $request->curriculum_year;
        $course->unit_id = $request->unit_id;
        $course->course_name_en = $request->course_name_en;
        $course->sks = 3;

        $course->save();
        return redirect()->route('courses')->with('success', 'Course berhasil diinput');
    }
}
