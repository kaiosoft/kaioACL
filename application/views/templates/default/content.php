<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

<div id="page-header">
	<h1><?= $subtitle; ?></h1>
</div>

<?php $this->load->view($file, $results); ?>
		