@extends('admin.master')
@section('title','Settings')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title ">Setting</h2>
         
          
        </div>
        
        <div class="card shadow">
          <div class="card-body">
            
            <form method="POST" action="{{ route('admin.settings.update',['setting'=>$setting]) }}">
              @csrf
              @method('PUT')
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="simpleinput">address</label>
                  <input type="text" id="simpleinput" class="form-control" name="address" value="{{ $setting->address }}">
                  <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                
                <div class="form-group mb-3">
                  <label for="simpleinput">phone</label>
                  <input type="text" id="simpleinput" class="form-control" name="phone" value="{{ $setting->phone }}">
                  <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="form-group mb-3">
                  <label for="simpleinput">email</label>
                  <input type="text" id="simpleinput" class="form-control" name="email" value="{{ $setting->email }}">
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <div class="form-group mb-3">
                  <label for="simpleinput">facebook</label>
                  <input type="text" id="simpleinput" class="form-control" name="facebook" value="{{ $setting->facebook }}">
                  <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                </div>

                <div class="form-group mb-3">
                  <label for="simpleinput">twitter</label>
                  <input type="text" id="simpleinput" class="form-control" name="twitter" value="{{ $setting->twitter }}">
                  <x-input-error :messages="$errors->get('twitter')" class="mt-2" />
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