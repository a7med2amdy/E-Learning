@extends('admin.master')
@section('title','lessons')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">lessons</h2>
         
          <div class="page-title-right">
            <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">
              Add lesson
            </a>
          </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('add_lesson_status')" />
        
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->                         
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="30%">Name</th>
                      <th width="15%">course</th>
                      <th width="15%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(count($lessons)>0)
                       @foreach ($lessons as $lesson )
                       <tr>
                        <td>{{ $lessons->firstItem()+$loop->index }}</td>
                        <td>{{ $lesson->course->name }}</td>
                        <td>
                          {{ $lesson->fee }}

                        </td>
                        <td>
                          <a href="{{ route('admin.lessons.show',['lesson'=>$lesson]) }}"  class="btn btn-primary">
                            <i class="fe fe-eye fa-2x"></i>
                          </a>
                         
                         
                         
                          <form 
                            action="{{ route('admin.lessons.destroy',['lesson' => $lesson]) }}"
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
        {{ $lessons->render('pagination::bootstrap-4') }}
        </div>
       
    </div> 
</div>         
@endsection