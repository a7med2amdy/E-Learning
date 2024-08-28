@extends('admin.master')
@section('title',$admin->name)

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Admins</h2> 
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="simpleinput">name</label>
                <p id="simpleinput" class="form-control" >{{ $admin->name }}</p>
                
              </div>
              
              <div class="form-group mb-3">
                <label for="example-textarea">Email</label>
                <p id="simpleinput" class="form-control" >{{ $admin->email }}</p>
              </div>
                
              <div class="form-group mb-3">
                <label for="example-textarea">password</label>
                <p id="simpleinput" class="form-control" >{{ $admin->password }}</p>
              </div>  
              
              <div class="form-group mb-3">
                <label for="example-textarea">Image</label>
                <p id="simpleinput"  >
                <img src="{{ asset("storage/admins/$admin->image")  }}"  width="80px" >
                </p>
              </div>
              
          
          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection