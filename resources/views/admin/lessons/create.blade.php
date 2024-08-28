@extends('admin.master')
@section('title','Lessons')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Add new lesson</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="{{ route('admin.lessons.store') }}" enctype="multipart/form-data">
              @csrf
              <x-auth-session-status class="mb-4" :status="session('add_lesson_status')" />
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label for="simpleinput">Name</label>
                  <input type="text" id="simpleinput" class="form-control" name="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                

                <div class="form-group mb-3">
                  <label for="simpleinput">Image</label>
                  <input type="file" id="simpleinput" class="form-control" name="image">
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="form-group">
                  <label for="video">Video</label>
                  <input type="file" name="video" id="video" class="form-control">
                  <x-input-error :messages="$errors->get('video')" class="mt-2" />
                </div>
                
                {{-- <div class="form-group mb-3">
                  <label for="example-textarea">Description</label>
                  <textarea class="form-control" id="example-textarea" rows="4" name="description"></textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div> --}}

                
                <div class="form-group mb-4">
                  <label for="course" class="form-label fw-bold">Course</label>
                  <div class="input-group">
                      <select name="course" id="course" class="form-select form-select-lg">
                          <option value="" disabled selected>Select a course</option>
                          @if (count($courses) > 0)
                              @foreach ($courses as $course)
                                  <option value="{{ $course->name }}">{{ $course->name }}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                  <x-input-error :messages="$errors->get('course')" class="mt-2 text-danger" />
                </div> 


              </div>
              </div> <!-- /.col -->
              <div class="page-title-right">
                <button type="submit" class="btn btn-primary">Submet</button>
              </div>
            </form>
           
          </div> 
        </div>
        </div>
    </div> 
</div>         
@endsection