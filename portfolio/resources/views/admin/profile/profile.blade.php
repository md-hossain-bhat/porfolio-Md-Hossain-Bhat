@extends("layouts.admin_layouts.admin_layout")
@section('title','Profile')
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
										<?php $image_path = "backEnd/images/profile/".Auth::user()->image;?>
											@if(!empty(Auth::user()->image) && file_exists($image_path))
											<img src="{{asset('backEnd/images/profile/'.Auth::user()->image )}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											@else
												<img src="{{asset('backEnd/images/profile/no-image.jpg' )}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											@endif
											<div class="mt-3">
												<h4>{{$user['name']}}</h4>
												<p class="text-secondary mb-1">{{$about['title']}}</p>
												<p class="text-muted font-size-sm">{{$contact['location']}}</p>
											</div>
										</div>
										<hr class="my-4">
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><i class="lni lni-github-original"></i> Github</h6>
												<span class="text-secondary">codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><i class="lni lni-twitter-original text-info"></i> Twitter</h6>
												<span class="text-secondary">@codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><i class="lni lni-linkedin text-primary"></i> Linkedin</h6>
												<span class="text-secondary">codervent</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><i class="lni lni-facebook text-primary"></i> Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
							@include('admin.message.success')
							@include('admin.message.danger')
								<div class="card">
								<form action="{{url('admin/profile/'.$user['id'] )}}" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="name" class="form-control" value="{{$user['name']}}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="email" class="form-control" value="{{$user['email']}}" readonly>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="mobile" class="form-control" value="{{$user['mobile']}}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" value="{{$user['address']}}">
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                                <label for="formFile" class="form-label">Default file input example</label>
                                                <input class="form-control" name="image" type="file" id="formFile">
											</div>
                                            @if(!empty($user['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/profile/'.$user['image'])}}" >
                                                &nbsp;
                                                <a class="confirmDelete" record="profile-image" recoedid="{{$user['id']}}" href="javascript:void('0')">Delete</a>
                                            </div>
                                        @endif
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-success px-4" value="Update">
											</div>
										</div>
									</div>
									</form>
								</div>
                                
                                <div class="card">
									<form action="{{ url('/admin/update-pwd') }}" method="post">
									@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Current Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password"  name="current_pwd" id="current_pwd" class="form-control" placeholder="current password">
												<span id="chkPwd"></span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="new password">
												
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Confirm New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="confirm new password">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-success px-4" value="Update">
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection