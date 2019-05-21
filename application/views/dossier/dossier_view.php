<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!--inner block start here-->

  <div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
                 <div class="work-progres">
                              <div class="chit-chat-heading">
Liste des dossiers &nbsp;
<button class="btn btn-success" onclick="add_dossier()">Ajout Dossier</button>
<!--       <a  class="btn btn-success"  href="<?php echo base_url(); ?>index.php/dossier/open"> Nouveau dossier </a>-->
        <br/>    <br/>
</div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Client </th>
<!--                    <th>Categorie</th>-->
                    <th>Numero</th>
                    <th>Status</th>
                    <th>Montant (Euro)</th>
                    <th>Date démarrage</th>
                    <th>Description</th>
                    <th style="width:80px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dossier/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

});

function bind_type_dossier()
{
//    //Ajax Load data from ajax
//    $.ajax({
//        url : "<-?php echo site_url('categorie/get_data')?>",
//        type: "GET",
//        dataType: "JSON",
//        success: function(data)
//        {
//          var items = "";
//           items += "<option value='' disabled selected>- Choisir -</option>";
//           $.each(data, function (i, item) {
//                 items += "<option value='" + item.id + "'>" + (item.libelle_categorie) + "</option>";
//           });
//           $("#s_type_dossier").html(items);
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error get data from ajax');
//        }
//    });
}
function bind_client()
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('client/get_data')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var items = "";
           items += "<option value='' disabled selected>- Choisir -</option>";
           $.each(data, function (i, item) {
                 items += "<option value='" + item.id + "'>" + (item.nom_client +" "+item.prenom_client) + "</option>";
           });
           $("#s_client").html(items);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_dossier()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ajout Dossier'); // Set Title to Bootstrap modal title
}

function edit_dossier(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('dossier/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="id_client"]').val(data.id_client);
            $('[name="status_dossier"]').val(data.status_dossier);
            $('[name="montant_traitement"]').val(data.montant_traitement);
            $('[name="description_dossier"]').val(data.description_dossier);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit payement'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
        
//    if(document.getElementById('status_dossier').value == ""){
//      document.getElementById('h_status_dossier').innerHTML = "Veuillez remplir ce champ S.V.P !";
//    }
//    else{
//        document.getElementById('h_status_dossier').innerHTML = "";
//    }
//      if(document.getElementById('montant_traitement').value == "")
//      {
//       document.getElementById('h_montant_traitement').innerHTML = "Veuillez remplir ce champ S.V.P !";
//      }
//        else{
//           document.getElementById('h_montant_traitement').innerHTML = "";
//       }
//          if(document.getElementById('s_montant_traitement').value == "")
//        {
//          document.getElementById('h_montant_traitement').innerHTML = "Veuillez remplir ce champ S.V.P !";
//        }
        
          
             if(save_method == 'add') {
             url = "<?php echo site_url('dossier/ajax_add')?>";
            } else {
                url = "<?php echo site_url('dossier/ajax_update')?>";
            }
                  // ajax adding data to database
          $.ajax({
              url : url,
              type: "POST",
              data: $('#form').serialize(),
              dataType: "JSON",
              success: function(data)
              {
                  if(data.status) //if success close modal and reload ajax table
                  {
//                          window.location.href = "<?php echo site_url('dossier/success')?>";
                    $('#modal_form').modal('hide');
                                   reload_table();
                  }
                  
                  $('#btnSave').text('save'); //change button text
                  $('#btnSave').attr('disabled',false); //set button enable
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error adding / update data');
                  $('#btnSave').text('save'); //change button text
                 $('#btnSave').attr('disabled',false); //set button enable
              }
          });
        
}

 function delete_dossier(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('dossier/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

$(document).ready(function() {
 //bind_type_dossier();
 bind_client();
});

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Dossier Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        
<!--                        <div class="form-group">
                            <label class="control-label col-md-3">Type de dossier</label>
                            <div class="col-md-9">
                                <select class="form-control" id="s_type_dossier" name="id_categorie">
                                </select>
                                <span class="help-block" id="h_type_dossier" style="color:red"></span>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="control-label col-md-3">Client : </label>
                            <div class="col-md-9">
                                <select class="form-control" id="s_client" name="id_client">
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Status du dossier:</label>
                            <div class="col-md-9">
                                <input name="status_dossier"  class="form-control" type="text" id="status_dossier" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Montant côtation (Euro) :</label>
                            <div class="col-md-9">
                                <input name="montant_traitement"  class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="control-label col-md-3">Description :</label>
                            <div class="col-md-9">
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="2" name="description_dossier"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-md-3">Ajouter Images :</label>
                            <div class="col-md-9">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="image_dossier[]" multiple
                              aria-describedby="inputGroupFileAddon01" >  <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Modal pour le formulaire -->


<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
