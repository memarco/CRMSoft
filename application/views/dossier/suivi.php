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

       <a  class="btn btn-success"  href="<?php echo base_url(); ?>index.php/dossier/open"> Nouveau dossier </a>
        <br/>    <br/>
</div>

<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Dossiers</th>
          <th>Client</th>

          <th>Status</th>
          <th class="text-center">Montant cotation (€)</th>
          <th class="text-center">Dépenses (€)</th>
          <th class="text-center">Paiements (€)</th>
          <th class="text-center">Marges (€)</th>
          <th class="text-center">Action</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><span style="font-weight: bold;">CAMION MERCEDES 5214</span></td>
      <td>Malbum Hadamou</td>

      <td><span class="label label-danger">&nbsp;&nbsp;En cours&nbsp;</span></td>
      <td class="text-center">11500</td>
      <td class="text-center">11500</td>
      <td class="text-center">10000</td>
      <td class="text-center"><p class="label-danger" style="color:white">- 1 500</p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
  <tr>
      <td>2</td>
      <td><span style="font-weight: bold;">SEMI REMORQUE HONDA</span></td>
      <td>Evan</td>

      <td><span class="label label-success">&nbsp;&nbsp;Terminé &nbsp;</span></td>
      <td class="text-center">15000</td>
      <td class="text-center">15000</td>
      <td class="text-center">11500</td>
      <td class="text-center"><p class="bg-primary" style="color:white"> 0 </p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
  <tr>
      <td>3</td>
      <td><span style="font-weight: bold;">TOYOTA YARIS</span></td>
      <td>John</td>

      <td><span class="label label-warning">En attente</span></td>
      <td class="text-center">1500</td>
      <td class="text-center">1500</td>
      <td class="text-center">5000</td>
      <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
  <tr>
      <td>4</td>
      <td><span style="font-weight: bold;">RENAULT SAFRAN</span></td>
      <td>Danial</td>

      <td><span class="label label-info">&nbsp;En cours&nbsp;&nbsp;</span></td>
      <td class="text-center">1500</td>
      <td class="text-center">1500</td>
      <td class="text-center">1000</td>
      <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
  <tr>
      <td>5</td>
      <td><span style="font-weight: bold;">OPEL ASTRA</span></td>
      <td>David</td>

      <td><span class="label label-warning">En attente</span></td>
      <td class="text-center">1500</td>
      <td class="text-center">1500</td>
      <td class="text-center">1000</td>
      <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
  <tr>
      <td>6</td>
      <td><span style="font-weight: bold;">FORD Focus</span></td>
      <td>Mickey</td>
      <td><span class="label label-info">&nbsp;En cours&nbsp;&nbsp;</span></td>
      <td class="text-center">1500</td>
      <td class="text-center">1500</td>
      <td class="text-center">1000</td>
      <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
      <td class="text-center"><a href="#" title="Voir le suivi" onclick="suivi_dossier()"><i class="fa fa-eye"></i></a></td>
  </tr>
</tbody>
</table>
</div>

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



function suivi_dossier()
{
    save_method = 'add';
    $('#modal_detail').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Client'); // Set Title to Bootstrap modal title
}

function edit_client(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('client/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="nom_client"]').val(data.nom_client);
            $('[name="prenom_client"]').val(data.prenom_client);
            $('[name="email_client"]').val(data.email_client);
            $('[name="tel_client"]').val(data.tel_client);
            $('[name="addresse_client"]').val(data.addresse_client);
            $('[name="autre_info_client"]').val(data.autre_info_client);;
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Client'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('client/ajax_add')?>";
    } else {
        url = "<?php echo site_url('client/ajax_update')?>";
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

function delete_client(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('client/ajax_delete')?>/"+id,
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

</script>

<!-- Bootstrap modal -->
<div class="modal fade " id="modal_detail" role="dialog">
 <div class="modal-dialog modal-xxl">
        <div class="modal-content" style="font-size:9px">
            <div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <div class="col-lg-12" style=" margin-top:20px; font-size:10">
          <div class="col-lg-6"  style="text-align:left;">
              <span style="font-weight:bold">Dossier :</span> <span>PK2150118360</span> - <span>CAMION MERCEDES 5214</span>
          </div>
          <div class="col-lg-6"  style="text-align:left; margin-top:10px">
             <span style="font-weight:bold">Type de dossier :</span> <span>DEDOUANEMENT</span>
          </div>
          <div class="col-lg-6" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Client :</span> <span>Pierre KAMBOU</span>
          </div>
          <div class="col-lg-3" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Montant cotation :</span> <span>15000</span>
          </div>
          <div class="col-lg-3" style="text-align:right; margin-top:10px">
              <span style="font-weight:bold">Marge :</span> <span  class="label-success" style="color:white">&nbsp; 3 500 &nbsp;</span>
          </div>
        </div>
            </div>
            <div class="modal-body">
              <div class="col-lg-12" >
                <div class="col-lg-6">
                  <div class="col-lg-12" style="float: left; border-bottom: solid 1px green; margin-top: 10px">
                                      PAIEMENTS
                              </div>
                              <div class="col-lg-12 table-responsive">
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th class="text-center">Montant (€)</th>
                                        <th class="text-center">Type de paiement)</th>
                                        <th class="text-center">Commentaires</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>06/05/2019</td>
                                    <td class="text-center"><span style="font-weight: bold;">1500</span></td>
                                    <td class="text-center">PAYPAL</td>
                                    <td class="text-center">
                                          <i class="fa fa-comment" title="Avance frais de Transport"></i>
                                      </td>
                                 </tr>
                                   <tr>
                                     <td>1</td>
                                     <td>06/05/2019</td>
                                     <td class="text-center"><span style="font-weight: bold;">1500</span></td>
                                     <td class="text-center">PAYPAL</td>
                                     <td class="text-center">
                                           <i class="fa fa-comment" title="Avance frais de Transport"></i>
                                       </td>
                                  </tr>
                                    <tr>
                                      <td>1</td>
                                      <td>06/05/2019</td>
                                      <td class="text-center"><span style="font-weight: bold;">500</span></td>
                                      <td class="text-center">CASH</td>
                                      <td class="text-center">
                                            <i class="fa fa-comment" title="Avance frais de Transport"></i>
                                        </td>
                                   </tr>
                                     <tr>
                                       <td>1</td>
                                       <td>06/05/2019</td>
                                       <td class="text-center"><span style="font-weight: bold;">780</span></td>
                                       <td class="text-center">VIREMENT</td>
                                       <td class="text-center">
                                             <i class="fa fa-comment" title="Avance frais de Transport"></i>
                                         </td>
                                    </tr>
                               </tbody>
                             </table></div>
                </div>

                    <div class="col-lg-6">
                      <div class="col-lg-12" style="float: left; border-bottom: solid 1px red; margin-top: 10px">
                                          DEPENSES
                                  </div>
                    </div>

              </div>
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
