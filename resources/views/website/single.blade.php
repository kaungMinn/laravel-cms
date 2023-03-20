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


  @if(session('error'))
	<div class="alert alert-danger mt-4">
		<li class="list-group-item list-group-item-warning">
		{{session('error')}}
		</li>
	</div>
  @endif

@if($errors->any())

	<div class="alert alert-danger mt-4">
		<li class="list-group-item list-group-item-warning">
			@foreach($errors->all() as $error)
				{{$error}}
			@endforeach
		</li>
	</div>

@endif
</div>

<section class="page-title bg-2">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Blog Post</h1>
          <p>The social media platforms have taken over the distribution of news globally. They treat a lie the same way you would treat a fact.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<h2 class="post-title">{{$post->title? $post->title : ""}}</h2>
					<div class="post-meta">
						<ul>
							<li>
							<i class="ion-android-people"></i> {{$post->user->name}}
							</li>

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
					<div class="post-comments">
						<h3 class="post-sub-heading">{{count($post->comments)}} Comments</h3>
						<ul class="media-list comments-list m-bot-50 clearlist">
							<!-- Comment Item start-->
							@foreach($post->comments as $comment)
							<li class="media">
								<a class="pull-left" href="#!">
									<img class="media-object comment-avatar rounded-circle" src="{{asset('/assets/website/images/blog/avater-1.jpg')}}" alt="" width="50" height="50">
								</a>
								<div class="media-body">
									<div class="comment-info">
										<h4 class="comment-author">
											<a href="#!">
												
											{{$comment->user->name}}</a>
										</h4>
										<time>{{$comment->created_at->diffForHumans()}}</time>
										
										@auth 
											@can('comment-delete',$comment)

											<a href="{{url("comments/delete/$comment->id")}}" class="btn btn-danger btn-sm float-right ml-2">Delete</a>
											@endcan

										@endauth
										
										
									</div>
									<p>
										{{$comment->content}}
									</p>
									
								</div>
							</li>

							@endforeach

							
							<!-- End Comment Item -->

							
						
					</div>
					<div class="post-comments-form">
						<h3 class="post-sub-heading">Leave You Comments</h3>
						<form method="post" action="{{url('/comments/create')}}" id="form" role="form">
							@csrf 
						
							<div class="row">
								
								
								<input type="hidden" name="post_id" value={{$post->id}}>
								
								<!-- Comment -->
								

								<div class="form-group col-md-12">
									
									<textarea name="content" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
								</div>
								<!-- Send Button -->
								<div class="form-group col-md-12">
									<button type="submit" class="btn btn-main ">
										Send comment
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

<script>
	$('document').ready(function(){
		alert('hello')
	})
</script>