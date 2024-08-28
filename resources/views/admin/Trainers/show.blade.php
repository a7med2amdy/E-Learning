@extends('admin.master')
@section('title',"Trainer")

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">$trainer->name</h2> 
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <p id="simpleinput" class="form-control" >{{ $trainer->name }}</p>
                
              </div>
              
              <div class="mb-3">
                <label for="specialty" class="form-label">specialty</label>
                <p id="simpleinput" class="form-control" >{{ $trainer->specialty }}</p>
              </div>

              <div class="form-group mb-3">
                <label for="simpleinput">Image</label>
                <p id="simpleinput" class="form-control" > {{ $trainer->image }}</p>
                <img src="{{ asset("storage/trainers/$trainer->image")  }}"  width="240px" > 
              </div>
              
              <div class="form-group mb-3">
                <label for="example-textarea">Description</label>
                <p id="simpleinput" class="form-control" >{{ $trainer->description }}</p>
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput">Facebook</label>
                <p id="simpleinput" class="form-control" >{{ $trainer->facebook }}</p>
                
              </div>
              <div class="form-group mb-3">
                <label for="simpleinput">Inestagram</label>
                <p id="simpleinput" class="form-control" >{{ $trainer->inestagram }}</p>
                
              </div>

          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection