@extends("layouts.admin_layouts.admin_layout")
@section('title','Skill')
@section('css_script')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Skill</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Skill</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Skill List</h6>
				<a href="{{url('admin/add-edit-skill')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Add Portfolio<i class="fadeIn animated bx bx-plus"></i></button></a>
				<hr/>
				@include('admin.message.success')
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>SL#.</th>
                                        <th>name</th>
                                        <th>Skill(%)</th>
                                        <th>Status</th>
                                        <th width="5%">Modify</th>
									</tr>
								</thead>
								<tbody>
								   @foreach($skills as $key => $skill)
									<tr>
										<td>{{$key+1}}</td>
                                        <td>{{$skill->name}}</td>
                                        <td>{{$skill->persent}}</td>
                                        <td>
                                            @if($skill->status ==1)
                                                <a class="updateSkillStatus" id="skill-{{$skill->id}}" skill_id="{{$skill->id}}" href="javascript:void(0)">Active</a>  
                                            @else
                                                <a class="updateSkillStatus" id="skill-{{$skill->id}}" skill_id="{{$skill->id}}" href="javascript:void(0)">Inactive</a>  
                                            @endif
                                        </td>
										<td>
											<a href="{{url('admin/add-edit-skill/'.$skill['id'] )}}" style="font-size: 24px;"><i class="fadeIn animated bx bx-comment-edit text-info"></i></a> / <a class="confirmDelete" record="skill" recoedid="{{$skill->id}}" href="javascript:void('0')" style="font-size: 24px;"><i class="fadeIn animated bx bx-trash-alt text-danger"></i></a>
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