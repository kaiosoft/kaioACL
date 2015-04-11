<?php 

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2012
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if($this->session->flashdata('msg')){
	echo $this->session->flashdata('msg');
}
?>
<fieldset>
<p class="inline">
Kaio ACL di kembangakn dari framework Code Igniter versi 2.13. Di buat dengan tujuan untuk memudahkan dan memangkas waktu pembuatan aplikasi.
</p>
<p class="inline">
Master data :
<ul>
<li>User</li>
<li>Rules</li>
<li>Group Rules</li>
<li>Hak Akses</li>
<li>Setting</li>
</ul>
<p></p>
Versi : 1.1.2<br>
Tgl Rilis : Mei 2013<br>
Change Log 1.1.2 :
<ul>
<li>Penambahan template manager (proses)</li>
<li>Bug fixing pagination (proses)</li>
</ul>
<p></p>
Versi : 1.1.1<br>
Tgl Rilis : April 2013<br>
Change Log 1.1.1 :
<ul>
<li>Bug Fixing untuk Edit username</li>
<li>Penambahan sistem validasi password dan repassword</li>
</ul>
</p>
</fieldset>






Page rendered in <strong>{elapsed_time}</strong> seconds	
</form>
<?php
/* End of file friend.php */
/* Location: ./application/views/friend.php */
