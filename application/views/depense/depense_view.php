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
    Liste des depenses &nbsp;

<!--       <a  class="btn btn-success"  href="<?php echo base_url(); ?>index.php/depense/open"> Nouvelle depense </a>-->
    <button class="btn btn-success" onclick="add_depense()">Ajout Depense</button>
  
        <br/>    <br/>
</div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
<!--                    <th>Type depense </th>-->
                    <th>Dossier</th>
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
            "url": "<?php echo site_url('depense/ajax_list')?>",
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



function add_depense()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Depense'); // Set Title to Bootstrap modal title
}

function edit_depense(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('depense/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
//            $('[name="libelle_type_depense"]').val(data.libelle_type_depense);
            $('[name="id_dossier"]').val(data.id_dossier);
//            $('[name="libelle_depense"]').val(data.libelle_depense);
            $('[name="montant_depense"]').val(data.montant_depense);
            $('[name="date_depense"]').val(data.date_depense);
            $('[name="commentaire_depense"]').val(data.commentaire_depense);;
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Depense'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('depense/ajax_add')?>";
    } else {
        url = "<?php echo site_url('depense/ajax_update')?>";
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

function delete_depense(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('depense/ajax_delete')?>/"+id,
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
//function bind_type_depense()
//{
//    //Ajax Load data from ajax
//    $.ajax({
//        url : "<-?php echo site_url('type_depense/get_data')?>",
//        type: "GET",
//        dataType: "JSON",
//        success: function(data)
//        {
//          var items = "";
//           items += "<option value='' disabled selected>- Choisir -</option>";
//           $.each(data, function (i, item) {
//                 items += "<option value='" + item.id + "'>" + (item.libelle_type_depense) + "</option>";
//           });
//           $("#s_type_depense").html(items);
//
//
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error get data from ajax');
//        }
//    });
//}

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


//function save()
//{
//
//
//    // ajax adding data to database
//    $.ajax({
//        url : "<?php echo site_url('depense/ajax_add')?>",
//        type: "POST",
//        data: $('#form').serialize(),
//        dataType: "JSON",
//        success: function(data)
//        {
//            if(data.status) //if success close modal and reload ajax table
//            {
//                    window.location.href = "<?php echo site_url('depense/success')?>";
//            }
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error adding / update data');
//
//        }
//    });
//}
$(document).ready(function() {
 //bind_type_depense();
 bind_dossier();
});

</script>
  
  
</div>
        <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Depense Form</h3>
            </div>
            <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">

<!--            <div class="form-group">
                <label class="control-label col-md-3">Libelle Type depense</label>
                <div class="col-md-9">
                    <select class="form-control" id="s_type_depense" name="id_type_depense">
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>-->


            <div class="form-group">
                    <label class="control-label col-md-3">Dossier : </label>
                    <div class="col-md-9">
                        <select class="form-control" id="s_dossier" name="id_dossier">
                        </select>
                        <span class="help-block"></span>
                    </div>
            </div>

<!--            <div class="form-group">
                <label class="control-label col-md-3">Libellé depense :</label>
                <div class="col-md-9">
                    <input name="libelle_dossier"  class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>-->

                <div class="form-group">
                    <label class="control-label col-md-3">Montant (Euro) :</label>
                    <div class="col-md-9">
                        <input name="montant_depense"    class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>

              <div class="form-group">
                    <label class="control-label col-md-3">Commentaire :</label>
                    <div class="col-md-9">
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="2" name="commentaire_depense"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
