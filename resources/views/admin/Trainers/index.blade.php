@extends('admin.master')
@section('title','Trainers')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Trainers</h2>
         
          <div class="page-title-right">
            <a href="{{ route('admin.trainers.create') }}" class="btn btn-primary">
              Add trainer
            </a>
          </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('add_trainer_status')" />
        
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->                         
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="30%">Name</th>
                      <th width="15%">specialty</th>
                      <th width="15%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(count($trainers)>0)
                       @foreach ($trainers as $trainer )
                       <tr>
                        <td>{{ $trainers->firstItem()+$loop->index }}</td>
                        <td>{{ $trainer->name }}</td>
                        <td>
                          {{ $trainer->specialty }}

                        </td>
                        <td>
                          <a href="{{ route('admin.trainers.show',['trainer'=>$trainer]) }}"  class="btn btn-primary">
                            <i class="fe fe-eye fa-2x"></i>
                          </a>
                         
                         
                         
                          <form 
                            action="{{ route('admin.trainers.destroy',['trainer' => $trainer]) }}"
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
        {{ $trainers->render('pagination::bootstrap-4') }}
        </div>
       
    </div> 
</div>         
@endsection