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
						<a href="{{url('admin/service')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Service List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
								@include('admin.message.danger')
									<form class="row g-3 needs-validation" @if(empty($servicedata['id'])) action="{{url('admin/add-edit-service')}}" @else   action="{{url('admin/add-edit-service/'.$servicedata['id'] )}}" @endif method="post">
                                    @csrf
										<div class="col-md-9">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"  @if(!empty($servicedata['title'])) value="{{$servicedata['title']}}" @else value="{{ old('title')}}" @endif>
										</div>
										<div class="col-md-9">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description"  rows="3"> @if(!empty($servicedata['description'])) {{$servicedata['description']}} @else {{ old('description')}} @endif </textarea>
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
