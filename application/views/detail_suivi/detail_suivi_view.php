<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!--inner block start here-->
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
                                        <option value=''>---</option>
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
              <span style="font-weight:bold;">Dossier :</span> <span id='snum'></span>
          </div>
          <div class="col-lg-6"  style="text-align:left; margin-top:10px">
             <span style="font-weight:bold">Statut du dossier :</span> <span id='sstatut'></span>
          </div>
          <div class="col-lg-6" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Client :</span> <span id='snomclient'></span>
          </div>
          <div class="col-lg-3" style="text-align:left; margin-top:10px">
              <span style="font-weight:bold">Montant cotation :</span> <span id='smontant'></span>
          </div>
          <div class="col-lg-3" style="text-align:right; margin-top:10px">
              <span style="font-weight:bold">Marge :</span> <span  class="label-success" style="color:white">&nbsp; 3 500 &nbsp;</span>
          </div>
        </div>





            
        <!-- User details -->
<!--        <div >
            Username : <span id='suname'></span><br/>
            Name : <span id='sname'></span><br/>
            Email : <span id='semail'></span><br/>
        </div>-->

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
                                
                                $('#snum').text(num);
                                $('#sstatut').text(status);
                                $('#smontant').text(montant);
                                $('#snomclient').text(nomcli);
                               
                            }else{
                                $('#snum').text('');
                                $('#sstatut').text('');
                                $('#smontant').text('');
                                $('#snomclient').text('');
                            }
                           
                        }
                    });
                });
            });
        </script>
    </body>
</html>

<?php include(APPPATH . "views/templates/footer.php"); ?>
