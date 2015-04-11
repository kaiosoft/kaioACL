<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">

<title><?=$app_name;?> - Login</title>
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

<!-- Theme  -->
<link rel="stylesheet" href="<?= base_url(); ?>application/views/templates/default/css/blue.css" type="text/css" media="screen" title="default" />

<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
<script src="<?= base_url(); ?>application/views/templates/default/js/jquery/modernizr-1.5.js" type="text/javascript"></script>
</head>

<!--[if IE 7 ]>    <body class="ie7 login"> <![endif]-->
<!--[if IE 8 ]>    <body class="ie8 login"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="login">
<!--<![endif]-->

  <div class="box-header">
    <h2>Admin Login</h2>
  </div>
  <div class="box">
  
  	<?php 
		// set message jika tdk bisa login
		if($this->session->flashdata('msg')){
			echo $this->session->flashdata('msg');
		}
		
		echo form_open('auth/login','name="formLogin" class="form col"');
	?>
      <p>
        <label class="strong" for="Username">Name:</label>
        <?php echo form_input('data[username]','','tabindex="1" id="username" title="Please enter your Username."'); ?>
      </p>
      <p>
        <label class="strong" for="Password">Password:</label>
		<?php echo form_password('data[password]','','tabindex="2" id="password" title="Please enter your password."'); ?>
      </p>
      <p class="no-margin">
        <label for="RememberMe">
          <input id="RememberMe" type="checkbox">
          Remember Me?</label>
        <button type="submit" class="small fr">Login</button>
        <br class="cl" />
      </p>
    <?php echo form_close(); ?>
    <form method="post" class="form" action="">
      <fieldset class="grey collapsed no-margin">
        <legend><a href="#">Forgot Password?</a></legend>
        <p>
          <label for="Email">Enter your e-mail address:</label>
          <input class="fl" id="Email" type="text" name="Email" />
          <button type="button" class="small fr">Send</button>
        </p>
      </fieldset>
    </form>
  </div>

<!-- Javascript at the bottom for fast page loading --> 

<!-- Javascript at the bottom for fast page loading --> 
<script type="text/javascript" src="http://www.google.com/jsapi"></script> 
<!-- Grab Google CDN's jQuery + jQuery UI. fall back to local if necessary --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script>!window.jQuery && document.write('<script src="js/jquery-1.4.2.min.js"><\/script>')</script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script> 
<script>!window.jQuery && document.write('<?= base_url(); ?>application/views/templates/default/js/jquery-ui-1.8.1.min.js"><\/script>')</script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.treeview.min.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.cookie.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.lightbox-0.5.min.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/jquery.wysiwyg.js"></script> 
<script type="text/javascript" src="<?= base_url(); ?>application/views/templates/default/js/functions.js"></script> 
<!--[if lt IE 7 ]>
    <script src="js/dd_belatedpng.js"></script>
  <![endif]-->

</body>
</html>
