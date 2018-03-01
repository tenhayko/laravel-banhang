@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
			{{ csrf_field()}}
				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
						@if(count($errors)>0)
							<div class="alret alert-danger fade in alert-dismissable" style="text-align: center;font-size: 20px;padding-top: 10px;padding-bottom: 10px; margin-bottom: 23px;">
								<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								{{$errors->first()}}
							</div>
						@endif
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required value="{{old('email')}}">
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="fullname" required value="{{old('fullname')}}">
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" placeholder="Street Address" required value="{{old('address')}}">
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" required value="{{old('phone')}}">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required value="{{old('password')}}">
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re_password" required value="{{old('re_password')}}">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection