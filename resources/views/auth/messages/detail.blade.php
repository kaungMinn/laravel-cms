@extends('layout.auth')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

@endsection



@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Message Detail</h4>
              </div>
              <div class="card-body">
                <p>{{$message->content}}</p>
              </div>
            </div>
          </div>
          
        </div>
 </div>

@endsection


