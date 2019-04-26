<!-- /#Header -->
<?php
require_once(APPPATH . "views/templates/header.php");
?>
<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->

              <?php include(APPPATH . "views/templates/header_main.php"); ?>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3>83</h3>
						<h4>Dossiers en cours</h4>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-book"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3>135</h3>
					<h4>Tâches</h4>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-edit"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3>23</h3>
						<h4>Rendez-vous</h4>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-calendar"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Dossiers Récents
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Dossiers</th>
                                      <th>Client</th>

                                      <th>Status</th>
                                      <th class="text-center">Montant cotation (€)</th>
                                      <th class="text-center">Dépenses (€)</th>
                                      <th class="text-center">Paiements (€)</th>
                                      <th class="text-center">Marges (€)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><span style="font-weight: bold;">CAMION MERCEDES 5214</span></td>
                                  <td>Malbum Hadamou</td>

                                  <td><span class="label label-danger">&nbsp;&nbsp;En cours&nbsp;</span></td>
                                  <td class="text-center">11500</td>
                                  <td class="text-center">11500</td>
                                  <td class="text-center">10000</td>
                                  <td class="text-center"><p class="label-danger" style="color:white">- 1 500</p></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td><span style="font-weight: bold;">SEMI REMORQUE HONDA</span></td>
                                  <td>Evan</td>

                                  <td><span class="label label-success">&nbsp;&nbsp;Terminé &nbsp;</span></td>
                                  <td class="text-center">15000</td>
                                  <td class="text-center">15000</td>
                                  <td class="text-center">11500</td>
                                  <td class="text-center"><p class="bg-primary" style="color:white"> 0 </p></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td><span style="font-weight: bold;">TOYOTA YARIS</span></td>
                                  <td>John</td>

                                  <td><span class="label label-warning">En attente</span></td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">5000</td>
                                  <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td><span style="font-weight: bold;">RENAULT SAFRAN</span></td>
                                  <td>Danial</td>

                                  <td><span class="label label-info">&nbsp;En cours&nbsp;&nbsp;</span></td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1000</td>
                                  <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td><span style="font-weight: bold;">OPEL ASTRA</span></td>
                                  <td>David</td>

                                  <td><span class="label label-warning">En attente</span></td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1000</td>
                                  <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td><span style="font-weight: bold;">FORD Focus</span></td>
                                  <td>Mickey</td>
                                  <td><span class="label label-info">&nbsp;En cours&nbsp;&nbsp;</span></td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1500</td>
                                  <td class="text-center">1000</td>
                                  <td class="text-center"><p class="label-success" style="color:white">3 500</p></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>

     <div class="clearfix"> </div>
</div>
<!--main page chit chating end here-->
<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">
		<div class="col-md-12 chart-layer1-left">
			<div class="glocy-chart">
			<div class="span-2c">
                        <h3 class="tlt">Analyse de l'activité</h3>
                        <canvas id="bar" height="300" width="800" style="width: 100%; height: 300px;"></canvas>
                        <script>
                            var barChartData = {
                            labels : ["Jan","Feb","Mar","Apr","May","Jun","jul"],
                            datasets : [
                                {
                                    fillColor : "#FC8213",
                                    data : [65,59,90,81,56,55,40]
                                },
                                {
                                    fillColor : "#337AB7",
                                    data : [28,48,40,19,96,27,100]
                                }
                            ]

                        };
                            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

                        </script>
                    </div>
			</div>
		</div>

	 <div class="clearfix"> </div>
  </div>
 </div>


<!--climate end here-->
</div>
<!--inner block end here-->
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
