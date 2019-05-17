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
                                     <select id='sel_user'>
                                        <option>---</option>
                                        <option value='LF1556860926'>LF1556860926</option>
                                        <option value='GL1556874924'>GL1556874924</option>
                                        <option value='GL1557829206'>GL1557829206</option>
                                      </select>
                            
                                        <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

<!doctype html>

        
<!--            <select class="form-control">
            //<?php 
//
//            foreach($groups as $row)
//            { 
//              echo '<option value="'.$row->username.'">'.$row->username.'</option>';
//            }
//            ?>
            </select>-->


<div class="col-lg-12" style="font-size:10; padding:25px">

          <div class="col-lg-6"  style="text-align:left;margin-top:10px">
              <span style="font-weight:bold;">Dossier :</span> <span id='snum'></span></span>
          </div>
          <div class="col-lg-6"  style="text-align:left; margin-top:10px">
             <span style="font-weight:bold">Statut du dossier :</span> <span id='sstatut'></span>
          </div>
          <div class="col-lg-6" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Client :</span> <span id='snomclient'></span> - <span id='sprenomclient'></span>
          </div>
          <div class="col-lg-3" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Montant cotation :</span> <span id='smontant'></span>
          </div>
          <div class="col-lg-3" style="text-align:right; margin-top:10px">
              <span style="font-weight:bold">Marge :</span> <span  class="label-success" style="color:white">&nbsp; 3 500 &nbsp;</span>
          </div>
        </div>

 <div class="col-lg-12" >
                <div class="col-lg-6" style="border: solid 1px red; padding: 10px;">
                  <div class="col-lg-12" style=" border-bottom: solid 1px green; margin-top: 10px;padding-bottom:10px;">
                                                        <div class="col-lg-7 col-md-6">
                                                                            PAIEMENTS &nbsp; <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/payement/open" >Nouveau paiement &nbsp;<i class="fa fa-plus"></i></a>
                                                        </div>
                                                          <div class="col-lg-5 col-md-6 text-right">
                                                             Total (€) : <span class="chit-chat-heading">4280</span>
                                                        </div>
                              </div>
                              <div class="col-lg-12 table-responsive">
                                  <table id="table" class="table table-hover">
                                    <thead>
                                      <tr>
                                         <th>Date</th>
                                        <th class="text-center">Montant (€)</th>
<!--                                        <th class="text-center">Type de paiement)</th>-->
                                        <th class="text-center">Commentaires</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr><td>selectionnez le numero du Document dans la liste déroulante ci-haut</td></tr>
                               </tbody>
                             </table></div>
                </div>

                    <div class="col-lg-6" style="border: solid 1px red; padding: 10px; ">
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
                                          
                                   </tbody>
                                 </table></div>
                    </div>

              </div>
 
</div>

<!-- Script -->
<!--        <script src="<-?php echo base_url(); ?>script/jquery-3.0.0.js"></script>-->

        <!-- Load Exteral script file (Remove the comment if you want send AJAX request from external script file ) -->
        <!--<script src='<?php echo base_url(); ?>script/script.js' type='text/javascript' ></script>-->
        <script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
                
                // Comment or remove the below change event code if you want send AJAX request from external script file
                $('#sel_user').change(function(){
                    var numero_dossier = $(this).val();
                    $.ajax({
                        url:'<?=base_url()?>index.php/Detail_suivi/userDetails',
                        method: 'post',
                        data: {numero_dossier: numero_dossier},
                        dataType: 'json',
                        success: function(response){
                    
                            var len = response.length;

                            if(len > 0){
                                // Read values
                                var num = response[0].numero_dossier;
                                var status = response[0].status_dossier;
                                var montant = response[0].montant_traitement;
                                var nomcli = response[0].nom_client;
                                var prenomcli = response[0].prenom_client;
                                
                                $('#snum').text(num);
                                $('#sstatut').text(status);
                                $('#smontant').text(montant);
                                $('#snomclient').text(nomcli);
                                $('#sprenomclient').text(prenomcli);
                               
                            }else{
                                $('#snum').text('');
                                $('#sstatut').text('');
                                $('#smontant').text('');
                                $('#snomclient').text('');
                                $('#sprenomclient').text('');
                            }
                          
                        }
                    });
                });
  $('#sel_user').change(function(){
  
  $.ajax({
        type: 'GET',
        url: "<?php echo site_url('Detail_suivi/ajax_getkotas') ?>/" + $('#sel_user').val(), // we call our new function with the selected id
        
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
})
            });
        </script>
    </body>
</html>

<?php include(APPPATH . "views/templates/footer.php"); ?>
