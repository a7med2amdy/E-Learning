@extends('admin.master')
@section('title',$event->name)

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Event</h2> 
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <p id="simpleinput" class="form-control" >{{ $event->name }}</p>
                
              </div>
              
              <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <p id="simpleinput" class="form-control" >{{ $event->day }}</p>
              </div>

              <div class="form-group mb-3">
                <label for="simpleinput">Image</label>
                <p id="simpleinput" class="form-control" > {{ $event->image }}</p>
                <img src="{{ asset("storage/events/$event->image")  }}"  width="240px" > 
              </div>
              
              <div class="form-group mb-3">
                <label for="example-textarea">Description</label>
                <p id="simpleinput" class="form-control" >{{ $event->description }}</p>
              </div>

          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection