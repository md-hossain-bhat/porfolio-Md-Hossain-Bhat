@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">About Us</h6>                        
						<a href="{{url('admin/about')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">About List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									@include('admin.message.danger')
									<form class="row g-3 needs-validation" action="{{url('admin/add-edit-contact/'.$contactdata['id'] )}}"method="post">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="location" class="form-label">location</label>
											<input type="text" name="location" class="form-control" id="location" placeholder="Enter location"  @if(!empty($contactdata['location'])) value="{{$contactdata['location']}}" @else value="{{ old('location')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="phone" class="form-label">phone</label>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone"  @if(!empty($contactdata['phone'])) value="{{$contactdata['phone']}}" @else value="{{ old('phone')}}" @endif>
										</div>
										<div class="col-md-9">
											<label for="email" class="form-label">email</label>
											<input type="text" name="email" class="form-control" id="email" placeholder="Enter email"  @if(!empty($contactdata['email'])) value="{{$contactdata['email']}}" @else value="{{ old('email')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="fb" class="form-label">fb</label>
											<input type="text" name="fb" class="form-control" id="fb" placeholder="Enter fb"  @if(!empty($contactdata['fb'])) value="{{$contactdata['fb']}}" @else value="{{ old('fb')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="tw" class="form-label">tw</label>
											<input type="text" name="tw" class="form-control" id="tw" placeholder="Enter tw"  @if(!empty($contactdata['tw'])) value="{{$contactdata['tw']}}" @else value="{{ old('tw')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="li" class="form-label">li</label>
											<input type="text" name="li" class="form-control" id="li" placeholder="Enter li"  @if(!empty($contactdata['li'])) value="{{$contactdata['li']}}" @else value="{{ old('li')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="git" class="form-label">git</label>
											<input type="text" name="git" class="form-control" id="git" placeholder="Enter git"  @if(!empty($contactdata['git'])) value="{{$contactdata['git']}}" @else value="{{ old('git')}}" @endif>
										</div>
										
										<div class="col-12">
											<button class="btn btn-primary" type="submit">{{$name}}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>	
@endsection
