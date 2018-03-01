@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@if(!empty($loai))
								@foreach($loai as $l)
									<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{(!empty($sp_theoloai[0]))?$sp_theoloai[0]->product_type->name:''}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ $countsp}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@if(!empty($sp_theoloai))
									@foreach($sp_theoloai as $sanpham)
										<div class="col-sm-4">
											<div class="single-item">
												@if($sanpham->promotion_price >0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
												<div class="single-item-header">
													<a href="{{route('chitietsanpham',$sanpham->id)}}"><img src="public/source/image/product/{{$sanpham->image}}" alt="{{$sanpham->name}}"></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$sanpham->name}}</p>
													<p class="single-item-price">
														@if($sanpham->promotion_price >0)
														<span class="flash-del">{{number_format($sanpham->unit_price,0,',','.')}}</span>
														<span class="flash-sale">{{number_format($sanpham->promotion_price,0,',','.')}}</span>
														@else
														<span>{{number_format($sanpham->unit_price,0,',','.')}}</span>
														@endif
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
							<div class="row">{{ $sp_theoloai->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@if(!empty($sp_khac))
									@foreach($sp_khac as $sanpham)
										<div class="col-sm-4">
											<div class="single-item">
												@if($sanpham->promotion_price >0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
												<div class="single-item-header">
													<a href="{{route('chitietsanpham',$sanpham->id)}}"><img src="public/source/image/product/{{$sanpham->image}}" alt="{{$sanpham->name}}"></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$sanpham->name}}</p>
													<p class="single-item-price">
														@if($sanpham->promotion_price >0)
														<span class="flash-del">{{number_format($sanpham->unit_price,0,',','.')}}</span>
														<span class="flash-sale">{{number_format($sanpham->promotion_price,0,',','.')}}</span>
														@else
														<span>{{number_format($sanpham->unit_price,0,',','.')}}</span>
														@endif
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection