@extends('layout.auth')


@section('content')

@extends('layout.website')

@section('title', $post->title)

@section('content')





<section class="page-wrapper">
	<div class="container">
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
					<div class="post-comments">
						<h3 class="post-sub-heading">10 Comments</h3>
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
											<a href="#!">Jonathon Andrew</a>
										</h4>
										<time>{{$comment->created_at->diffForHumans()}}</time>
										
										<a href="{{url("comments/delete/$comment->id")}}" class="btn btn-danger btn-sm float-right ml-2">Delete</a>
										<a class="btn btn-secondary btn-sm float-right">Edit</a>
										
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
						<h3 class="post-sub-heading">Leave Your Comments</h3>
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

@endsection