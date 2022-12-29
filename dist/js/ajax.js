$(document).ready(function(){	

	$("#updateRecord").click(function(e)
	{
		e.preventDefault();
		$('#recordModal').modal('show');
	});

	$("#recordModal").on('submit','#recordForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"ajax_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#recordForm')[0].reset();
				$('#recordModal').modal('hide');				
				$('#save').attr('disabled', false);
				dataRecords.ajax.reload();
			}
		});
	});		
});