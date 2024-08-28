@extends('admin.master')
@section('title','Courses')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Courses</h2>
         
          <div class="page-title-right">
            <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
              Add course
            </a>
          </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('add_course_status')" />
        
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->                         
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="30%">Name</th>
                      <th width="15%">fee</th>
                      <th width="15%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(count($courses)>0)
                       @foreach ($courses as $course )
                       <tr>
                        <td>{{ $courses->firstItem()+$loop->index }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                          {{ $course->fee }}

                        </td>
                        <td>
                          <a href="{{ route('admin.courses.show',['course'=>$course]) }}"  class="btn btn-primary">
                            <i class="fe fe-eye fa-2x"></i>
                          </a>
                         
                         
                         
                          <form 
                            action="{{ route('admin.courses.destroy',['course' => $course]) }}"
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
        {{ $courses->render('pagination::bootstrap-4') }}
        </div>
       
    </div> 
</div>         
@endsection