@extends('layout.auth')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{asset('/assets/dashboard/img/logo-small.png')}}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{asset('/assets/dashboard/img/logo-small.png')}}" alt="...">
                    <h5 class="title">{{$user->name}}</h5>
                  </a>
                  
                </div>

                @if(auth()->user()->moto > 0)
                <p class="description text-center">
                  {{$user->moto}}
                </p>

                @else 

                <p style="color: red; text-align:center">
                  Add Your Moto Here!
                </p>

                <form action="" method="post"  class="text-center">
                  @csrf 

                  <input type="hidden" name="name" value="{{$user->name}}">
                  <input type="hidden" name="email" value="{{$user->email}}">
                  <input type="hidden" name="address" value="{{$user->address}}">
                  <input type="hidden" name="city" value="{{$user->city}}">
                  <input type="hidden" name="country" value="{{$user->country}}">
                  <input type="hidden" name="zip_code" value="{{$user->zip_code}}">
                  <input type="hidden" name="about_me" value="{{$user->about_me}}">
                
                  <input type="hidden" name="">
                  <textarea name="moto" class="form-control"></textarea>
                  <button class="btn btn-primary ">Add Moto</button>
                </form>

                @endif
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>{{count($user->posts)}}<br><small>Posts</small></h5>
                    </div>
                    <div class="col-lg-5 col-md-6 col-6 ml-auto mr-auto">
                      <h5>{{count($user->comments)}}<br><small>Comments</small></h5>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  @csrf
                  <div class="row">
                    
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name"  class="form-control" placeholder="Username" value="{{$user->name}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}"  required>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="{{$user->address}}" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="{{$user->city}}" name="city">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="{{$user->country}}" name="country">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code" name="zip_code" value="{{$user->zip_code}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control textarea" name="about_me" placeholder="Write something about you">{{$user->about_me}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Your Moto</label>
                        <textarea class="form-control textarea" name="moto" placeholder="Your Moto Here">{{$user->moto}}</textarea>
                      </div>
                    </div>                    
                  </div>

                  

                  <div class="row">
                      <div class="update ml-4">
                        <button type="submit" class="btn btn-primary ">Update Profile</button>
                      </div>
                     </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection