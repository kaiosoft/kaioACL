<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">

<title><?=$title;?></title>
<meta name="description" content="">
<meta name="author" content="">
<!-- Make sure the latest version of IE is used -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- Place favicon.ico and apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- CSS - Setup -->
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/style.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/grid.css" type="text/css" media="screen" title="default" />
<!-- CSS - Styles -->
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/base.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/forms.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/lists.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/calendar.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/extensions.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/visualize.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/js/themes/base/jquery.ui.all.css" type="text/css" media="screen" title="default" />

<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
<script src="<?= base_url(); ?>application/views/templates/default/js/modernizr-1.5.min.js" type="text/javascript"></script>

<!-- Javascript at the bottom for fast page loading --> 
<script type="text/javascript" src="http://www.google.com/jsapi"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/external/jquery.bgiframe-2.1.2.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.core.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.widget.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.mouse.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.button.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.draggable.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.position.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.resizable.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.dialog.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.effect.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.menu.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/ui/jquery.ui.autocomplete.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.MultiFile.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.treeview.min.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.cookie.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.lightbox-0.5.min.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.wysiwyg.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.validate.js"></script>
</head>

<body class="sidebar-left chart">
<!-- load header --->
<?php $this->load->view('templates/default/header'); ?>

<div id="page">

<aside>
         
<ul id="sidebar-nav">
<li><a href="<?=base_url();?>index.php/dashboard">Dashboard</a></li>
<li><a href="#">Master Data</a>
<ul class="drop" >
<li><a href="<?=base_url();?>index.php/produk"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/page.png">Produk</a></li>
<li><a href="<?=base_url();?>index.php/customer"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/page.png">Customer</a></li>
<li><a href="<?=base_url();?>index.php/developer"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/page.png">Developer</a></li>
<li><a href="<?=base_url();?>index.php/agent"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/page.png">Agent</a></li>
<li><a href="<?=base_url();?>index.php/komisi"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/page.png">Komisi</a></li>

</ul>
</li>
<?php
	
	if($this->session->userdata('group_id')=='11890083' OR  $this->session->userdata('group_id')=='11890091'){ ?>
<li><a href="#">System</a>
<ul class="drop">
  <li><a href="<?=base_url();?>index.php/user"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/user.png">Manage Users</a></li>
<li><a href="<?=base_url();?>index.php/rule"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/user_add.png">Rules</a></li>
<li><a href="<?=base_url();?>index.php/grouprule"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/user_edit.png">Group Rules</a></li>
<li><a href="<?=base_url();?>index.php/hakakses"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/user_delete.png">Hak Akses</a></li>
<li><a href="<?=base_url();?>index.php/config/edit"><img src="<?=base_url();?>application/views/templates/default/img/icons/16/user_delete.png">Setting</a></li>
</ul>
</li>
<?php
	} 
?>
</ul>
<br /> <br /> 

</aside>


<div id="page-content" class="container_12"> 
<a href="#" id="close_sidebar" class="tooltip east" title="Close Sidebar"> Close Sidebar </a>
<a href="#" id="open_sidebar" class="tooltip east" title="Open Sidebar">Open Sidebar</a>

	  <!-- load content --->
	  <?php $this->load->view('templates/default/content'); ?>
        <br class="cl">
</div>

<!-- Start Footer -->
<!-- load footer --->
<?php $this->load->view('templates/default/footer'); ?>
<!-- End Footer -->


<!-- Page specific Javascript --> 

<script src="<?= base_url(); ?>application/views/templates/default/js/functions.js" type="text/javascript"></script>
<!--[if lt IE 7 ]>
    <script src="js/dd_belatedpng.js"></script>
  <![endif]--> 

</body>
</html>
