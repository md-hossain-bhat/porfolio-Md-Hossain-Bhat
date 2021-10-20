@extends("layouts.admin_layouts.admin_layout")
@section('title','Edit About Us')
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
									<form class="row g-3 needs-validation"  action="{{url('admin/add-edit-about/'.$aboutdata['id'] )}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-9">
											<label for="name" class="form-label">Name</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="Enter name"  @if(!empty($aboutdata['name'])) value="{{$aboutdata['name']}}" @else value="{{ old('name')}}" @endif>
										</div>
										<div class="col-md-9">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"  @if(!empty($aboutdata['title'])) value="{{$aboutdata['title']}}" @else value="{{ old('title')}}" @endif>
										</div>
										
                                        
										<div class="col-md-9">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description"  rows="3"> @if(!empty($aboutdata['description'])) {{$aboutdata['description']}} @else {{ old('description')}} @endif </textarea>
										</div>
										<div class="col-md-9">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" name="image" type="file" id="formFile">
										</div>
                                        @if(!empty($aboutdata['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/about/'.$aboutdata['image'])}}" >
                                                &nbsp;
                                                <a class="confirmDelete" record="about-image" recoedid="{{$aboutdata['id']}}" href="javascript:void('0')">Delete</a>
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
