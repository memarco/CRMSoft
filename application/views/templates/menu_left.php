 <div class="sidebar-menu"  style="position:fixed">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
        <!--<img id="logo" src="" alt="Logo"/>-->
    </a> </div>
    <div class="menu">
      <ul id="menu">
        <li id="menu-home" ><a href="<?php echo base_url() ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
        <li id="menu-comunicacao" ><a href="<?php echo base_url(); ?>index.php/dossier"><i class="fa fa-book nav_icon"></i><span>Dossiers</span></span></a>
           <ul id="menu-academico-sub" >
               <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/dossier">Gestion</a></li>
<!--                 <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/dossier/suivi">Suivi</a></li> -->
               <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/suivi_dossier">Suivi</a></li>
             </ul>
         </li>
        <li id="menu-academico" ><a href="<?php echo base_url(); ?>index.php/payement"><i class="fa fa-money"></i><span>Paiments</span></a></li>
        <li id="menu-academico" ><a href="<?php echo base_url(); ?>index.php/depense"><i class="fa fa-credit-card"></i><span>Dépenses</span></a></li>
        <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Rapports</span></a></li>
        <li><a href="#"><i class="fa fa-calendar"></i><span>Agenda</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="inbox.html">To Do</a></li>
              <li id="menu-academico-boletim" ><a href="inbox-details.html">Relance</a></li>
             </ul>
        </li>
         <li><a href="#"><i class="fa fa-cog"></i><span>Paramètres</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
               <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/client">Clients</a></li>
                 <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/categorie">Catégories</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url(); ?>index.php/todo">A faire</a></li>
              <li id="menu-academico-boletim" ><a href="<?php echo base_url(); ?>index.php/type_payement">Types de paiements</a></li>
              <li id="menu-academico-boletim" ><a href="<?php echo base_url(); ?>index.php/type_depense">Types de dépenses</a></li>
             </ul>
         </li>
         <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
          <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
              <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
             </ul>
         </li> -->
      </ul>
    </div>
</div>
