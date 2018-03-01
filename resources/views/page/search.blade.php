@extends('master')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($products)}} sản phầm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@if(!empty($products))
								@foreach($products as $product)
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
							<div class="row">{{ $products->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection