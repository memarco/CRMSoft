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
Liste des payements &nbsp;

<!--       <a  class="btn btn-success"  href="<?php echo base_url(); ?>index.php/payement/open"> Nouveau Payement </a>-->
<button class="btn btn-success" onclick="add_payement()">Ajout Payement</button>
        
        <br/>    <br/>
</div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Dossier </th>
                    <th>Type Payement</th> 
<!--                    <th>Libelle</th>-->
                    <th>Montant (Euro)</th>
                    <th>Date</th>
                    <th>Commentaire</th>
                    <th style="width:125px;">Action</th>
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
            "url": "<?php echo site_url('payement/ajax_list')?>",
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

function bind_dossier()
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('dossier/get_data')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var items = "";
           items += "<option value='' disabled selected>- Choisir -</option>";
           $.each(data, function (i, item) {
                 items += "<option value='" + item.id + "'>" + (item.numero_dossier) + "</option>";
           });
           $("#s_dossier").html(items);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function bind_type_payement()
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('type_payement/get_data')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var items = "";
           items += "<option value='' disabled selected>- Choisir -</option>";
           $.each(data, function (i, item) {
                 items += "<option value='" + item.id + "'>" + (item.type_payement_libelle) + "</option>";
           });
           $("#s_type_payement").html(items);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_payement()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ajout Payement'); // Set Title to Bootstrap modal title
}

function edit_payement(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('payement/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="id_dossier"]').val(data.id_dossier);
            $('[name="id_type_payement"]').val(data.id_type_payement);
            $('[name="numero_payement"]').val(data.numero_payement);
            $('[name="libelle_payement"]').val(data.libelle_payement);
            $('[name="montant_payement"]').val(data.montant_payement);
            $('[name="commentaire_payement"]').val(data.commentaire_payement);
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

    if(save_method == 'add') {
        url = "<?php echo site_url('payement/ajax_add')?>";
    } else {
        url = "<?php echo site_url('payement/ajax_update')?>";
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

function delete_payement(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('payement/ajax_delete')?>/"+id,
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
 bind_dossier();
 bind_type_payement();
});

</script>
<!--inner block end here-->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Payement Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Dossier</label>
                            <div class="col-md-9">
                                <select class="form-control" id="s_dossier" name="id_dossier">
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="control-label col-md-3">Libellé:</label>
                            <div class="col-md-9">
                                <input name="libelle_payement"  class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="control-label col-md-3">Type Payement : </label>
                            <div class="col-md-9">
                                <select class="form-control" id="s_type_payement" name="id_type_payement">
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3">Montant Payement :</label>
                        <div class="col-md-9">
                            <input name="montant_payement"    class="form-control" type="number">
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                          <label class="control-label col-md-3">Commentaire :</label>
                          <div class="col-md-9">
                              <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="2" name="commentaire_payement"></textarea>
                              <span class="help-block"></span>
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

<?php include(APPPATH . "views/templates/footer.php"); ?>
