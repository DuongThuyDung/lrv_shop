@extends('frontend.master.master')
	<div class="slider-main h-400x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-1 bg-layer-4"></div>
		<div class="container-fluid h-100 mt-xs-50">		
			<div class="row h-100">
				<div class="col-md-1"></div>
				<div class="col-sm-12 col-md-5 h-100 h-sm-50">
					<div class="dplay-tbl">
						<div class="dplay-tbl-cell color-white mtb-30">
							<div class="mx-w-400x">
								
										
							</div><!-- mx-w-200x -->
						</div><!-- dplay-tbl-cell -->
					</div><!-- dplay-tbl -->
				</div><!-- col-sm-6 -->
				<div class="col-sm-12 col-md-6 h-sm-50 oflow-hidden swiper-area pos-relative">			
					<div class="abs-blr pos-sm-static">
						<div class="row pos-relative mt-50 all-scroll">
							<div class="swiper-scrollbar resp"></div>
							<div class="col-md-10" >
								<h5 class="mb-50 color-white"><b>HOT NEWS</b></h5>
								<div class="swiper-container oflow-visible" data-slide-effect="slide" data-autoheight="false" 
									data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="2"
									data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true"
									data-swpr-responsive="[1, 2, 1, 2]">
									<div class="swiper-wrapper">
										<!-- data-swiper-autoplay="1000"  --> 
										<div class="swiper-slide">
											@foreach($new as $cat)
												<div class="bg-white">
													<ul class="list-li-mr-10 color-lt-black">
														<li><img src="{{url('/')}}/upload/news/{{$cat->image}}" style="width:  20%;" alt=""></li>
														<li><b>{{$cat->title}}</b></li>
														<li><a href="#"><b>{!! $cat->summary !!}</li>
														<li><i class="mr-5 font-12 ion-android-favorite-outline"></i>Đăng Lúc: </li>
														<li><i class="mr-5 font-12 ion-ios-chatbubble-outline"></i>{{$cat->created_at}}</li>
													</ul>
												</div><!-- hot-news -->
											</div><!-- hot-news -->
											@endforeach
										</div><!-- swiper-slide -->
									</div><!-- swiper-wrapper -->


								<div class="swiper-wrapper">
										<!-- data-swiper-autoplay="1000"  --> 
										<div class="swiper-slide">
											
										</div><!-- swiper-slide -->
									</div><!-- swiper-wrapper -->


								</div><!-- swiper-container -->								
							</div><!-- col-sm-6 -->
						</div><!-- all-scroll -->
					</div><!-- row -->
				</div><!-- col-sm-6 -->
				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- slider-main -->
	
<!-- Container -->
    <div class="container">
	@foreach($new as $cat)
	    <h3><a href="{{url('/')}}/upload/news/{{$cat->id}}.html">{{$cat->title}}</h3>
	    <div><p>{!! $cat->summary !!}</p></div>
		<div>
	    	<img class="img-responsive" src="{{url('/')}}/upload/news/{{$cat->image}}" style="width: 10%" alt="">
	    	<p><span class="glyphicon glyphicon-time"></span> Đăng Lúc: {{$cat->created_at}}</p><hr>
		</div>
		<div>
	    	<p>{!! $cat->content !!}</p><hr>
	   	</div>
	@endforeach
    </div>			


	<!-- SCIPTS -->
	
	<script src="{{url('/')}}/public/frontend/plugin-frameworks/jquery-3.2.1.min.js"></script>
	
	<script src="{{url('/')}}/public/frontend/plugin-frameworks/bootstrap.min.js"></script>
	
	<script src="{{url('/')}}/public/frontend/plugin-frameworks/swiper.js"></script>
	
	
	<script src="{{url('/')}}/public/frontend/common/scripts.js"></script>
	
</body>
</html>