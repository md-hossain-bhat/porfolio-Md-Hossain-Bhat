@extends("layouts.admin_layouts.admin_layout")
@section('title','Testimonial')
@section('css_script')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Testimonial</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Testimonial</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Testimonial List</h6>
				<a href="{{url('admin/add-edit-testimonial')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Add Service<i class="fadeIn animated bx bx-plus"></i></button></a>
				<hr/>
				@include('admin.message.success')
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                                    <th>SL#</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th width="10%">Modify</th>
									</tr>
								</thead>
								<tbody>
								   @foreach($testimonials as $key => $testimonial)
									<tr>
										<td>{{$key+1}}</td>
                                        <td>{{$testimonial->name}}</td>
                                        <td>{{$testimonial->title}}</td>
                                        <td>{{$testimonial->company}}</td>
                                        <td><img width="120" src="{{asset('backEnd/images/testimonial/'.$testimonial->image)}}" alt="">
                                        </td>
                                        <td>
                                            @if($testimonial->status ==1)
                                                <a class="updateTestimonialStatus" id="testimonial-{{$testimonial->id}}" testimonial_id="{{$testimonial->id}}" href="javascript:void(0)">Active</a>  
                                            @else
                                                <a class="updateTestimonialStatus" id="testimonial-{{$testimonial->id}}" testimonial_id="{{$testimonial->id}}" href="javascript:void(0)">Inactive</a>  
                                            @endif
                                        </td>
										<td>
											<a href="{{url('admin/add-edit-testimonial/'.$testimonial['id'] )}}" style="font-size: 24px;"><i class="fadeIn animated bx bx-comment-edit text-info"></i></a> / <a class="confirmDelete" record="testimonial" recoedid="{{$testimonial->id}}" style="font-size: 24px;"><i class="fadeIn animated bx bx-trash-alt text-danger"></i></a>
										</td>
										
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		
@endsection
@section('js_script')
<script src="{{asset('backEnd/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endsection