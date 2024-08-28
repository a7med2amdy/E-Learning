@extends('admin.master')
@section('title','Message')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">message</h2> 
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <p id="simpleinput" class="form-control" >{{ $message->name }}</p>
              </div>

              <div class="form-group mb-3">
                <label for="simpleinput">Email</label>
                <p id="simpleinput" class="form-control" >{{ $message->email }}</p>
              </div>

              <div class="form-group mb-3">
                <label for="simpleinput">Subject</label>
                <p id="simpleinput" class="form-control" >{{ $message->subject }}</p>
              </div>
              
              <div class="form-group mb-3">
                <label for="example-textarea">Message</label>
                <p id="simpleinput" class="form-control" >{{ $message->message}}</p>
              </div>
                
                
                
              
          
          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>     
@endsection