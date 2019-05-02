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
Ouverture de dossiers &nbsp;
</div>
        <br/>    <br/>
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Nom </label>
                    <div class="col-md-9">
                        <input name="nom_client"  class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Prenom</label>
                    <div class="col-md-9">
                        <input name="prenom_client"  class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-9">
                        <input name="email_client" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Tel</label>
                    <div class="col-md-9">
                        <input name="tel_client"    class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
              <div class="form-group">
                    <label class="control-label col-md-3">Adresse</label>
                    <div class="col-md-9">
                        <input name="addresse_client"    class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Autre info</label>
                    <div class="col-md-9">
                        <input name="autre_info_client"    class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>

            </div>
        </form>
</div>
</div>


<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
