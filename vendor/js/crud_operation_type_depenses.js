function saveType_depense(){
	 var Type_depense = $('#libelle_type_depense').val();
	   
		$.ajax({
			type : "POST",
			url  : "type_depenses/save",
			dataType : "JSON",
			data : {libelle_type_depense:Type_depense},
			success: function(data){
				$('#libelle_type_depense').val("");
	 			 
				$('#formType_depenseModal').modal('hide');
				 listType_depenses();
			}
		});
		return false;
}
function showForm(){

		$('#libelle_type_depense').val("");
		 
		document.getElementById('btnSaveType_depense').style="display:inline";
			document.getElementById('btnUpdateType_depense').style="display:none";
			$('#formType_depenseModal').modal('show');
}
// save edit record
function updateType_depense(){

	var Type_depense = $('#libelle_type_depense').val();
	 
	 $.ajax({
		 type : "POST",
		 url  : "type_depenses/update",
		 dataType : "JSON",
		 data : {libelle_type_depense:Type_depense},
		 success: function(data){
			 $('#libelle_type_depense').val("");
			  
			 $('#formType_depenseModal').modal('hide');
				listType_depenses();
		 }
	 });
	 return false;
}

// list all employee in datatable
function listType_depenses(){
	$.ajax({
		type  : 'ajax',
		url   : 'type_depenses/show',
		async : false,
		dataType : 'json',
		success : function(data){
			console.log(data);
			var html = '';
			var i;
			for(i=0; i<data.length; i++){
				html += '<tr id="'+data[i].Id_type_depense+'">'+
						'<td>'+data[i].Id_type_depense+'</td>'+
						'<td>'+data[i].libelle_type_depense+'</td>'+
						 
						'<td style="text-align:right;">'+
							'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-Id_type_depense="'+data[i].Id_type_depense+'" data-libelle_type_depense="'+data[i].libelle_type_depense+'">Edit</a>'+' '+
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].Id_client+'">Delete</a>'+
						'</td>'+
						'</tr>';
			}
			$('#listRecords').html(html);
		}

	});
}
$(document).ready(function(){
 listType_depenses();
	var table = $('#type_depenseTable').dataTable({
		"bPaginate": true,
		"bInfo": false,
		"bFilter": true,
		"bLengthChange": false,
		"pageLength": 5
	});



	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		document.getElementById('btnSaveType_depense').style="display:none";
		document.getElementById('btnUpdateType_depense').style="display:inline";
		$('#formType_depenseModal').modal('show');
		$("#libelle_type_depense").val($(this).data('libelle_type_depense'));
		 
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var empId = $(this).data('id');
		$('#deleteType_depenseModal').modal('show');
		$('#deleteType_depenseId').val(type_depenseId);
	});
	// delete emp record
	 $('#deleteType_depenseForm').on('submit',function(){
		var empId = $('#deleteType_depenseId').val();
		$.ajax({
			type : "POST",
			url  : "type_depenses/delete",
			dataType : "JSON",
			data : {id:empId},
			success: function(data){
				$("#"+empId).remove();
				$('#deleteType_depenseId').val("");
				$('#deleteType_depenseModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
});
