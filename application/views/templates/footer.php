
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 CRM. All Rights Reserved | Design by  <a href="http://#/" target="_blank">TeamInOngola</a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
  <?php include(APPPATH . "views/templates/menu_left.php"); ?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="<?php echo base_url('vendor/js/jquery.nicescroll.js') ?>"></script>
		<script src="<?php echo base_url('vendor/js/scripts.js') ?>"></script>
		<!--//scrolling js-->
<script src="<?php echo base_url('vendor/js/bootstrap.js') ?>"> </script>
<!-- mother grid end here-->
</body>
</html>
