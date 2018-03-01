@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($sanpham->promotion_price >0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="public/source/image/product/{{$sanpham->image}}" alt="{{$sanpham->name}}">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h3>{{$sanpham->name}}</h3></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price >0)
									<span class="flash-del">{{number_format($sanpham->unit_price,0,',','.')}}</span>
									<span class="flash-sale">{{number_format($sanpham->promotion_price,0,',','.')}}</span>
									@else
									<span>{{number_format($sanpham->unit_price,0,',','.')}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{(!empty($sanpham->description))?$sanpham->description:'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque nulla quis dolor, eius, fuga repudiandae debitis eaque. Repellat necessitatibus, corporis sed esse quisquam et expedita? Ratione qui nemo animi. Illum cum saepe nisi laudantium obcaecati aliquam veniam doloremque aperiam nostrum atque eligendi, maxime aliquid. Ad reprehenderit, molestiae repellendus non deserunt.'}}</p>
							</div>
							<div class="space20">&nbsp;</div>
							
							<p>Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{(!empty($sanpham->description))?$sanpham->description:'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque nulla quis dolor, eius, fuga repudiandae debitis eaque. Repellat necessitatibus, corporis sed esse quisquam et expedita? Ratione qui nemo animi. Illum cum saepe nisi laudantium obcaecati aliquam veniam doloremque aperiam nostrum atque eligendi, maxime aliquid. Ad reprehenderit, molestiae repellendus non deserunt.'}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@if(!empty($sp_tt))
								@foreach($sp_tt as $sanpham)
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
						<div class="row">{{ $sp_tt->links() }}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection