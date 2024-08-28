<?php

namespace App\Http\Controllers\Admin;


use App\trainers\NewtrainerAdded;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdatetrainerRequest;
use App\Models\Trainer;
use Illuminate\Support\Facades\Broadcast;


class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::paginate('10');
        return view('admin.trainers.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainers.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainerRequest $request)
    {
        $data = $request->validated();
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('trainers', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;
        trainer::create($data);

       
        return to_route('admin.trainers.create')->with('add_trainer_status','Your trainer Added Successfully');
    }

    public function show(Trainer $trainer)
    {
        return view('admin.trainers.show',get_defined_vars());
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return to_route('admin.trainers.index');
    }
}
