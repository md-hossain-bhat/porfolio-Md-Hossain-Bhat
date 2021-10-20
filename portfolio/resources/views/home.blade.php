@extends("layouts.admin_layouts.admin_layout")
@section('title','Dashboard')
@section('content')
<div class="page-wrapper">
	<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Message</p>
									<h4 class="my-1 text-info">{{$emails->count()}}</h4>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fadeIn animated bx bx-message-square-dots"></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Service</p>
								   <h4 class="my-1 text-danger">{{$services->count()}}</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fadeIn animated bx bx-rocket"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Porfolio</p>
								   <h4 class="my-1 text-success">{{$portfolios->count()}}</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fadeIn animated bx bx-coin-stack"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Skill</p>
								   <h4 class="my-1 text-warning">{{$skills->count()}}</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fadeIn animated bx bx-merge"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div>
                
    </div>
</div>
@endsection