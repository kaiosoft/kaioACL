<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : kaiosoftware@gmail.com
 *	Date: Juni 2013
**/
 
if ( ! function_exists('waktu'))
{
	/* 
	*
	*  convert format waktu dari format english ke indo (default) atau sebaliknya
	*  param $datestr = tgl 
	*  param $str_in = pemisah saat masuk default (-)
	*  param $str_out = pemisah saat keluar default (-)
	*  param $frm_in = format saat masuk (english default)
	*  param $frm_out = format saat keluar (indo default)
	*
	*/
	

	function waktu($datestr='', $frm_in='eng', $frm_out='indo', $spr_in = '-', $spr_out='-', $time='N'){
		// validasi tgl 
		if ($datestr == ''){
			$datestr = 'Tgl tidak di definisikan !';
		} else {
			// cek format tgl yg masuk
			if($frm_in=='eng' AND $frm_out=='indo'){
				$tgl = substr($datestr,8,2);
				$bln = substr($datestr,5,2);
				$thn = substr($datestr,0,4);

				$waktu = '';
				
				if($time=='Y'){
					$waktu = substr($datestr,-8);
				} 
				
				$datestr = $tgl."-".$bln."-".$thn." ".$waktu;
				
			} else if($frm_in=='eng' AND $frm_out=='eng'){
				$datestr = 'Tgl masuk dan tgl keluar dalam format yg sama !';
				
			} else if($frm_in=='indo' AND $frm_out=='eng'){
				$tgl = substr($datestr,0,2);
				$bln = substr($datestr,3,2);
				$thn = substr($datestr,6,4);

				$waktu = '';
				
				if($time=='Y'){
					$waktu = substr($datestr,-8);
				} 
				
				$datestr = $thn."-".$bln."-".$tgl." ".$waktu;;
			
			} else if($frm_in=='indo' AND $frm_out=='indo'){
				$datestr = 'Tgl masuk dan tgl keluar dalam format yg sama !';
			}
			
			// cek pemisah
			$datestr = str_replace($spr_in,$spr_out,$datestr);
		}
		
		return $datestr;
	}
}

if ( ! function_exists('semester')){
	
	/* untuk menentukan periode semester dalam setiap tahun */
	
	function semester($bln){

		if ($bln == '')
		{
			return FALSE;
		}
		
		if($bln < 7){
			$sms = 1;
		} else if($bln > 6){
			$sms = 2;
		}
		return $sms;
	}
}

if ( ! function_exists('hitung_umur'))
{
	/*
	*	$tgl_lahir = tgl kelahiran dgn forma 'Y-m-d'
	*/
	
	function hitung_umur($tgl_lahir){
		$date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
		$date2 = new DateTime(date('Y-m-d'));
		$interval = $date1->diff($date2);
		
		return $interval->y . " thn, " . $interval->m." bln, ".$interval->d." hari ";
	}
}

/***** Next : Konversi jam dalam format english ke format indonesia ******/
/*				example : 9 PM menjadi 21.00 							 */ 


if ( ! function_exists('hari')){

	/* konversi hari dari format english ke format indo */
	
	function hari($tgl){
        $sepparator = '-'; //separator. contoh: '-', '/'
        $parts = explode($sepparator, $tgl);
        $d = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
 
        if ($d=='Monday'){
            return 'Senin';
        }elseif($d=='Tuesday'){
            return 'Selasa';
        }elseif($d=='Wednesday'){
            return 'Rabu';
        }elseif($d=='Thursday'){
            return 'Kamis';
        }elseif($d=='Friday'){
            return 'Jumat';
        }elseif($d=='Saturday'){
            return 'Sabtu';
        }elseif($d=='Sunday'){
            return 'Minggu';
        }else{
            return 'ERROR!';
        }
    }
}

if ( ! function_exists('bulan'))
{
	/* konversi bulan dari format english ke format indo */
	
	function bulan($bln){
		switch($bln){
			case "1":
				$res = "Januari";
				break;
			case "2":
				$res = "Februari";
				break;			
			case "3":
				$res = "Maret";
				break;	
			case "4":
				$res = "April";
				break;		
			case "5":
				$res = "Mei";
				break;	
			case "6":
				$res = "Juni";
				break;	
			case "7":
				$res = "Juli";
				break;	
			case "8":
				$res = "Agustus";
				break;	
			case "9":
				$res = "September";
				break;	
			case "10":
				$res = "Oktober";
				break;	
			case "11":
				$res = "November";
				break;	
			case "12":
				$res = "Desember";
				break;					
		}
		
		return $res;
	}
}

if (!function_exists('selisih_jam')) 
{ 
	/*
	*	selisih antara jam masuk dan jam keluar
	*	jam_keluar > jam_masuk
	*	Kontributor : Anri Riantana
	*/
	
	function selisih_jam($jam_masuk,$jam_keluar) {
		list($h,$m,$s) = explode(":",$jam_masuk);
		$dtAwal = mktime($h,$m,$s,"1","1","1");
		list($h,$m,$s) = explode(":",$jam_keluar);
		$dtAkhir = mktime($h,$m,$s,"1","1","1");
		$dtSelisih = $dtAkhir-$dtAwal;
		$totalmenit=$dtSelisih/60;
		$jam =explode(".",$totalmenit/60);
		$sisamenit=($totalmenit/60)-$jam[0];
		$sisamenit2=$sisamenit*60;
		$jml_jam=$jam[0];
		
		return $jml_jam." jam ".$sisamenit2." menit";
	}
}

/*	
* 	selisih waktu antara tgl2 dgn tgl1 
*	tgl2 > tgl1
*	
*/

if (!function_exists('selisih_tgl')) 
{
	function selisih_tgl($tgl2,$tgl1){
		$tgl1 = new DateTime(date('Y-m-d', strtotime($tgl1)));
		$tgl2 = new DateTime(date('Y-m-d', strtotime($tgl2)));
		$interval = $tgl1->diff($tgl2);	

		return $interval;
	}
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */
