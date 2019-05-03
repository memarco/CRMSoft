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
Ouverture des Depenses &nbsp;
</div>
        <br/>    <br/>
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
                
            <div class="form-group">
                <label class="control-label col-md-3">Libelle Type depense</label>
                <div class="col-md-9">
                    <select class="form-control" id="s_type_depense" name="id_type_depense">
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>
                 
                 
            <div class="form-group">
                    <label class="control-label col-md-3">Dossier : </label>
                    <div class="col-md-9">
                        <select class="form-control" id="s_dossier" name="id_dossier">
                        </select>
                        <span class="help-block"></span>
                    </div>
            </div>
                     
            <div class="form-group">
                <label class="control-label col-md-3">Libellé depense :</label>
                <div class="col-md-9">
                    <input name="libelle_dossier"  class="form-control" type="text">
                    <span class="help-block"></span>
                </div>
            </div>
            
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

</div>

<script type="text/javascript">

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
        url : "<?php echo site_url('depense/ajax_add')?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                    window.location.href = "<?php echo site_url('depense/success')?>";
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}
$(document).ready(function() {
 bind_type_depense();
 bind_dossier();
});
</script>
<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
