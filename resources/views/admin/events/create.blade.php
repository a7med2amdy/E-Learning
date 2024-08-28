@extends('admin.master')
@section('title','Event')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Add new Event</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
              @csrf
              <x-auth-session-status class="mb-4" :status="session('add_event_status')" />
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label for="simpleinput">Name</label>
                  <input type="text" id="simpleinput" class="form-control" name="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                  <label for="day" class="form-label">Day</label>
                  <input type="datetime-local" id="day" name="day" class="form-control">
                  <x-input-error :messages="$errors->get('day')" class="mt-2" />
                </div>

                <div class="form-group mb-3">
                  <label for="simpleinput">Image</label>
                  <input type="file" id="simpleinput" class="form-control" name="image">
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                
                <div class="form-group mb-3">
                  <label for="example-textarea">Description</label>
                  <textarea class="form-control" id="example-textarea" rows="4" name="description"></textarea>
                  <x-input-error :messages="$errors->get('description')" class="mt-2" />
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