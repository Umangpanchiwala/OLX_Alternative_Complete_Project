@extends('user/layout')
@section('content')

<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Orders</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Image  </th>
								<th>Product Title</th>
								<th class="text-center">Price</th>
							</tr>
						</thead>
						<tbody>
							{{-- @dd($product) --}}
							@foreach($product as $val)
							<tr>
								<td class="product-thumb">
								<img src="{{ asset('image/ads/') }}/{{ $val->product->img }}" style="height:96px " style="width:96px ">

									<!-- <img width="80px" height="auto" src="images/products/products-1.jpg" alt="image description"> -->
								</td>
								<td class="product-details">{{$val->product->title}}</td>
								<td class="product-details">{{$val->product->price}}</td>
								
							</tr>
							@endforeach

						
						</tbody>
					</table>

				</div>

				<!-- pagination -->
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<!-- pagination -->

			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>

@endsection
