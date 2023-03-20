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
                <h4 class="card-title" style="display: inline"> Category Table</h4>
                <a href="{{route('categories.create')}}" class="btn btn-info float-right"><i class="nc-icon nc-tag-content"></i>  Add</a>
              </div>
              <div class="card-body">
                @if(count($categories) > 0 )
                <div class="table-responsive">
                  <table class="table" id="posts-table">
                    <thead class=" text-primary">
                    <tr>
                      <th>
                        Id
                      </th>
                      <th>
                        Name
                      </th>

                      <th>
                        Created at
                      </th>

                      <th>
                        Updated at
                      </th>

                      <th class="text-right">
                        Action
                      </th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                         <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                            {{$category->name}}
                            </td>

                            <td>
                                {{$category->created_at->diffForHumans()}}
                            </td>

                            <td>
                                {{$category->updated_at->diffForHumans()}}
                            </td>
                       
                            <td class="text-right">

                                <a href="{{route('categories.show',$category->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                <form action="{{route('categories.destroy', $category->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                      </tr>

                        @endforeach
                    </tbody>
                  </table>
                </div>

                @else
                    <h3 class="text-center text-danger">No Posts Found</h3>
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

