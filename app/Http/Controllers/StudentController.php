<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentFormRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $students = Student::all()->toArray();
        return array_reverse($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Http\Requests\StudentFormRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StudentFormRequest $request)
    {
        $post = new Student($request->validated());
        $post->save();

        return response()->json(__('The Student successfully added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StudentFormRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StudentFormRequest $request, Student $student)
    {
        $student->update($request->validated());
        return response()->json(__('The Student successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(__('The Student successfully updated'));
    }
}
