@extends('layout.website')

@section('title', $post->title)



@section('content')

<div class="container">
@if(session('info'))
	<div class="alert alert-danger mt-4">
		<li class="list-group-item list-group-item-warning">
		{{session('info')}}
		</li>
	</div>
  @endif
</div>



<section class="page-wrapper">

	<div class="container">
		<a href="{{url('auth/posts')}}" class="btn btn-primary">>>Dashboard Posts</a>
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<h2 class="post-title">{{$post->title? $post->title : ""}}</h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="ion-calendar"></i> {{$post->created_at->diffForHumans()}}
							</li>
							
							<li>
								<a href="#"><i class="ion-pricetags"></i>{{$post->category->name}}</a>
							</li>

						</ul>
					</div>
					<div class="post-thumb">
						<img class="img-fluid" src="{{$post->gallery->image}}" alt="">
					</div>
					<div class="post-content post-excerpt" >
						<p>{!!$post->description!!} </p>
						
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</section>


@endsection