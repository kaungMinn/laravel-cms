@extends('layout.auth')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection



@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Message Table</h4>
              </div>
              <div class="card-body">
                @if(count($messages) > 0 )
                <div class="table-responsive">
                  <table class="table" id="posts-table">
                    <thead class=" text-primary">
                    <tr>
                      <th>
                        Message
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Subject
                      </th>
                      <th>
                        Email
                      </th>

                      <th>
                        Action
                      </th>
                      

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                         <tr>
                            <td>
                                {{$message->content}}
                            </td>
                            <td>
                                {{$message->name}}
                            </td>
                            <td>
                                {{$message->subject}}
                            </td>
                            <td>
                                {{$message->email}}
                            </td>  

                            <td class="">
                            <a href="{{url("/messages/detail/$message->id")}}" class="btn btn-success btn-sm">View Message</a>
                            </td>
                      </tr>

                        @endforeach
                    </tbody>
                  </table>
                </div>

                @else
                    <h3 class="text-center text-danger">No Message Found</h3>
                @endif
              </div>
            </div>
          </div>
          
        </div>
 </div>

@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>



<script>
  $(document).ready(function(){
    $('#posts-table').DataTable();
  });
</script>
@endsection

