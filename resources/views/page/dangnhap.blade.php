@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	@if(Session::has('thongbao'))
		<div class="row">
			<div class="container">
				<div class="col-md-6 col-md-offset-3">
					<div class="alert alert-success fade in alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				  		<h3 style="font-weight: 100; font-size: 20px;">{{Session::get('thongbao')}}</h3>
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="container">
		<div id="content">
			@if(count($errors)>0)
				<div class="alret alert-danger fade in alert-dismissable" style="text-align: center;font-size: 20px;padding-top: 10px;padding-bottom: 10px; margin-bottom: 23px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					{{$errors->first()}}
				</div>
			@endif
			@if(Session::has('flag'))
				<div class="alret alert-danger fade in alert-dismissable" style="text-align: center;font-size: 20px;padding-top: 10px;padding-bottom: 10px; margin-bottom: 23px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					{{Session::get('message')}}
				</div>
			@endif
			<form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
				{{ csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" required name="email" value="{{old('email')}}">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" required name="password">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection