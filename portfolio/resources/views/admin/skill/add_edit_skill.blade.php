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
						<a href="{{url('admin/portfolios')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Portfolio List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
								@include('admin.message.danger')
									<form class="row g-3 needs-validation"@if(empty($skilldata['id'])) action="{{url('admin/add-edit-skill')}}" @else   action="{{url('admin/add-edit-skill/'.$skilldata['id'] )}}" @endif method="post">
                                    @csrf
										<div class="col-md-9">
											<label for="name" class="form-label">name</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="Enter name"  @if(!empty($skilldata['name'])) value="{{$skilldata['name']}}" @else value="{{ old('name')}}" @endif>
										</div>
										<div class="col-md-9">
											<label for="persent" class="form-label">persent</label>
											<input type="text" name="persent" class="form-control" id="persent" placeholder="Enter Porfolio persent" @if(!empty($skilldata['persent'])) value="{{$skilldata['persent']}}" @else value="{{ old('persent')}}" @endif>
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
