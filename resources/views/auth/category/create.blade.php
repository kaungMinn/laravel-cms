@extends('layout.auth')

@section('content')

<div class="content">
        
          
        <div class="card card-user m-auto">
          <div class="card-header">
            <h5 class="card-title">Add A New Article</h5>
          </div>

          <div class="card-body">
            <form action="{{route('categories.store')}}" method="post" >
                @csrf 


                <div class="mb-2 form-group" >
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" Placeholder="Enter New Category" name="name" required>
                </div>

                <button class="btn btn-primary">Add</button>


            </form>
          </div>
        </div>
@endsection