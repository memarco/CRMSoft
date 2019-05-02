<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!--inner block start here-->

  <div class="chit-chat-layer1">
    <div class="col-md-12">
  <div class="chit-chat-heading">
Ouverture de dossier &nbsp;
</div>
        <br/>    <br/>
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">Libellé du dossier :</label>
                <div class="col-md-9">
                    <input name="libelle_dossier"  class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Type de dossier</label>
                <div class="col-md-9">
                    <select class="form-control" id="s_type_dossier" name="id_categorie">
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Client : </label>
                    <div class="col-md-9">
                        <select class="form-control" id="s_client" name="id_client">
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Montant côtation (Euro) :</label>
                    <div class="col-md-9">
                        <input name="montant_traitement"    class="form-control" type="text">
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

                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>

</div>

<script type="text/javascript">

function bind_type_dossier()
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('categorie/get_data')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var items = "";
           items += "<option value='' disabled selected>- Choisir -</option>";
           $.each(data, function (i, item) {
                 items += "<option value='" + item.id + "'>" + (item.libelle_categorie) + "</option>";
           });
           $("#s_type_dossier").html(items);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
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


function save()
{


    // ajax adding data to database
    $.ajax({
        url : "<?php echo site_url('dossier/ajax_add')?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                    window.location.href = "<?php echo site_url('dossier/success')?>";
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}
$(document).ready(function() {
 bind_type_dossier();
 bind_client();
});
</script>
<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
