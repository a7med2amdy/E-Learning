@extends('admin.master')
@section('title','Add New Service')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Add new feature</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="  {{ route('admin.admins.store') }} " enctype="multipart/form-data">
              @csrf
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="simpleinput">name</label>
                  <input type="text" id="simpleinput" class="form-control" name="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group mb-3">
                  <label for="simpleinput">Email</label>
                  <input type="text" id="simpleinput" class="form-control" name="email">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <div class="form-group mb-3">
                  <label for="example-textarea">password</label>
                  <input type="text" class="form-control" id="example-textarea"  name="password"></input>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-group mb-3">
                  <label for="example-textarea">Image</label>
                  <input type="file" id="simpleinput" class="form-control" name="image">
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
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