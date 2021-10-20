@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/logo')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Portfolio List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									@include('admin.message.danger')
									<form class="row g-3 needs-validation"  @if(empty($logodata['id'])) action="{{url('admin/add-edit-logo')}}" @else   action="{{url('admin/add-edit-logo/'.$logodata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                                    @csrf
										<div class="col-md-9">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" name="image" type="file" id="formFile">
										</div>
                                        @if(!empty($logodata['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/logo/'.$logodata['image'])}}" >
                                                &nbsp;
                                                <a class="confirmDelete" record="logo-image" recoedid="{{$logodata['id']}}" href="javascript:void('0')">Delete</a>
                                            </div>
                                        @endif
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
