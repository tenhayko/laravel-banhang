@extends('master')
@section('content')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
								@if(!empty($slide))
									@foreach($slide as $slide)
										<!-- THE FIRST SLIDE -->
										<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
												<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="public/source/assets/dest/images/thumbs/1.jpg" data-src="public/source/image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('public/source/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</div>
											</div>

								        </li>
									@endforeach
								@endif;
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phầm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@if(!empty($new_product))
								@foreach($new_product as $product)
									<div class="col-sm-3">
										<div class="single-item">
											@if($product->promotion_price >0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$product->id)}}"><img src="public/source/image/product/{{$product->image}}" alt="{{$product->name}}"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$product->name}}</p>
												<p class="single-item-price">
													@if($product->promotion_price >0)
													<span class="flash-del">{{number_format($product->unit_price,0,',','.')}}</span>
													<span class="flash-sale">{{number_format($product->promotion_price,0,',','.')}}</span>
													@else
													<span>{{number_format($product->unit_price,0,',','.')}}</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham',$product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							@endif
							</div>
							<div class="row">{{ $new_product->appends(['page_b'=>$sanpham_km->currentPage()])->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyễn mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham_km)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@if(!empty($sanpham_km))
									@foreach($sanpham_km as $sanpham)
									<div class="col-sm-3">
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
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham',$sanpham->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach
								@endif
							</div>
							<div class="row">{{ $sanpham_km->appends(['page_a'=>$new_product->currentPage()])->links() }}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
