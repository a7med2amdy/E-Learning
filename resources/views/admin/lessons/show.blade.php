@extends('admin.master')
@section('title',"course")

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">{{ $course->name }}</h2> 
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <p id="simpleinput" class="form-control" >{{ $course->name }}</p>
                
              </div>
              
              <div class="mb-3">
                <label for="fee" class="form-label">fee</label>
                <p id="simpleinput" class="form-control" >{{ $course->fee }}</p>
              </div>

              <div class="form-group mb-3">
                <label for="simpleinput">Image</label>
                <p id="simpleinput" class="form-control" > {{ $course->image }}</p>
                <img src="{{ asset("storage/courses/$course->image")  }}"  width="240px" > 
              </div>
              
              <div class="form-group mb-3">
                <label for="example-textarea">Description</label>
                <p id="simpleinput" class="form-control" >{{ $course->description }}</p>
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput">category</label>
                <p id="simpleinput" class="form-control" >{{ $course->category->name }}</p>
                
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput">Trainer</label>
                <p id="simpleinput" class="form-control" >{{ $course->trainer->name }}</p>
                
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput">Trainer Image</label>
                <img src="{{ asset('storage/trainers/'.$course->trainer->image) }}">
                
              </div>
              

          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection