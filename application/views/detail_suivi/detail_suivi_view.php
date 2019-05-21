<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!--inner block start here-->
 <div class="chit-chat-layer1">
     <div class="col-md-12 chit-chat-layer1-left">

  <html>
    <head>
        <title>How to send AJAX request in Codeigniter</title>
    </head>
    <body>
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




<div class="col-lg-12" id="block-detail-suivi" style="visibility:hidden">
<div class="col-lg-12" style="font-size:10; padding:25px">

          <div class="col-lg-6"  style="text-align:left;margin-top:10px">
              <span style="font-weight:bold;">Dossier :</span> <span id='snum'></span></span>
          </div>
          <div class="col-lg-6"  style="text-align:left; margin-top:10px">
             <span style="font-weight:bold">Statut du dossier :</span> <span id='sstatut'></span>
          </div>
          <div class="col-lg-6" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Client :</span>  <span id='sprenomclient'></span>&nbsp;<span id='snomclient'></span>
          </div>
          <div class="col-lg-3" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Montant cotation :</span> <span id='smontant'></span>
          </div>
          <div class="col-lg-3" style="text-align:right; margin-top:10px">
              <span style="font-weight:bold">Marge (€):</span> <span  class="label-success" style="color:white" id="contain-marge">&nbsp; <span id="marge-dossier"></span> &nbsp;</span>
          </div>
        </div>

 <div class="col-lg-12" >
                <div class="col-lg-6" style=" padding: 10px;">
                  <div class="col-lg-12" style=" border-bottom: solid 1px green; margin-top: 10px;padding-bottom:10px;">
                                                        <div class="col-lg-7 col-md-6">
                                                                            PAIEMENTS &nbsp; <a class="btn btn-success" href="#" onclick="add_payment()" id="btn_save_payment">Nouveau paiement &nbsp;<i class="fa fa-plus"></i></a>
                                                        </div>
                                                          <div class="col-lg-5 col-md-6 text-right">
                                                             Total (€) : <span class="chit-chat-heading" id="total_payement"></span>
                                                        </div>
                              </div>
                              <div class="col-lg-12 table-responsive">
                                <br/>
                                  <table id="table_payment" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                         <th>Date</th>
                                        <th class="text-center">Montant (€)</th>
<!--                                        <th class="text-center">Type de paiement)</th>-->
                                        <th class="text-center">Commentaires</th>
                                    </tr>
                                </thead>
                                <tbody>

                               </tbody>
                             </table></div>
                </div>

                    <div class="col-lg-6" style=" padding: 10px; ">
                      <div class="col-lg-12" style=" border-bottom: solid 1px red; margin-top: 10px; padding-bottom:10px;">
                                        <div class="col-lg-7">
                                          DEPENSES  &nbsp; <a class="btn btn-success" href="#" onclick="add_depense()" id="btn_save_depense">Nouvelle depense &nbsp;<i class="fa fa-plus"></i></a>
                                        </div>
                                          <div class="col-lg-5 text-right">
                                             Total (€) : <span class="chit-chat-heading" id="total_depense"></span>
                                        </div>
                                  </div>
                                  <div class="col-lg-12 table-responsive">
                                      <br/>
                                    <table id="table_depense" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Date</th>
                                            <th class="text-center">Montant (€)</th>
                                          <!--  <th class="text-center">Type de dépense</th> -->
                                            <th class="text-center">Commentaires</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                   </tbody>
                                 </table></div>
                    </div>

              </div>
</div>
</div>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Client Form</h3>
            </div>
            <div class="modal-body form">
<div class="chit-chat-heading">
Payement du  dossier &nbsp;
</div>
    <br/>    <br/>
    <form action="#" id="form" class="form-horizontal">
        <input type="hidden" value="" name="id"/>
        <div class="form-body">

      <div class="form-group">
          <label class="control-label col-md-3">Dossier</label>
          <div class="col-md-9">
              <select class="form-control" id="ps_dossier" name="id_dossier">
              </select>
              <span class="help-block"></span>
          </div>
      </div>

        <div class="form-group">
            <label class="control-label col-md-3">Libellé:</label>
            <div class="col-md-9">
                <input name="libelle_payement"  class="form-control" type="text">
                <span class="help-block"></span>
            </div>
        </div>

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

            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_payment()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
     
