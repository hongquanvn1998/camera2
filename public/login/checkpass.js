$('#cofirmPassword').on('keyup',function(){
	if($('#cofirmPassword').val() == $('#password').val()){
		$('#messagePass').html('Matching').css('color','#0cf40c');
		$('form').attr('action','{{route("handleDangky")}}');
	}else{
		$('#messagePass').html('Not Matching').css('color','red');
		$('form').attr('action','javascript:void(0)');
	}
}); 