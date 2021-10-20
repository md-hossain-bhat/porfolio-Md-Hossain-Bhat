$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'post',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				// alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//delete 
	$(".confirmDelete").click(function(){
		var record =$(this).attr('record');
		var recoedid =$(this).attr('recoedid');

		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/delete-"+record+"/"+recoedid;
		  }
		});
		
	});



	// //porfolio status active or inactive
	$(".updatePortfolioStatus").click(function(){
		var status = $(this).text();
		var porfolio_id = $(this).attr("porfolio_id");

		$.ajax({
			type:"post",
			url:"/admin/update-portfolio-status",
			data:{status:status,porfolio_id:porfolio_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#portfolio-"+porfolio_id).html("<a class='updatePortfolioStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#portfolio-"+porfolio_id).html("<a class='updatePortfolioStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});


	// //services status active or inactive
	$(".updateServiceStatus").click(function(){
		var status = $(this).text();
		var service_id = $(this).attr("service_id");

		$.ajax({
			type:"post",
			url:"/admin/update-service-status",
			data:{status:status,service_id:service_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#service-"+service_id).html("<a class='updateServiceStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#service-"+service_id).html("<a class='updateServiceStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	// 	//testimonial status active or inactive
	$(".updateTestimonialStatus").click(function(){
		var status = $(this).text();
		var testimonial_id = $(this).attr("testimonial_id");

		$.ajax({
			type:"post",
			url:"/admin/update-testimonial-status",
			data:{status:status,testimonial_id:testimonial_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#testimonial-"+testimonial_id).html("<a class='updateTestimonialStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#testimonial-"+testimonial_id).html("<a class='updateTestimonialStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	// 	//logo status active or inactive
	$(".updateLogoStatus").click(function(){
		var status = $(this).text();
		var logo_id = $(this).attr("logo_id");

		$.ajax({
			type:"post",
			url:"/admin/update-logo-status",
			data:{status:status,logo_id:logo_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#logo-"+logo_id).html("<a class='updateLogoStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#logo-"+logo_id).html("<a class='updateLogoStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//skill status active or inactive
	$(".updateSkillStatus").click(function(){
		var status = $(this).text();
		var skill_id = $(this).attr("skill_id");

		$.ajax({
			type:"post",
			url:"/admin/update-skill-status",
			data:{status:status,skill_id:skill_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#skill-"+skill_id).html("<a class='updateSkillStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#skill-"+skill_id).html("<a class='updateSkillStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});


});