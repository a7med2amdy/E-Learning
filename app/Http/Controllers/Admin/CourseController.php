<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Category;
use App\courses\NewcourseAdded;
use App\Events\NewCourseEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecourseRequest;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Requests\UpdatecourseRequest;
use App\Notifications\NewCourseNotification;
use Illuminate\Support\Facades\Notification;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $courses = Course::paginate('10');
        return view('admin.courses.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecourseRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('courses', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        // video uploading 
        // 1- get video
        $video = $request->video;
        // 2- change it's current name
        $newVideoName = time() . '-' . $video->getClientOriginalName();
        // 3- move image to my project
        $video->storeAs('videos', $newVideoName, 'public');
        // 4- save new name to database record
        $data['video'] = $newVideoName;


        $categoryId = Category::where('name', $data['category'])->value('id');
        $data['category_id'] = $categoryId;
        $trainerId = Trainer::where('name',$data['trainer'])->value('id');
        $data['trainer_id'] = $trainerId;

        

        $course =  course::create($data);
        $users = User::where('user_type','user')->get();
        Notification::send($users,new NewCourseNotification($course)) ; 
        $message = 'broadcast message';
        Broadcast(new NewCourseEvent($message));
        return to_route('admin.courses.create')->with('add_course_status','Your course Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        
        return view('admin.courses.show',get_defined_vars());
    }


    
    public function destroy(Course $course)
    {
        $course->delete();
        return to_route('admin.courses.index');
    }
}
