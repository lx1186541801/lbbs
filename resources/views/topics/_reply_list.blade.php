@if (count($replies))


	<ul class="list-unstyled">
		@foreach ($replies as $index => $reply)
			<li class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
				
				<div class="media-left">
					<a href="{{ route('users.show', [$reply->user_id]) }}">
						<img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" class="media-object img-thumbnail mr-3" style="windth:48px;height: 48px;" />
					</a>
				</div>

				<div class="media-body">
					<div class="media-heading mt-0 mb-1 text-secondary">
						<a href="{{ route('users.show', $reply->user_id) }}" title="{{ $reply->user->name }}">
							{{ $reply->user->name }}
						</a>
						<span class="text-secondary"> · </span>
						<span class="meta text-secondary" title="{{ $reply->created_at }}">
							{{ $reply->created_at->diffForHumans() }}
						</span>
						@can('destroy', $reply)
							<span class="meta float-right">
								<form action="{{ route('replies.destroy', $reply->id) }}" method="post" onsubmit="return confirm('确定删除？');">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
										<i class="far fa-trash-alt"></i>
									</button>
								</form>
								
							</span> 
						@endcan
						
					</div>

					<div class="reply-content text-secondary">
						{!! $reply->content !!}
					</div>
				</div>
			</li>

			@if ( ! $loop->last)
				<hr>
			@endif

		@endforeach
	</ul>
@else
	<div class="empty-block">暂无数据^~^</div>
@endif