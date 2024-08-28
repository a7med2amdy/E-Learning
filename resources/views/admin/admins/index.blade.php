@extends('admin.master')
@section('title','Admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Admin</h2>
         
          <div class="page-title-right">
            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
              Add New
            </a>
          </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('add_admin_status')" />
        <x-auth-session-status class="mb-4" :status="session('update_admin_status')" />
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->
         
                
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="10%">Name</th>
                      <th width="20%">Email</th>
                      <th width="20%">image</th>
                      <th width="20%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(count($admins)>0)
                       @foreach ($admins as $admin )
                       <tr>
                        <td>{{ ($loop->index)+1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td> 
                          <img src="{{ asset("storage/admins/$admin->image")  }}"  width="40px" >
                        </td>
                        <td>
                          <a href="{{ route('admin.admins.show',['admin'=>$admin]) }}"  class="btn btn-primary">
                            <i class="fe fe-eye fa-2x"></i>
                          </a>
                         
                          <a href="{{ route('admin.admins.edit',['admin'=>$admin]) }}"  class="btn btn-success">
                            <i class="fe fe-edit fa-2x"></i>
                          </a>
                         
                          <form 
                            action="{{ route('admin.admins.destroy',['admin' => $admin]) }}"
                            method="post" class="d-inline" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                              <i class="fe fe-trash fa-2x"></i>
                            </button>
                           
                          </form>
                        </td>                        
                      </tr>
                       @endforeach
                      @endif 
                  </tbody>
                </table>
                
              </div>
            </div>
          </div> <!-- simple table -->
          
        </div>
        
        </div>
       
    </div> 
</div>         
@endsection