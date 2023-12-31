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
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="{{ asset('user.jpg') }}" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{session()->get('FRONT_USER_NAME') }}</h5>
						<a href="{{asset('user/userprofile').'/'.session()->get('FRONT_USER_ID')}}" class="btn btn-main-sm">Edit Profile</a>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active">
								<a href="#"><i class="fa fa-user"></i> My Ads</a>
							</li>
							<!-- <li>
								<a href="{{asset('user/dashboardpendingads')}}"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
							</li> -->
							<li>
								<a href="{{ url('/logout') }}"><i class="fa fa-cog"></i> Logout</a>
							</li>
							
						</ul>
					</div>
					<!-- delete-account modal -->
					<!-- delete account popup modal start-->
					<!-- Modal -->
					<div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header border-bottom-0">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-center">
									<img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
									<h6 class="py-2">Are you sure you want to delete your account?</h6>
									<p>Do you really want to delete these records? This process cannot be undone.</p>
									<textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
								</div>
								<div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-danger">Delete</button>
								</div>
							</div>
						</div>
					</div>
					<!-- delete account popup modal end-->
					<!-- delete-account modal -->

				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">My Ads</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Title</th>
								<th class="text-center">title</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($product as $val)
							<tr>
								<td class="product-thumb">
								<img src="{{ asset('/image/ads/') }}/{{ $val['img'] }}" style="height:96px " style="width:96px ">

									<!-- <img width="80px" height="auto" src="images/products/products-1.jpg" alt="image description"> -->
								</td>
								<td class="product-details">
									<h3 class="title">{{$val['name']}}</h3>
									<span class="add-id"><strong>Ad ID:</strong> {{ md5($val['id']) }}</span>
									<span><strong>Posted on: </strong><time>{{ $val['created_at']}}</time> </span>
									<span class="status active"><strong>Status</strong>{{ $val['status'] == 1 ? "Active" :"InActive" }}</span>
									
								</td>
								<td class="product-category"><span class="categories">{{$val['title']}}</span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
										
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ url('delete/product/'.$val['id']) }}">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
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
