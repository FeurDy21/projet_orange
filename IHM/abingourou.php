<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/ui_modal.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Dec 2018 12:29:44 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Datacenter | RP</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="admin/assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/light/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!--bootstrap -->
    
	<link href="admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="admin/assets/material/material.min.css">
	<link rel="stylesheet" href="admin/light/css/material_style.css">
	<!-- Theme Styles -->
    <link href="admin/light/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="admin/light/css/style.css" rel="stylesheet" type="text/css" />
    <link href="admin/light/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/light/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="admin/light/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="admin/light/img/favicon.ico" /> 

    <!--lightboximage-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style/event/css/styles.css">
    <link rel="stylesheet" href="../style/event/css/Lightbox-Gallery.css">

     <!-- Custom fonts for this theme -->
  <link href="style_section/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- Theme CSS -->
  <link href="style_section/css/freelancer.min.css" rel="stylesheet">

   <!--plugin-->
    <!-- <script src="https://storage.googleapis.com/code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet"
          href="https://storage.googleapis.com/code.getmdl.io/1.2.1/material.deep_orange-amber.min.css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="mdl-jquery-modal-dialog.css">-->
    <style>
        .derouler{font-weight: bold;color:red; box-shadow:12px 9px 45px 3px white; float: right;border-radius: 7px/8px; margin-bottom: 4px;}
        h4{color: #ED7F10;}

       #imsserver table [id]:hover{background-color:#ED7F10!important;}
     
   
    </style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indig" style="background: url(admin/light/img/dangasite.jpg);">
    <div class="page-wrapper">
        <!-- start header -->
		<div class="page-header navbar navbar-fixed-to" style="background:black; color:orange!important;" >
            <div class="page-header-inner">
                <!-- logo start -->
                <style type="text/css"> .page-logo a:hover,.icon-menu:hover{text-decoration:none!important; color:orange !important; } </style>
                <div class="page-logo" >
                    <a href="page-site.php" style="color:#ED7F10!important;">
                     <img src="admin/light/img/Orange59_large.png" width="20%" class="logo-icon fa-rotate-45"/>
                    <span class="logo-default" style="font-size:.8em!important;">DATACENTER</span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                 <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group" >
                        <input type="text" class="form-control" style="color:#ED7F10!important; font-size:1.2em;"  placeholder="Rech..." name="query">
                        <span class="input-group-btn" >
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier" style="color:#ED7F10!important;"></i>
                           </a>
                        </span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                
            </div>
        </div>
        <!-- end header -->
        <!-- start color quick setting -->
        <div class="quick-setting-main">
			<button class="control-sidebar-btn btn" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></button>
			<div class="quick-setting display-none">
				<ul id="themecolors" >
				<li><p class="selector-title">Main Layouts</p></li>
				<li class="complete"><div class="theme-color layout-theme">
				<a href="#" data-theme="light"><span class="head"></span><span class="cont"></span></a>
				<a href="http://radixtouch.in/templates/admin/redstar/source/dark/blank_page.html" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
				</div></li>	
				<li><p class="selector-title">Sidebar Color</p></li>
				<li class="complete"><div class="theme-color sidebar-theme">
				<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
				</div></li>
             	<li><p class="selector-title">Header Brand color</p></li>
             	<li class="theme-option"><div class="theme-color logo-theme">
             	<a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
				<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
             	</div></li>
             	<li><p class="selector-title">Header color</p></li>
             	<li class="theme-option"><div class="theme-color header-theme">
             	<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
             	<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
             	</div></li>
			</ul>
			</div>
		</div>
		<!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->	 
            <div class="page-content-wrappe">
                <div class="page-content">
                  <!--  <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                 <li><a class="parent-item" href="#">UI Elements</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Modals</li>
                            </ol>
                        </div>
                    </div>-->
                    <!-- #Start# Basic Modal Example -->
<div class="row">
<div class="col-sm-12" >						 <!-- Portfolio Section -->
<div class="card-box">

<div class="card-body ">
     <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"> Bienvenue sur le site d'abingourou</h2>
<div class="col-lg-12 ">  
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
     

      <!-- Icon Divider -->
      <!--<div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>-->
      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-md-6 col-lg-4">
            <h4 class="title text-center">SALLE IMS SERVER</h4>
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#fluidModel">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-0 w-0">
              <div class="portfolio-item-caption-content text-center " style="color: orange;">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="admin/light/img/salle_ims.png" alt="">
          </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-md-6 col-lg-4">
            <h4 class="title text-center">SALLE TRANSIMISSION </h4>
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#fluidModel2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h- w-0">
              <div class="portfolio-item-caption-content text-center " style="color: orange;">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="admin/light/img/transmissiondanga.png"  alt="">
          </div>
        </div>

        <!-- Portfolio Item 3 -->
        <div class="col-md-6 col-lg-4">
            <h4 class="title text-center">SALLE ENERGIE</h4>
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#fluidModel2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center  ">
              <div class="portfolio-item-caption-content text-center text-whit" style="color: orange;">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="admin/light/img/energiedanga.jpg" width="300%" alt="">
          </div>
        </div>

        
      </div>
      <!-- /.row -->

    </div>
    <br><br><br><br>
  </section>
     </div>
 </div>

 <!-- start footer -->
<div class="page-footer">
            <div class="page-footer-inner"> Orange CI copyright 2019 &copy; 
                <a href="mailto:Galogbe92@hgmail.com" target="_top" class="makerCss"  style="color: orange!important;">Galogbe</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
</div>
<!-- end footer -->

     </div>                       
</div>


</div>
</div>					
					
					
					<!-- salle ims serveur de danga Fluid Model  -->
					<div class="modal fade" id="fluidModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    <div class="modal-dialog modal-fluid modal-dialog-centered" role="document">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title" id="exampleModalLabel">SALLE IMS SERVER</h4>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
					            </div>
					            <div class="modal-body">
					                <div class="table-responsive" id="imsserver">
          <table style="background:gray !important; text-align:center;" border="1" class="tableau">
          <tr>
             <td>vide </td>
             <td> vide</td>
                          <td> vide</td>
                           <td> </td>
              <td><button class="btn clim btn-sm" >116</button></td>
             <td><button class="btn btn-primary btn-sm">ai12</button></td>
             <td >vide </td>
              <td>vide </td>
             <td> <a class="btn btn-primary btn-sm" title="" id="ai02"><br><span>ai02<span></a></td>
             <td> <button class="btn  btn-sm"><span>i01</span></button></td>
                         <td><button style="background-color: red;" class="btn btn-primary btn-sm"><br></button></td>
             
                         <td> <a href=""><i class="fa fa-fire-extinguisher " style="color: red;"></i></a></td>
              <td> <button class="btn btn-danger btn-sm"></button></td>
             <td> <button class="btn btn-danger btn-sm"></button></td>
             <td> <button class="btn btn-danger btn-sm"></button></td>
              <td> <button class="btn btn-danger btn-sm"></button></td>
             <td> <button class="btn clim btn-sm" >114</button></td>
             <td><button style="background-color: red;" class="btn btn-primary btn-sm"><br></button></td>
              <td> vide</td>
             <td> vide</td>
             <td> vide</td>
              <td width="70%"> </td>
             <td width="70%"> </td>
             
          </tr>
                  <tr><td colspan="24" bgcolor="red">rien ne peut être mis ici, il y a des betons installés là.</td></tr>
                  <tr><td colspan="24" bgcolor="white"> cette ligne peut encore recevoir des baies dans des zones bien pricises</tr>
          <tr><!--deuxiement -->
             <td><a href=""><i class="fa fa-fire-extinguisher " style="color: red; font-size:1.5em;"></i></a></td>
            <td colspan="2"> </td>
                         <td width="20%"> vide</td>
                     <td> <a class="btn btn-primary btn-sm" id="ag01"> <br><span>AG01</span></a></td>
             <td colspan="2"> </td>
                         <td> <button class="btn btn-primary btn-sm" title="Kandé BAYA 08904662" id="AF01">RNC NOKIA<br/><span>AF01<span></button></td>
                          <td> </td>
                          <td> <button class="btn btn-primary btn-sm" id="ae01">HUAWEI CORE PS<br><span>AE01</span></button></td>
                          <td> </td>
                          <td> <button class="btn btn-primary btn-sm" id="ad01" title="Kandé BAYA 08904662">OTARIE<br/><span>AD01</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS" id="ac01"> CDMA<br><span>AC01</span></button></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="Kandé BAYA 08904662" title="YEBOUE DARIUS" id="AB01">HUAWEI CDMA<br><span>AB01</span></button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS" id="aa01"> WASN9770 HUAWEI <br><span>AA01</span></button></td>
                         
          </tr><!--fin de la quatrime ligne -->
          <tr>
          <td ><a href=""></a> </td>
           <td > </td>
           <td> </td>
                    <td> </td>
                     
                   <td> 
                  <a class="btn btn-primary btn-sm" id="ag02"><span>ag02</span></a>
                   </td>
             <td></td>
                     <td></td>
                     <td> </td>
                     <td></td>
                     <td>
                  <a class="btn btn-primary btn-sm" id="ae2">HUAWEI CORE PS<br><span>AE02</span></a>
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="ANDY 59083300" id="ad02">ALCATEL LUCENT<br><span>AD02</button></span></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="ac02"> PDSN9660 CDMA <br><span>AC02</span></button></td>
                          <td></td>
                          <td colspan="2"> <button class="btn btn-primary btn-sm" title="HUAWEI CDMA" id="AB02" title="YEBOUE DARIUS 07070023" > HUAWEI CDMA <br>AB02</button></td>
                          <td> </td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="LOUA JACQUES 08089051" id="aa02">Quidway HUAWEI <br> AA02</button></td>
                         
             
          </tr>
                  <tr>
          <td ><a href=""><i class="fa fa-fire-extinguisher " style="color: red; font-size:1.5em;"></i></a> </td>
           <td > </td>
           <td> </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                  <a class="btn btn-primary btn-sm" title="MANGLE JOSEPH" id="AE03">HUAWEI CORE PS<br><span>AE03</span></a>
                  
            
                     </td>
                     <td></td>
                          <td> <button class="btn btn-primary btn-sm" title="BONIE Roger" id="ad03">ALCATEL LUCENT<br><span>AD03</span></button></td>
                          <td></td>
                          <td colspan="2"><button class="btn btn-primary btn-sm" title="YEBOUE DARIUS" id="ac03">RAC6610 CDMA <br>AG03</button></td>
                          <td> </td>
                          <td colspan="2" ><button class="btn btn-primary btn-sm" id="AB03" title="YEBOUE DARIUS 07070023">HUAWEI CDMA <br><span>AB03</span></button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="HUAWEI  DE LA RADIO MAGLOIRE BENIMIEN 07205236" id="aa03"> SR TELECOM <br>AA03</button></td>
                         
             
          </tr>
                   <tr>
          <td ></td>
           <td > </td>
           <td> </td>
                    <td> </td>
                   <td>
                     <a class="btn btn-primary btn-sm" id="ag03">AG03</a> 
                   </td>
             <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                  <a class="btn btn-primary btn-sm" id="ae04">HUAWEI CORE PS<br>AE04</a>
                 
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="ad04">TEST BED<br><span>AD04</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS" id="AC04">AICA 5<br> AC04</button></td>
                          <td></td>
                          <td colspan="2"> <button class="btn btn-primary btn-sm" id="AB04">HUAWEI CDMA <br><span>AB04</span></button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2"> <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="aa04">HUAWEI  ZENITH<br/>AA04</button></td>
                         
                     
          </tr>
                   <tr>
          <td ><a href=""><i class="fa fa-fire-extinguisher" style="color: red; font-size:1.5em;"></i></a> </td>
           <td > </td>
           <td> </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" title="" id="ag04">AG04</a>
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <div class="btn-group">
                  <a class="btn btn-primary btn-sm" id="af02">AF02</a>
                  
            </div> 
                     </td>
                     <td></td>
                     <td><div class="btn-group" id="">
                  <a class="btn btn-primary btn-sm"  id="ae05">HUAWEI CORE PS<br>AE05</a>
                  
            </div> 
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="vide" id="AD05"><span>AD05</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="ac05"> Alcatel lucent <br>AC05</button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="AB05">  HUAWEI CDMA <br>AB05</button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="aa05">HUAWEI  ZENITH <br>AA05</button></td>
                         
             
          </tr>
                   <tr>
          <td > </td>
           <td > </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">AH01</a>
                  
            </div> 
            </div>
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" >AG05</a>
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">AF03</a>
                 
            </div> 
                     </td>
                     <td></td>
                     <td>
                  <a class="btn btn-primary btn-sm" title="MANGLE JOSEPH" id="ae06">HUAWEI CORE PS<br>AE06</a>
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" id="AD06">U2000 CDMA<br><span>AD06</span></button></td>
                          <td></td>
                          <td colspan="2" ><button class="btn btn-primary btn-sm" id="ac06">OLT <br> AC06</button></td>
                          <td> </td>
                          <td colspan="2" ><button class="btn btn-primary btn-sm" title="" id="AB06">HUAWEI 6610 CDMA<br>AB06</button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" ><button class="btn btn-primary btn-sm" title="TANOH ADOU" id="aa06"> AA06</button></td>
                         
             
          </tr>
                  <tr>
          <td > </td>
           <td > </td>
           <td> 
                  <a class="btn btn-primary btn-sm" id="ah02">AH02</a>
                 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  id="ag06">AG06</a>
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <div class="btn-group">
                  <a class="btn btn-primary btn-sm" id="af04">AF04</a>
                  
            </div> 
                     </td>
                     <td></td>
                     <td><div class="btn-group" id="">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation" id="AE07">HUAWEI CORE PS<br>AE07</a>
                  
            </div> 
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" id="AD07<">HP<br/><span>AD07</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="AC07">HYTERA <br>AC07</button></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="AB07">AB07</button></td>
                          <td> </td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="AA07">HUAWEI ZENITH SE2600 <br>AA07</button></td>
                         
             
          </tr>
                  
                   <tr>
          <td > </td>
           <td > </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm"   id="ah03">AH03</a>
                  
            </div> 
            </div> 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" id="ag07">CDN TV <br><span>AG07</span></a>
                 
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  id="AF05">AF05</a>
                  
            </div> 
                     </td>
                     <td></td>
                     <td>epc2019 <!--espave reservé--> </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="" id="AD08">HP<br><span>AD08</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YAPI JUDICAEL" id="AC08">E 9000 <br/>AC08</button></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="AB08">AB08</button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="aa08">HUAWEI ZENITH IMS<br> AA08</button></td>
                         
             
          </tr>
                  
                  <tr>
          <td></td>
           <td> </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" >AH04</a>
                 
            </div> 
            </div> 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" >AG08</a>
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <div class="btn-group">
                  <a class="btn btn-primary btn-sm">AF06</a>
                  
            </div> 
                     </td>
                     <td></td>
                     <td>epc2019
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="BONI ROGER  07931085 /DAGOU" id="AD09">SUN ORACLE<br><span>AD09</span></button></td>
                          <td></td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="" id="AC09"> Alcatel  <br>AC09</button></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" id="AB09">AB09</button></td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="AA09">HUAWEI  ZENITH IMS <br>AA09</button></td>
                         
             
          </tr>
                  
                   <tr>
          <td > </td>
           <td > </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" id="ah05">AH05</a>
                 
            </div> 
            </div> 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm" id="ag09">AG09</a>
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                       <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">AF07</a>
                       </div> 
                     </td>
                     <td></td>
                     <td><div class="btn-group" id="">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation" id="AE08">HUAWEI CORE PS<br>AE08</a>
                  
            </div> 
                     </td>
                     <td> </td>
                          <td> <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS  07070023" id="AD10">MEVO <br><span>AD10</span></button></td>
                          <td></td>
                          <td colspan="2" > </td>
                          <td> </td>
                          <td colspan="2" ><button class="btn btn-primary btn-sm" id="AB10">AB10</button></td>
                          <td></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="YEBOUE DARIUS 07070023" id="aa10">  ZENITH UMG8900<br> AA10</button></td>
                             
          </tr>
                  <tr>
          <td > </td>
           <td > </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm">AH06</a>
                 
            </div> 
            </div> 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">AG10</a>
                 
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">DASET <br>AF08</a>
                     </td>
                     <td></td>
                     
                         <td><div class="btn-group" id="">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation" id="ae09">HUAWEI CORE PS<br>AE09</a>
                 
            </div> 
                     </td>
                         
                     <td> </td>
                          <td>  </td>
                          <td></td>
                          <td colspan="2"> </td>
                          <td> </td>
                          <td colspan="2" > </td>
                          <td></td>
                          <td> </td>
                          <td colspan="2" > <button class="btn btn-primary btn-sm" title="(ARTCI)   MANGLE JOSEPH" id="aa11"> LENOVO P147-41-A(CALAO)<br>AA11</button></td>
                         
             
          </tr> 
                  
                   <tr>
          <td > </td>
           <td > </td>
           <td> <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                  <a class="btn btn-primary btn-sm"  id="ah07">ah07</a>
                 
            </div> 
            </div> 
                   </td>
                    <td> </td>
                   <td>
                   <div style="margin:0;" class="btn-toolbar">
                                        
            <div class="btn-group">
                 <!-- <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">ag10</a>-->
                  
            </div> 
            </div> 
                   </td>
             <td></td>
                     <td></td>
                     <td>
                         
                     </td>
                     <td></td>
                     <td>
                         <div class="btn-group" id="ae10">
                  <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#activit" role="presentation">HUAWEI CORE PS<br>AE10</a>
                  
            </div> 
                          
                     </td>
                     <td> </td>
                          <td> </td>
                          <td></td>
                          <td colspan="2" > </td>
                          <td> </td>
                          <td colspan="2" > </td>
                          <td> </td>
                          <td> </td>
                          <td colspan="2" > </td>
                         
             
          </tr>
                 
                 
          </table>

          </div>
					            </div>
					            
					        </div>
					    </div>
					</div><!--fin de ims serveur-->

              <!--salle transmission-->
           <div class="modal fade" id="fluidModel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fluid modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">SALLE TRANSMISSION</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Cartographie en cours...
                                </div>
                                
                            </div>
                        </div>
            </div>
      <!--fin salle tran-->
       


               <!--salle energie-->
                <div class="modal fade" id="fluidModel3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fluid modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">SALLE ENERGIE</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    cartographie en cours...
                                </div>
                                
                            </div>
                        </div>
                </div>
			<!-- #fin# salleModals Size -->


       <!--modal permettant de voir les informations sur les equipements-->
 <div class="modal fade myModal" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content" id="info"> 
              
         

         

           </div>
        </div>
</div>
<!--fin des du modal des information--> 


					<!-- #Start# Modals Position-->
					<!--modal qui montre les impacts ac Top Right  -->
					<div class="modal fade right " id="mTopRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
					            </div>
					            <div class="modal-body " >
					                
					            </div>
					            
					        </div>
					    </div>
					</div> 
					<!-- Top Left  -->
					
					<!-- Bottom Right  -->
					<div class="modal fade right serviceModal" id="mBottomRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					   <div class="modal-dialog  modal-lg modal-side modal-bottom-right" role="document">
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title" id="title-impact"></h4>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
					            </div>
					            <div class="modal-body impacts">
					               
					            </div>
					            
					        </div>
					    </div>
					</div>
					<!-- Bottom Left  -->
										<!-- #End# Scrolling long content -->
                </div><!-- end page content -->
            </div>
            
           
        <!-- end page container -->
        
    <!-- start js include path -->
    <!--<script src="admin/assets/jquery.min.js" ></script>-->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script src="admin/assets/popper/popper.js" ></script>
    <script src="admin/assets/jquery.blockui.min.js" ></script>
  <script src="admin/assets/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="admin/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="admin/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <!-- Common js-->
  <script src="admin/assets/app.js" ></script>
    <script src="admin/assets/layout.js" ></script>
  <script src="admin/assets/theme-color.js" ></script>
  <!-- Material -->
  <script src="admin/assets/material/material.min.js"></script>
    <!-- end js include path -->

    <script src="admin/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="admin/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <!--lightbox jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    <script src="mdl-jquery-modal-dialog.js"></script>
     <script>

 $(document).ready(function(){
var valeur;

            $("#imsserver table .btn").click(function(){
              valeur=$(this).attr("id");
              $("#imsserver table [id]").css("background-color","#1E90FF");
              $(this).css("background-color","#ED7F10");

              $.ajax({
               url:"../controler/equipementControler.php",
               type:"POST",    
               data:{code:valeur, action:"info-equipement"},
               dataType:"html",
               success:function(data){
              
                     $('#info').html(data); 
                     $('#info').css('font-size','1em'); 
                     $('#info').css('font-family','times-roman'); 
                    $("#info img").css("width","80%");
                      $("#info img").css("height","80%");
                    $('.myModal').modal('show');
                    $("a.getService").css("text-decoration","none");  
                    
                    
               }
           });
            });



           $(document).on('click','a.getService',function(){
              var vale=$(this).attr("id");
              //alert(valeur);
              $.ajax({
               url:"../controler/equipementControler.php",
               type:"POST",    
               data:{id:vale, action:"info-service-equipement"},
               dataType:"html",
               success:function(data){
                $("#title-impact").text('Services et clients impactés sur'+' '+$("[id*="+vale+"] span.equipement").text());  
               $(".impacts").html(data);
               $(".serviceModal").modal("show"); 
                   

           /*  showLoading();
        setTimeout(function () {
               

              /*showDialog({
            title: 'Services et clients impactés sur'+' '+$("[id*="+vale+"]  span.equipement").text(),
            text: data,//data represente le message à afficher
           
            positive: {
                title: 'Fermer'
            },
            position: "right-2000 top+10",
            cancelable: false

             });*/

           /* hideLoading();
          }, 500);*/
                

                      
               }
           });
            });
     });
        </script>
   
        


</body>


</html>