<!--     Boîte dialogue depense-->

   
     
</div>

<!-- Script -->
<!--        <script src="<-?php echo base_url(); ?>script/jquery-3.0.0.js"></script>-->

        <!-- Load Exteral script file (Remove the comment if you want send AJAX request from external script file ) -->
        <!--<script src='<?php echo base_url(); ?>script/script.js' type='text/javascript' ></script>-->
        <script type='text/javascript'>
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
        function add_payment(id_dossier){
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string
          var items = "";
           items += "<option value='"+id_dossier+"' selected>"+document.getElementById('s_dossier').value+"</option>";
                $("#ps_dossier").html(items);
          //document.getElementById('ps_dossier').value=document.getElementById('s_dossier').value;
          bind_type_payement();
          $('#modal_form').modal('show'); // show bootstrap modal
          $('.modal-title').text('Nouveau paiement'); // Set Title to Bootstrap modal title
        }

        function save_payment()
        {


            // ajax adding data to database
            $.ajax({
                url : "<?php echo site_url('payement/ajax_add')?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                          load_tables(document.getElementById('s_dossier').value);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');

                }
            });
        }
        
        function add_depense(id_dossier){
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string
          var items = "";
           items += "<option value='"+id_dossier+"' selected>"+document.getElementById('s_dossier').value+"</option>";
                $("#hs_dossier").html(items);
          //document.getElementById('ps_dossier').value=document.getElementById('s_dossier').value;
//          bind_type_payement();
          $('#modal_form1').modal('show'); // show bootstrap modal
          $('.modal-title').text('Nouvelle depense'); // Set Title to Bootstrap modal title
        }
        
        function save_depense()
        {
            // ajax adding data to database
            $.ajax({
                url : "<?php echo site_url('depense/ajax_add')?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form1').modal('hide');
                          load_tables(document.getElementById('s_dossier').value);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');

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
                         items += "<option value='" + item.numero_dossier + "'>" + (item.numero_dossier) + " | "+ (item.libelle_dossier) +"</option>";
                   });
                   $("#s_dossier").html(items);


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function load_tables(numero_dossier){
          $.ajax({
              url:'<?=base_url()?>index.php/Detail_suivi/getDossierPayment',
              method: 'post',
              data: {numero_dossier: numero_dossier},
              dataType: 'json',
              success: function(response){
                    var num =  response.data_client.numero_dossier;
                    var status = response.data_client.status_dossier;
                    var montant = response.data_client.montant_traitement;
                    var nomcli = response.data_client.nom_client;
                    var prenomcli = response.data_client.prenom_client;
                    var marge = response.data_marge.marge;
                    var total_payement = response.data_marge.total_payement;
                    var total_depense = response.data_marge.total_depense;

                    $('#snum').text(num+" "+response.data_client.libelle_dossier);
                    $('#sstatut').text(status);
                    $('#smontant').text(montant);
                    $('#snomclient').text(nomcli);
                    $('#sprenomclient').text(prenomcli);
                    $('#total_payement').text(parseFloat(total_payement));
                    $('#total_depense').text(parseFloat(total_depense));
                    document.getElementById('btn_save_payment').setAttribute('onclick','add_payment("'+response.data_marge.numero_dossier+'")');
                    document.getElementById('btn_save_depense').setAttribute('onclick','add_depense("'+response.data_marge.numero_dossier+'")');
                    
                    if(marge<0){
                      document.getElementById('contain-marge').style ="background-color:red; color:white";
                    }else{
                      document.getElementById('contain-marge').style ="background-color:green; color:white";
                    }

                    $('#marge-dossier').text(marge);

                  var len = response.data_paiement.length;
                  var len_d = response.data_depense.length;
                  if(len > 0){
                      // Read values
                    $('#table_payment').DataTable().clear().destroy();
                      /*  var list_payments = "";
                      for(i=0;i<len;i++){
                         list_payments += "<tr><td>"+response[i].date+"</td><td style='text-align:center'>"+response[i].montant_payement+"</td><td>"+response[i].commentaire_payement+"</td></tr>";
                       }*/

                      $("#table_payment").DataTable({
                      "data": response.data_paiement,
                      "columns": [
                        { data: 'date_payement' },
                        { data: 'montant_payement' }, //or { data: 'MONTH', title: 'Month' }`
                        { data: 'commentaire_payement' }
                      ]
                    });

                  }else{
                        $('#table_payment tbody').html("<tr><td>Aucun paiement effectué.</td></tr>");
                  }

                  if(len_d > 0){
                      // Read values
                      /*  var list_payments = "";
                      for(i=0;i<len;i++){
                         list_payments += "<tr><td>"+response[i].date+"</td><td style='text-align:center'>"+response[i].montant_payement+"</td><td>"+response[i].commentaire_payement+"</td></tr>";
                       }*/
                       if (  $.fn.DataTable.isDataTable( '#table_depense' ) ) {
                         $('#table_depense').DataTable().clear().destroy();
                         $("#table_depense").DataTable({
                         "data": response.data_depense,
                         "columns": [
                           { data: 'date_depense' },
                           { data: 'montant_depense' }, //or { data: 'MONTH', title: 'Month' }`
                           { data: 'commentaire_depense' }
                         ]
                       });
                       }
                       else{
                         $("#table_depense").DataTable({
                         "data": response.data_depense,
                         "columns": [
                           { data: 'date_depense' },
                           { data: 'montant_depense' }, //or { data: 'MONTH', title: 'Month' }`
                           { data: 'commentaire_depense' }
                         ]
                       });
                       }


                  }else{
                        $('#table_depense tbody').html("<tr><td>Aucune dépense effectuée.</td></tr>");
                  }

              }
          });

        }
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            $(document).ready(function(){
              bind_dossier();
                // Comment or remove the below change event code if you want send AJAX request from external script file
                $('#s_dossier').change(function(){
                    var numero_dossier = $(this).val();
                    document.getElementById('block-detail-suivi').style='visibility:block';
                  load_tables(numero_dossier);
                });
/*  $('#s_dossier').on('change',function(){
  var numero_dossier = $(this).val();
  $.ajax({
        //type: 'GET',
        url: "<?php echo site_url('Detail_suivi/ajax_getkotas') ?>", // we call our new function with the selected id
        method: 'post',
         data: {numero_dossier: numero_dossier},
        success: function (data) { // change the data from our response
            $('#table tbody').html(data); //rows are printed inside the tbody of our table
        },
        failure: function(err) {console.log("Error on the Ajax call");} // Some error feedback just in case. You can check network XHR to see what's going on.
    })

//table = $('#table').DataTable({
//
//        "processing": true, //Feature control the processing indicator.
//        "serverSide": true, //Feature control DataTables' server-side processing mode.
//        "order": [],
//  "ajax": {
//            "url": "<-?php echo site_url('Detail_suivi/ajax_list_suivi')?>",
//            "type": "POST"
//          },
//
//        //Set column definition initialisation properties.
//        "columnDefs": [
//        {
//            "targets": [ -1 ], //last column
//            "orderable": false, //set not orderable
//        },
//        ],
//
//    })
})*/
            });
        </script>
  
 <div class="chit-chat-layer1"> 
   <div class="modal fade" id="modal_form1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Client Form</h3>
            </div>
            <div class="modal-body form">
<div class="chit-chat-heading">
Depense du  dossier &nbsp;
</div>
    <br/>    <br/>
    <form action="#" id="form" class="form-horizontal">
        <input type="hidden" value="" name="id"/>
        <div class="form-body">

      <div class="form-group">
          <label class="control-label col-md-3">Dossier</label>
          <div class="col-md-9">
              <select class="form-control" id="hs_dossier" name="id_dossier">
              </select>
              <span class="help-block"></span>
          </div>
      </div>

        <div class="form-group">
            <label class="control-label col-md-3">Libellé:</label>
            <div class="col-md-9">
                <input name="libelle_depense"  class="form-control" type="text">
                <span class="help-block"></span>
            </div>
        </div>
<!--
            <div class="form-group">
                <label class="control-label col-md-3">Type Payement : </label>
                <div class="col-md-9">
                    <select class="form-control" id="s_type_payement" name="id_type_payement">
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>-->

            <div class="form-group">
                <label class="control-label col-md-3">Montant Depense :</label>
                <div class="col-md-9">
                    <input name="montant_depense"    class="form-control" type="number">
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
                <button type="button" id="btnSave" onclick="save_depense()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
 
 </div>
    </body>
</html>

<?php include(APPPATH . "views/templates/footer.php"); ?>
