@extends('admin.master')
@section('title','Messages')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Messages</h2>  
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->
         
                
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="20%">#</th>
                      <th width="25%">Name</th>
                      <th width="25%">Subject</th>
                      <th width="25%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($messages)>0)
                      @foreach ($messages as $key =>$message )
                        <tr>
                          <td>{{ $messages->firstItem()+$loop->index }}</td>
                          <td>{{ $message->name }}</td>
                          <td>{{ $message->subject }}</td>
                          
                          <td>
                            <a href="{{ route('admin.messages.show',['message'=>$message ]) }}" class="btn  btn-primary" >
                              <i class="fe fe-eye fa-2x"></i>
                            </a>
                            <form action="{{ route('admin.messages.destroy',['message'=>$message]) }}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button class="btn  btn-danger">
                                <i class="fe fe-trash fa-2x"></i>
                              </button>
                              
                               
                              
                            </form>
                            </td>                        
                        </tr>
                      @endforeach
                    
                    @else
                      
                    @endif
                    

                  </tbody>
                </table>
                {{ $messages->render('pagination::bootstrap-4') }}
              </div>
            </div>
          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection