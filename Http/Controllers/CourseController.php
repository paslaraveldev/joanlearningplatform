<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;


class CourseController extends Controller
{
     public function index()
    {
        $courses = Courses::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:courses',
            'description' => 'required|string',
           'link' => 'nullable|string',
        ]);

        Courses::create($request->all());
        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $course = Courses::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);

        $request->validate([
                       'title' => 'required|string|max:255|unique:courses',

            'description' => 'required|string',
           'link' => 'nullable|string',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index');
    }
}
