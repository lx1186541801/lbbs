@extends('layouts.app')
@section('title', $user->name . "信息编辑")

@section('content')
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header">
					<h4>
						<i class="glyphicon glyphicon-edit">编辑个人资料</i>
					</h4>
				</div>

				<div class="card-body">
					<form action="{{ route('users.update', $user->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('shared._errors')

						<div class="form-group">
							<label for="name-field">用户名</label>
							<input type="text" class="form-control" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
						</div>

						<div class="form-group">
							<label for="email-field">邮箱</label>
							<input type="email" class="form-control" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
						</div>

						<div class="form-group">
							<label for="introduction-field">个人简介</label>
							<textarea name="introduction" id="introduction-field" rows="3" class="form-control">
								{{ old('introduction', $user->introduction) }}
							</textarea>
						</div>

						<div class="form-group mb-4">
							<label for="" class="avatar-label">头像</label>
							<input type="file" class="form-control-file" name="avatar">
						</div>

						@if ($user->avatar)
							<br>
							<img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="thumbnail img-responsive" width="200">
						@endif


						<div class="well well-sm">
							<button class="btn btn-primary" type="sublmit">保存</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@stop