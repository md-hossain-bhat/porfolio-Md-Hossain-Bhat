@extends("layouts.admin_layouts.admin_layout")
@section('title','Message View')
@section('content')
        <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start email wrapper-->
				<div class="email-wrapper">
					<div class="email-sidebar">
						<div class="email-sidebar-header d-grid"> <a href="javascript:;" class="btn btn-primary compose-mail-btn"><i class='bx bx-plus me-2'></i> Compose</a>
						</div>
						<div class="email-sidebar-content">
							<div class="email-navigation">
								<div class="list-group list-group-flush"> <a href="app-emailbox.html" class="list-group-item active d-flex align-items-center"><i class='bx bxs-inbox me-3 font-20'></i><span>Inbox</span><span class="badge bg-primary rounded-pill ms-auto">7,513</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-star me-3 font-20'></i><span>Starred</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-alarm-snooze me-3 font-20'></i><span>Snoozed</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-send me-3 font-20'></i><span>Sent</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-file-blank me-3 font-20'></i><span>Drafts</span><span class="badge bg-primary rounded-pill ms-auto">4</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-bookmark me-3 font-20'></i><span>Important</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-message-rounded-error me-3 font-20'></i><span>Chats</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bx-mail-send me-3 font-20'></i><span>Scheduled</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-envelope-open me-3 font-20'></i><span>All Mail</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-info-circle me-3 font-20'></i><span>Spam</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-trash-alt me-3 font-20'></i><span>Trash</span></a>
								</div>
							</div>
							<div class="email-meeting">
								<div class="list-group list-group-flush">
									<div class="list-group-item"><span>Meet</span>
									</div> <a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-video me-3 font-20'></i><span>Start a meeting</span></a>
									<a href="javascript:;" class="list-group-item d-flex align-items-center"><i class='bx bxs-group me-3 font-20'></i><span>Join a meeting</span></a>
									<div class="list-group-item email-hangout cursor-pointer border-top">
										<div class="d-flex align-items-center">
											<div class="chat-user-online">
												<img src="assets/images/avatars/avatar-1.png" width="42" height="42" class="rounded-circle" alt="" />
											</div>
											<div class="flex-grow-1 ms-2">
												<p class="mb-0">Jessica Doe</p>
											</div>
											<div class="dropdown">
												<div class="font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class='bx bx-plus'></i>
												</div>
												<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Settings</a>
													<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Help & Feedback</a>
													<a class="dropdown-item" href="javascript:;">Enable Split View Mode</a>
													<a class="dropdown-item" href="javascript:;">Keyboard Shortcuts</a>
													<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Sign Out</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="email-header d-xl-flex align-items-center">
						<div class="d-flex align-items-center">
							<div class="email-toggle-btn"><i class='bx bx-menu'></i>
							</div>
							<div class="btn btn-white">
								<input class="form-check-input" type="checkbox">
							</div>
							<div class="">
							<a href="{{url('admin/email')}}"><button type="button" class="btn btn-white ms-2"><i class='bx bx-refresh me-0'></i>
								</button></a>
							</div>
							<div class="">
								<button type="button" class="btn btn-white ms-2"><i class='bx bx-downvote me-0'></i>
								</button>
							</div>
							<div class="d-none d-md-flex">
								<button type="button" class="btn btn-white ms-2"><i class='bx bx-file me-0'></i>
								</button>
							</div>
							<div class="">
								<button type="button" class="btn btn-white ms-2"><i class='bx bx-trash me-0'></i>
								</button>
							</div>
						</div>
						<div class="flex-grow-1 mx-xl-2 my-2 my-xl-0">
							<div class="input-group">	<span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
								<input type="text" class="form-control" placeholder="Search mail">
							</div>
						</div>
						<div class="ms-auto d-flex align-items-center">
							<button class="btn btn-sm btn-light">1-50 of 8,740</button>
							<button class="btn btn-white px-2 ms-2"><i class='bx bx-chevron-left me-0'></i>
							</button>
							<button class="btn btn-white px-2 ms-2"><i class='bx bx-chevron-right me-0'></i>
							</button>
						</div>
					</div>
					<div class="email-content">
						<div class="email-read-box p-3">
							<h4>{{$email['subject']}}</h4>
							<hr>
							<div class="d-flex align-items-center">
								<img src="{{asset('backEnd/images/avatars/avatar-1.png')}}" width="42" height="42" class="rounded-circle" alt="" />
								<div class="flex-grow-1 ms-2">
									<p class="mb-0 font-weight-bold">{{$email['name']}}</p>
									<div class="dropdown">
										<div class="dropdown-toggle" data-bs-toggle="dropdown">to {{$email['email']}}</div>
									</div>
								</div>
								<p class="mb-0 chat-time ps-5 ms-auto">{{date('d-m-Y H:i', strtotime($email['created_at']))}}</p>
							</div>
							<div class="email-read-content px-md-5 py-5">
								<p>{{$email['message']}}</p>
							</div>
						</div>
					</div>
					<!--start compose mail-->
					<div class="compose-mail-popup">
						<div class="card">
							<div class="card-header bg-dark text-white py-2 cursor-pointer">
								<div class="d-flex align-items-center">
									<div class="compose-mail-title">New Message</div>
									<div class="compose-mail-close ms-auto">x</div>
								</div>
							</div>
							<div class="card-body">
								<div class="email-form">
									<div class="mb-3">
										<input type="text" class="form-control" placeholder="To" />
									</div>
									<div class="mb-3">
										<input type="text" class="form-control" placeholder="Subject" />
									</div>
									<div class="mb-3">
										<textarea class="form-control" placeholder="Message" rows="10" cols="10"></textarea>
									</div>
									<div class="mb-0">
										<div class="d-flex align-items-center">
											<div class="">
												<div class="btn-group">
													<button type="button" class="btn btn-primary">Action</button>
													<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu">	<a class="dropdown-item" href="javascript:;">Action</a>
														<a class="dropdown-item" href="javascript:;">Another action</a>
														<a class="dropdown-item" href="javascript:;">Something else here</a>
														<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
													</div>
												</div>
											</div>
											<div class="ms-2">
												<button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-text-format"></i>
												</button>
												<button type="button" class="btn border-0 btn-sm btn-white"><i class='bx bx-link-alt'></i>
												</button>
												<button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-emoji-tounge"></i>
												</button>
												<button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-google-drive"></i>
												</button>
											</div>
											<div class="ms-auto">
												<button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-trash"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end compose mail-->
					<!--start email overlay-->
					<div class="overlay email-toggle-btn-mobile"></div>
					<!--end email overlay-->
				</div>
				<!--end email wrapper-->
			</div>
		</div>
@endsection
@section('js_script')
<script>
		new PerfectScrollbar('.email-navigation');
		new PerfectScrollbar('.email-list');
</script>
@endsection