function saveClient(){
	 var clientNom = $('#nom_client').val();
	 var clientPrenom = $('#prenom_client').val();
	 var clientEmail = $('#email_client').val();
	 var clientTel = $('#tel_client').val();
	 var clientAdresse = $('#addresse_client').val();
	 var clientAutreInfo = $('#autre_info_client').val();


		$.ajax({
			type : "POST",
			url  : "clients/save",
			dataType : "JSON",
			data : {nom_client:clientNom, prenom_client:clientPrenom, email_client:clientEmail, tel_client:clientTel, addresse_client:clientAdresse, autre_info_client:clientAutreInfo},
			success: function(data){
				$('#nom_client').val("");
	 			$('#prenom_client').val("");
 			  $('#email_client').val("");
 			  $('#tel_client').val("");
				$('#addresse_client').val("");
				$('#autre_info_client').val("");
				$('#formClientModal').modal('hide');
				 listClients();
			}
		});
		return false;
}
function showForm(){

		$('#nom_client').val("");
		$('#prenom_client').val("");
		$('#email_client').val("");
		$('#tel_client').val("");
		$('#addresse_client').val("");
		$('#autre_info_client').val("");
		document.getElementById('btnSaveClient').style="display:inline";
			document.getElementById('btnUpdateClient').style="display:none";
			$('#formClientModal').modal('show');
}
// save edit record
function updateClient(){

	var clientNom = $('#nom_client').val();
	var clientPrenom = $('#prenom_client').val();
	var clientEmail = $('#email_client').val();
	var clientTel = $('#tel_client').val();
	var clientAdresse = $('#addresse_client').val();
	var clientAutreInfo = $('#autre_info_client').val();
	 $.ajax({
		 type : "POST",
		 url  : "clients/update",
		 dataType : "JSON",
		 data : {nom_client:clientNom, prenom_client:clientPrenom, email_client:clientEmail, tel_client:clientTel, addresse_client:clientAdresse, autre_info_client:clientAutreInfo},
		 success: function(data){
			 $('#nom_client').val("");
			 $('#prenom_client').val("");
			 $('#email_client').val("");
			 $('#tel_client').val("");
			 $('#addresse_client').val("");
			 $('#autre_info_client').val("");
			 $('#formClientModal').modal('hide');
				listClients();
		 }
	 });
	 return false;
}

// list all employee in datatable
function listClients(){
	$.ajax({
		type  : 'ajax',
		url   : 'clients/show',
		async : false,
		dataType : 'json',
		success : function(data){
			console.log(data);
			var html = '';
			var i;
			for(i=0; i<data.length; i++){
				html += '<tr id="'+data[i].Id_client+'">'+
						'<td>'+data[i].Id_client+'</td>'+
						'<td>'+data[i].nom_client+'</td>'+
						'<td>'+data[i].prenom_client+'</td>'+
						'<td>'+data[i].addresse_client+'</td>'+
						'<td>'+data[i].email_client+'</td>'+
						'<td>'+data[i].tel_client+'</td>'+
						'<td>'+data[i].autre_info_client+'</td>'+
						'<td style="text-align:right;">'+
							'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-Id_client="'+data[i].Id_client+'" data-nom_client="'+data[i].nom_client+'" data-autre_info_client="'+data[i].autre_info_client+'"  data-email_client="'+data[i].email_client+'"  data-prenom_client="'+data[i].prenom_client+'" data-addresse_client="'+data[i].addresse_client+'" data-tel_client="'+data[i].tel_client+'" >Edit</a>'+' '+
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].Id_client+'">Delete</a>'+
						'</td>'+
						'</tr>';
			}
			$('#listRecords').html(html);
		}

	});
}
$(document).ready(function(){
 listClients();
	var table = $('#clientTable').dataTable({
		"bPaginate": true,
		"bInfo": false,
		"bFilter": true,
		"bLengthChange": false,
		"pageLength": 5
	});



	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		document.getElementById('btnSaveClient').style="display:none";
		document.getElementById('btnUpdateClient').style="display:inline";
		$('#formClientModal').modal('show');
		$("#nom_client").val($(this).data('nom_client'));
		$("#prenom_client").val($(this).data('prenom_client'));
		$("#addresse_client").val($(this).data('addresse_client'));
		$("#tel_client").val($(this).data('tel_client'));
		$("#email_client").val($(this).data('email_client'));
		$("#id_client").val($(this).data('Id_client'));
		$("#autre_info_client").val($(this).data('autre_info_client'));
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var empId = $(this).data('id');
		$('#deleteEmpModal').modal('show');
		$('#deleteEmpId').val(empId);
	});
	// delete emp record
	 $('#deleteEmpForm').on('submit',function(){
		var empId = $('#deleteEmpId').val();
		$.ajax({
			type : "POST",
			url  : "emp/delete",
			dataType : "JSON",
			data : {id:empId},
			success: function(data){
				$("#"+empId).remove();
				$('#deleteEmpId').val("");
				$('#deleteEmpModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
});
