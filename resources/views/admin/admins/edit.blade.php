@extends('admin.master')
@section('title','Edit Feature')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Edit Admin's Info</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="{{ route('admin.admins.update',['admin'=>$admin]) }}">
              @csrf
              @method('PUT')
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label for="simpleinput">Title</label>
                  <input type="text" id="simpleinput" class="form-control" name="title" value="{{ $feature->title }}">
                  <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                
                <div class="form-group mb-3">
                  <label for="simpleinput">Icon</label>
                  <input type="text" id="simpleinput" class="form-control" name="icon" value="{{ $feature->icon }}">
                  <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>


                <div class="form-group mb-3">
                  <label for="example-textarea">Description</label>
                  <textarea class="form-control"  rows="4" name="description" value="{{ $feature->description }}" ></textarea>
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
@endsection