<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $_SESSION['change1'] = '+';
        $_SESSION['change2'] = '+';
        $_SESSION['change3'] = '+';
        $_SESSION['menu1'] = 'none';
        $_SESSION['menu2'] = 'none';
        $_SESSION['menu3'] = 'none';
        if(cookie('username')||session('username'))
            $this->redirect('Admin/index');
        else
            $this->display("Login:index");
    }
}