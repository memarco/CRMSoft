<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<script src="<?php echo base_url('vendor/js/crud_operation_type_depenses.js') ?>"></script>
<!--inner block start here-->

  <div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
                 <div class="work-progres">
                              <div class="chit-chat-heading">
                                    Liste des clients &nbsp;
                                    <button type="button" class="btn btn-primary" data-toggle="modal" onclick="showForm()">
                                    Ajouter &nbsp;<i class="fa fa-plus"></i>
                                    </button>
                              </div>
                              <div class="table-responsive">
                                  <table class="table table-hover" id="type_depenseTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Type Depense(s)</th>
                                         
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="listRecords">
                            </tbody>
                        </table>
                    </div>
               </div>
        </div>

       <div class="clearfix"> </div>
  </div>

<!-- Modal pour le formulaire -->

<?php include(APPPATH . "views/type_depenses/form.html"); ?>

<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
