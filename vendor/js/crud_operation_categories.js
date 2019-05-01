function saveCategorie(){
	 var categorieLib = $('#libelle_categorie').val();
	  
		$.ajax({
			type : "POST",
			url  : "categories/save",
			dataType : "JSON",
			data : {libelle_categorie:categorieLib},
			success: function(data){
				$('#libelle_categorie').val("");
	 			 
				$('#formCategorieModal').modal('hide');
				 listCategories();
			}
		});
		return false;
}
function showForm(){

		$('#libelle_categorie').val("");
		 
		document.getElementById('btnSaveCategorie').style="display:inline";
			document.getElementById('btnUpdateCategorie').style="display:none";
			$('#formCategorieModal').modal('show');
}
// save edit record
function updateCategorie(){

	var Categorielib = $('#libelle_categorie').val();
	 
	 $.ajax({
		 type : "POST",
		 url  : "categories/update",
		 dataType : "JSON",
		 data : {libelle_categorie:Categorielib},
		 success: function(data){
			 $('#libelle_categorie').val("");
			  
			 $('#formCategorieModal').modal('hide');
				listCategories();
		 }
	 });
	 return false;
}

// list all employee in datatable
function listCategories(){
	$.ajax({
		type  : 'ajax',
		url   : 'categories/show',
		async : false,
		dataType : 'json',
		success : function(data){
			console.log(data);
			var html = '';
			var i;
			for(i=0; i<data.length; i++){
				html += '<tr id="'+data[i].Id_categorie+'">'+
						'<td>'+data[i].Id_categorie+'</td>'+
						 '<td>'+data[i].libelle_categorie+'</td>'+
						 
						'<td style="text-align:right;">'+
							'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-Id_Id_categorie="'+data[i].Id_categorie+'" data-libelle_categorie="'+data[i].libelle_categorie+'">Edit</a>'+' '+
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].Id_categorie+'">Delete</a>'+
						'</td>'+
						'</tr>';
			}
			$('#listRecords').html(html);
		}

	});
}
$(document).ready(function(){
 listCategories();
	var table = $('#categorieTable').dataTable({
		"bPaginate": true,
		"bInfo": false,
		"bFilter": true,
		"bLengthChange": false,
		"pageLength": 5
	});



	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		document.getElementById('btnSaveCategorie').style="display:none";
		document.getElementById('btnUpdateCategorie').style="display:inline";
		$('#formCategorieModal').modal('show');
		$("#libelle_categorie").val($(this).data('libelle_categorie'));
		 
		$("#Id_categorie").val($(this).data('Id_categorie'));
		 
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var categorieId = $(this).data('id');
		$('#deleteCategorieModal').modal('show');
		$('#deleteCategorieId').val(CategorieId);
	});
	// delete emp record
	 $('#deleteCategorieForm').on('submit',function(){
		var empId = $('#deleteCategorieId').val();
		$.ajax({
			type : "POST",
			url  : "categorie/delete",
			dataType : "JSON",
			data : {id:empId},
			success: function(data){
				$("#"+categorieId).remove();
				$('#deleteCategorieId').val("");
				$('#deleteCategorieModal').modal('hide');
				listCategorie();
			}
		});
		return false;
	});
});
