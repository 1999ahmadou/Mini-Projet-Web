<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use League\CommonMark\Block\Element\Document;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Courses[]|Collection|JsonResponse
     */

    public function getAllCourses()
    {
        return Courses::orderBy('created_at','asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $title
     * @return Response
     */
    public function getByTitle($title): Response
    {
        return Courses::find($title);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     */

    public function addCourses(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'cover_image' => 'required|mimes:txt,pdf,docs,doc|nullable',
                'course_image'=>'required|mimes:jpg,png|nullable',
                'prof_id'=>'required',
            ]);
        } catch (ValidationException $e) {
        }

        //verification before upload file

        if($request->HasFile('cover_image')){
            // get file name and extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // get file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get file extension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

            //upload image
            $path = $request->file('cover_image')->storeAs('public/docs', $fileNameToStore);

        }else{
            $fileNameToStore = 'NoDocument.pdf';
        }

        //verification for upload course image

        if($request->HasFile('course_image'))
        {
            // course image name;
            $courseNameWithExt = $request->file('course_image')->getClientOriginalName();

            //course image name without extension
            $courseName = pathinfo($courseNameWithExt, PATHINFO_FILENAME);

            //get course extension

            $courseExtension = $request->file('course_image')->getClientOriginalExtension();

            //course name to store
            $courseNameToStore = $courseName.'_'.time().'.'.$courseExtension;

            //
            $coursesPath = $request->file('course_image')->storeAs('public/docs/course', $courseNameToStore);

        }else
        {
            $courseNameToStore = 'NoImages.jpg|png';
        }

        $courses = new Courses;
        $courses->title = $request->input('title');
        $courses->description = $request->input('description');
        $courses->cover_image= $fileNameToStore;
        $courses->course_image=$courseNameToStore;
        $courses->prof_id = $request->input('prof_id');

        if($courses->save())
        {
            return response()->json([
                'success' => 'File uploaded successfully',
            ],200);
        }else{
            return response()->json([
                'error' => 'Something want wrong',
            ],404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function byId(int $id)
    {
        return Courses::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'cover_image' => 'required|mimes:txt,pdf,docs,doc|max:2048|nullable',
                'course_image'=>'required|mimes:jpg,png|nullable',
            ]);
        } catch (ValidationException $e) {
        }

        if($request->HasFile('cover_image')){
            // get file name and extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // get file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get file extension
            $fileExtension = $request->file('cover_image')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

            //upload image
            $path = $request->file('cover_image')->storeAs('public/docs', $fileNameToStore);

        }else{
            $fileNameToStore = 'NoDocument.pdf';
        }

        //verification for upload course image

        if($request->HasFile('course_image'))
        {
            // course image name;
            $courseNameWithExt = $request->file('course_image')->getClientOriginalName();

            //course image name without extension
            $courseName = pathinfo($courseNameWithExt, PATHINFO_FILENAME);

            //get course extension

            $courseExtension = $request->file('course_image')->getClientOriginalExtension();

            //course name to store
            $courseNameToStore = $courseName.'_'.time().'.'.$courseExtension;

            //
            $coursesPath = $request->file('course_image')->storeAs('public/docs/course', $courseNameToStore);

        }else
        {
            $courseNameToStore = 'NoImages.jpg|png';
        }

        $course = Courses::find($id);
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->cover_image= $fileNameToStore;
        $course->course_image=$courseNameToStore;

        if($course->save())
        {
            return response()->json([
                'success' => 'File updated successfully',
            ],200);
        }else{
            return response()->json([
                'error' => 'Something want wrong',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $course = Courses::find($id);

        if($course->delete())
        {
            return response()->json([ 'success' => 'File deleted successfully'],200);
        }else {
            return response()->json(['error' => 'File not deleted']);
        }
    }
}
