@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Portfolio</h6>                        
						<a href="{{url('admin/portfolios')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Portfolio List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									@include('admin.message.danger')
									<form class="row g-3 needs-validation" @if(empty($portfoliodata['id'])) action="{{url('admin/add-edit-portfolio')}}" @else   action="{{url('admin/add-edit-portfolio/'.$portfoliodata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                                    @csrf
										<div class="col-md-9">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"  @if(!empty($portfoliodata['title'])) value="{{$portfoliodata['title']}}" @else value="{{ old('title')}}" @endif>
										</div>
										<div class="col-md-9">
											<label for="link" class="form-label">Link</label>
											<input type="text" name="link" class="form-control" id="link" placeholder="Enter Porfolio Link" @if(!empty($portfoliodata['link'])) value="{{$portfoliodata['link']}}" @else value="{{ old('link')}}" @endif>
										</div>
                                        
										<div class="col-md-9">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description"  rows="3"> @if(!empty($portfoliodata['description'])) {{$portfoliodata['description']}} @else {{ old('description')}} @endif </textarea>
										</div>
										<div class="col-md-9">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" name="image" type="file" id="formFile">
										</div>
                                        @if(!empty($portfoliodata['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/portfolio/'.$portfoliodata['image'])}}" >
                                                &nbsp;
                                                <a class="confirmDelete" record="portfolio-image" recoedid="{{$portfoliodata['id']}}" href="javascript:void('0')">Delete</a>
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
