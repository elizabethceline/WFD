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
        return view('course', ['course' => $course, 'students' => $course->students, 'studentCount' => $studentCount, 'title' => $course->course_name]);
    }

    public function create()
    {
        $units = Unit::all()->where('is_active', 1);
        return view('course.create', ['units' => $units, 'title' => 'Create Course']);
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

    public function edit(Course $course)
    {
        $units = Unit::all()->where('is_active', 1);
        return view('course.edit', ['course' => $course, 'units' => $units, 'title' => 'Edit Course']);
    }

    public function update(Course $course)
    {
        request()->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|size:6',
            'curriculum_year' => 'required',
            'unit_id' => 'required',
            'course_name_en' => 'required|string|max:255'
        ], [
            'course_name.required' => 'Course name harus diisi',
            'course_code.required' => 'Course code harus diisi',
            'course_code.size' => 'Course code harus 6 karakter',
            'curriculum_year.required' => 'Curriculum year harus diisi',
            'unit_id.required' => 'Unit harus diisi',
            'course_name_en.required' => 'Course name (EN) harus diisi'
        ]);

        $course->update([
            'course_name' => request('course_name'),
            'course_code' => request('course_code'),
            'year' => request('curriculum_year'),
            'unit_id' => request('unit_id'),
            'course_name_en' => request('course_name_en')
        ]);

        return redirect()->route('course.edit', $course->id)->with('success', 'Course berhasil diupdate');
    }

    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->route('courses')->with('success', 'Course berhasil dihapus');
    }
}
