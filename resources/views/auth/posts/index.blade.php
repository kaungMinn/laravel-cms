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
                <h4 class="card-title"> Post Table</h4>
              </div>
              <div class="card-body">
                @if(count($posts) > 0 )
                <div class="table-responsive">
                  <table class="table" id="posts-table">
                    <thead class=" text-primary">
                    <tr>
                      <th>
                        Image
                      </th>
                      <th>
                        Title
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Category
                      </th>
                      <th>
                        Status
                      </th>
                      <th class="text-right">
                        Action
                      </th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                         <tr>
                            <td>
                                <img src="{{$post->gallery->image}}" style="width: 70px" alt="image">
                            </td>
                            <td>
                            {{$post->title}}
                            </td>
                            <td>
                            {!!Str::limit($post->description, 15)!!}
                            </td>

                            <td>
                                {{$post->category->name}}
                            </td>
                            <td>
                                {{$post->is_published == 1? 'Published' : 'Draft'}}
                            </td>
                            <td class="text-right">
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                <form action="{{route('posts.destroy', $post->id)}}" method="post" style="display: inline;">
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

