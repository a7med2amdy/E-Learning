<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\Trainer;
use App\Models\Category;
use App\lessons\NewlessonAdded;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorelessonRequest;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Requests\UpdatelessonRequest;
use App\Models\Course;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $lessons = Lesson::paginate('10');
        return view('admin.lessons.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.lessons.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelessonRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('lessons', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        // video uploading 
        // 1- get video
        $video = $request->video;
        // 2- change it's current name
        $newVideoName = time() . '-' . $video->getClientOriginalName();
        // 3- move image to my project
        $video->storeAs('lessons', $newVideoName, 'public');
        // 4- save new name to database record
        $data['video'] = $newVideoName;


        $courseId = Course::where('name', $data['course'])->value('id');
        $data['course_id'] = $courseId;

        Lesson::create($data);
 
        return to_route('admin.lessons.create')->with('add_lesson_status','Your lesson Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(lesson $lesson)
    {
        
        return view('admin.lessons.show',get_defined_vars());
    }


    
    public function destroy(lesson $lesson)
    {
        $lesson->delete();
        return to_route('admin.lessons.index');
    }
}
