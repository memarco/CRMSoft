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
Payement du  dossier &nbsp;
</div>
        <br/>    <br/>
        <form action="#" id="form" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">N°Dossier</label>
              <div class="col-md-9">
                  <select class="form-control" id="s_dossier" name="id_dossier">
                  </select>
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
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>

</div>

<script type="text/javascript">

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


function save()
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
                    window.location.href = "<?php echo site_url('payement/success')?>";
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}
$(document).ready(function() {
 bind_dossier();
 bind_type_payement();
});
</script>
<!--inner block end here-->
<?php include(APPPATH . "views/templates/footer.php"); ?>
