$(document).ready(function(){
	$(".type_lang").not(":first").hide();
	$("#tab-page li a").on('click',function(e){
		e.preventDefault();
		var id = $(this).attr('alt');
		$('#tab-page li a.active').removeClass('active');
		$(this).addClass('active');
		$(".type_lang").hide();
		$("#"+id).fadeIn('fast');
	});

	//Arrow
	$('.submenu').hide();
	$(".sidebar-menu > li:has('ul.submenu') > a").addClass('down');
	if($(".sidebar-menu > li:has('ul.submenu') > a").hasClass('active')){
		$(".sidebar-menu > li:has('ul.submenu') > a.active").next('ul.submenu').show();
	}
	$(".sidebar-menu > li:has('ul.submenu') > a").on('click',function(e){
		e.preventDefault();
		if($(this).next('ul.submenu').is(':hidden')){
			$(this).next('ul.submenu').slideDown();
		}else{
			$(this).next('ul.submenu').slideUp();
			
		}
	});


})

// REMOVE ALBUM
function Remove(id){
	if(confirm('Bạn muốn xóa file này?')){
		window.location = "{{URL::route('admin_deleteAlbum')}}"+"/"+id;
	}
}
