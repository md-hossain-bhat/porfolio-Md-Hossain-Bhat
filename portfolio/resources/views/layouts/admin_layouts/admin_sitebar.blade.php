<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('backEnd/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">HossainBhat</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				@if(Session::get('page') == 'dashboard')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="{{url('home')}}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-grid-alt"></i>
						</div>
						<div class="menu-title {{$active}}">Dashboard</div>
					</a>
				</li>
				@if(Session::get('page') == 'profile')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="{{url('admin/profile')}}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-user-circle"></i>
						</div>
						<div class="menu-title {{$active}}">Profile</div>
					</a>
				</li>
				@if(Session::get('page') == 'about_us')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="{{url('admin/about')}}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title {{$active}}">About Us</div>
					</a>
				</li>
				@if(Session::get('page') == 'portfolio' || Session::get('page') == 'add_portfolio')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-coin-stack"></i>
						</div>
						<div class="menu-title {{$active}}">Portfolio</div>
					</a>
					<ul>
						@if(Session::get('page') == 'portfolio')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/add-edit-portfolio')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Add Portfolio</a>
						</li>
						@if(Session::get('page') == 'add_portfolio')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{route('admin.portfolio')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Portfolio List</a>
						</li>
					</ul>
				</li>
				@if(Session::get('page') == 'skill' || Session::get('page') == 'add_skill')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-merge"></i>
						</div>
						<div class="menu-title {{$active}}">Skill</div>
					</a>
					<ul>
						@if(Session::get('page') == 'skill')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/add-edit-skill')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Add Skill</a>
						</li>
						@if(Session::get('page') == 'add_skill')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/skill')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Skill List</a>
						</li>
					</ul>
				</li>
				@if(Session::get('page') == 'service' || Session::get('page') == 'add_service')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-rocket"></i>
						</div>
						<div class="menu-title {{$active}}">Service</div>
					</a>
					<ul>
						@if(Session::get('page') == 'service')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/add-edit-service')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Add Service</a>
						</li>
						@if(Session::get('page') == 'add_service')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/service')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Service List</a>
						</li>
					</ul>
				</li>
				@if(Session::get('page') == 'testimonial' || Session::get('page') == 'add_testimonial')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
						</div>
						<div class="menu-title {{$active}}">Testimonial</div>
					</a>
					<ul>
						@if(Session::get('page') == 'testimonial')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/add-edit-testimonial')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Add Testimonial</a>
						</li>
						@if(Session::get('page') == 'add_testimonial')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/testimonial')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Testimonial List</a>
						</li>
					</ul>
				</li>
				@if(Session::get('page') == 'logo' || Session::get('page') == 'add_logo')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title {{$active}}">Service Logo</div>
					</a>
					<ul>
						@if(Session::get('page') == 'logo')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/add-edit-logo')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Add Service Logo</a>
						</li>
						@if(Session::get('page') == 'add_logo')
						<?php $active = "active"; ?>
						@else
						<?php $active = ""; ?>
						@endif
						<li> <a href="{{url('admin/logo')}}" class="{{$active}}"><i class="bx bx-right-arrow-alt"></i>Service Logo List</a>
						</li>
					</ul>
				</li>
				@if(Session::get('page') == 'email')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="{{url('admin/email')}}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-message-square-dots"></i>
						</div>
						<div class="menu-title {{$active}}">Message</div>
					</a>
				</li>
				@if(Session::get('page') == 'contact')
				<?php $active = "active"; ?>
				@else
				<?php $active = ""; ?>
				@endif
				<li>
					<a href="{{url('admin/contact')}}">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title {{$active}}">Contact US</div>
					</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<div class="parent-icon"><i class="bx bx-log-out-circle"></i>
						</div>
						<div class="menu-title">logout</div>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
				</li>
			</ul>
			<!--end navigation-->
		</div>