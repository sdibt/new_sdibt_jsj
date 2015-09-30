<?php
namespace Home\Controller;
use Think\Controller;

class MainController extends Controller {
	public function _initialize(){
	      if(cookie('username')){
	         $_SESSION['username'] = $_COOKIE['username'];
	     } 
		 if(!session('username'))
			$this->error('Please Login First!',$this->redirect('Login/index'),5); 
	}
}
?>