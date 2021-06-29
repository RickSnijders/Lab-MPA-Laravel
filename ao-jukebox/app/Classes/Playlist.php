<?php 
	
	namespace App\Classes;
	
	class Playlist{
 		public function __construct() {
        	return "construct function was initialized.";
    	}

    	public function addtoqueue($song){
			echo "dit is een test";
			if (session('songqueue') == null){
				session()->put('songqueue', []);
				session()->push('songqueue', $song);
			} else {
				session()->push('songqueue', $song);
			}
    	}
	}