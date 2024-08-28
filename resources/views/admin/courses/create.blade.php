@php
  $categories = \App\Models\Category::all();
  $trainers = \App\Models\Trainer::all();
@endphp

@extends('admin.master')
@section('title','Courses')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Add new course</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
              @csrf
              <x-auth-session-status class="mb-4" :status="session('add_course_status')" />
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label for="simpleinput">Name</label>
                  <input type="text" id="simpleinput" class="form-control" name="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                  <label for="fee" class="form-label">fee</label>
                  <input type="text" id="fee" name="fee" class="form-control">
                  <x-input-error :messages="$errors->get('fee')" class="mt-2" />
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
                
                <div class="form-group mb-3">
                  <label for="example-textarea">Description</label>
                  <textarea class="form-control" id="example-textarea" rows="4" name="description"></textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                
                <div class="form-group mb-4">
                  <label for="category" class="form-label fw-bold">Category</label>
                  <div class="input-group">
                      <select name="category" id="category" class="form-select form-select-lg">
                          <option value="" disabled selected>Select a category</option>
                          @if (count($categories) > 0)
                              @foreach ($categories as $category)
                                  <option value="{{ $category->name }}">{{ $category->name }}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                  <x-input-error :messages="$errors->get('category')" class="mt-2 text-danger" />
                </div> 

                <div class="form-group mb-4">
                  <label for="trainer" class="form-label fw-bold">trainer</label>
                  <div class="input-group">
                      <select name="trainer" id="trainer" class="form-select form-select-lg">
                          <option value="" disabled selected>Select a trainer</option>
                          @if (count($trainers) > 0)
                              @foreach ($trainers as $trainer)
                                  <option value="{{ $trainer->name }}">{{ $trainer->name }}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                  <x-input-error :messages="$errors->get('trainer')" class="mt-2 text-danger" />
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