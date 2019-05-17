<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!--inner block start here-->

  <div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">

                              <div class="col-md-12 chit-chat-heading" style="border-bottom: solid 2px blue; padding-bottom:unset">
                                <div class="col-md-6">
                              Suivi des dossiers
                            </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">N°Dossier</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="s_dossier" name="id_dossier">
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

        <div class="col-lg-12" style="font-size:10; padding:25px">

          <div class="col-lg-6"  style="text-align:left;margin-top:10px">
              <span style="font-weight:bold;">Dossier :</span> <span>PK2150118360</span> - <span>CAMION MERCEDES 5214</span>
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
              <div class="col-lg-12" >
                <div class="col-lg-6" style="border: solid 1px red; padding: 10px;">
                  <div class="col-lg-12" style=" border-bottom: solid 1px green; margin-top: 10px;padding-bottom:10px;">
                                                        <div class="col-lg-7 col-md-6">
                                                                            PAIEMENTS &nbsp; <button class="btn btn-success">Nouveau paiement &nbsp;<i class="fa fa-plus"></i></button>
                                                        </div>
                                                          <div class="col-lg-5 col-md-6 text-right">
                                                             Total (€) : <span class="chit-chat-heading">4280</span>
                                                        </div>
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

                    <div class="col-lg-6" style="border: solid 1px red; padding 10px; ">
                      <div class="col-lg-12" style=" border-bottom: solid 1px red; margin-top: 10px; padding-bottom:10px;">
                                        <div class="col-lg-7">
                                          DEPENSES  &nbsp; <button class="btn btn-danger">Nouvelle dépense &nbsp;<i class="fa fa-plus"></i></button>
                                        </div>
                                          <div class="col-lg-5 text-right">
                                             Total (€) : <span class="chit-chat-heading">4280</span>
                                        </div>
                                  </div>
                                  <div class="col-lg-12 table-responsive">
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th class="text-center">Montant (€)</th>
                                            <th class="text-center">Type de dépense</th>
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

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}


function bind_type_depense()
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('type_depense/get_data')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var items = "";
           items += "<option value='' disabled selected>- Choisir -</option>";
           $.each(data, function (i, item) {
                 items += "<option value='" + item.id + "'>" + (item.libelle_type_depense) + "</option>";
           });
           $("#s_type_depense").html(items);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

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
                 items += "<option value='" + item.id + "'>" + (item.libelle_dossier) + "</option>";
           });
           $("#s_dossier").html(items);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

$(document).ready(function() {
 bind_type_depense();
 bind_dossier();
});

</script>

<!-- Modal pour le formulaire -->

<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
