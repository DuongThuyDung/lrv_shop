@extends('frontend.master.master')
@section('title','Chi tiết sản phẩm')
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(public/backend/img/{{$product->img}});">

										</div>

									</div>
								</div>
								<div class="col-md-7">
									<form action="product/AddCart" method="get">
										@csrf
										<div class="desc">
										<h3>{{$product->name}}</h3>
											<p class="price">
											<span>{{number_format($product->price, 0, '', '.')}} VND</span>
											</p>
										<p>{{$product->info}}</p>
										@foreach (properti_values($product->values) as $key => $value)
											<div class="size-wrap">
											<p class="size-desc">
												{{$key}}:
												@foreach ($value as $item)
													<a class="size">{{$item}}</a>
												@endforeach

											</p>
										</div>
										@endforeach	
										
											
											<h4>Lựa chọn</h4>
											<div class="row">
											@foreach (properti_values($product->values) as $key => $value)
												<div class="col-md-3">
													<div class="form-group">
														<label>{{$key}}:</label>
														<select class="form-control " name="attr[{{$key}}]">
															@foreach ($value as $item)
																<option value="{{$item}}"> {{$item}}</option>	
															@endforeach										
														</select>
													</div>
												</div>
											@endforeach


											</div>
											<div class="row row-pb-sm">
												<div class="col-md-4">
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																<i class="icon-minus2"></i>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																<i class="icon-plus2"></i>
															</button>
														</span>
													</div>
												</div>
											</div>
											{{-- Nếu AddCart sử dụng Get thì sử dụng value="{{$product->id}}" để lấy id sản phẩm, vì khi dùng post thì submit chính đường dẫn ko cần, get thì phải cần --}}
											<input type="hidden" name="id_product" value="{{$product->id}}"> 
											<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										{{$product->description}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Mới</span></h2>
					</div>
				</div>
				<div class="row">
					@foreach ($product_new as $product_n)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(public/backend/img/{{$product_n->img}});">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
										<span><a href="product/detail/3"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">{{$product_n->name}}</a></h3>
								<p class="price"><span>{{number_format($product_n->price, 0, '', '.')}} VND</span></p>
							</div>
						</div>
					</div>

				@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->

@endsection

