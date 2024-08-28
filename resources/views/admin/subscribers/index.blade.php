@extends('admin.master')
@section('title','Subscribers')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="h5 page-title">Subscribers</h2>  
        </div>
        
        <div class="card shadow">
          <div class="card-body">
          <!--  table -->
         
                
                <table class="table table-hover w-100">
                  <thead>
                    <tr>
                      <th width="15%">#</th>
                      <th width="60%">Email</th>
                      
                      <th width="25%">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($subscribers)>0)
                      @foreach ($subscribers as $key =>$subscriber )
                        <tr>
                          <td>{{ ($loop->index)+1 }}</td>
                          
                          <td>{{ $subscriber->email }}</td>
                          
                          
                          <td>
                           
                            <form action="{{ route('admin.subscribers.destroy',['subscriber'=>$subscriber]) }}" method="post" class="d-inline">
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
               
              </div>
            </div>
          </div> <!-- simple table -->
        </div>
        </div>
    </div> 
</div>         
@endsection