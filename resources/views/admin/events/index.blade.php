@extends('admin.master')
@section('title','Event')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Events</h2>
         
          <div class="page-title-right">
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
              Add Event
            </a>
          </div>
        </div>
        <x-auth-session-status class="mb-4" :status="session('add_event_status')" />
        <x-auth-session-status class="mb-4" :status="session('update_event_status')" />
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->                         
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="30%">Name</th>
                      <th width="15%">Day</th>
                      <th width="15%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(count($events)>0)
                       @foreach ($events as $event )
                       <tr>
                        <td>{{ $events->firstItem()+$loop->index }}</td>
                        <td>{{ $event->name }}</td>
                        <td>
                          {{ $event->day }}

                        </td>
                        <td>
                          <a href="{{ route('admin.events.show',['event'=>$event]) }}"  class="btn btn-primary">
                            <i class="fe fe-eye fa-2x"></i>
                          </a>
                         
                          <a href="{{ route('admin.events.edit',['event'=>$event]) }}"  class="btn btn-success">
                            <i class="fe fe-edit fa-2x"></i>
                          </a>
                         
                          <form 
                            action="{{ route('admin.events.destroy',['event' => $event]) }}"
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
        {{ $events->render('pagination::bootstrap-4') }}
        </div>
       
    </div> 
</div>         
@endsection