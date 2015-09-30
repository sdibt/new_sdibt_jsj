<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends MainController {
    public function index(){
        //左栏导航
        $sql=M('news_main');
        $where['type_id']=0;
        $result=$sql->where($where)->select();
        $this->assign('result1',$result);
        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result=$sql->where($where)->select();
        $this->assign('result2',$result);

        $this->display();
    }
    public function change(){
        $menu = $_POST['menu'];
        $change = $_POST['change'];
        if($_SESSION[$change]=='+'){
            $_SESSION[$change]='-';
            $_SESSION[$menu]='';
        }else{
            $_SESSION[$change]='+';
            $_SESSION[$menu]='none';
        }
        $this->ajaxReturn($menu);
       //$this->ajaxReturn($_SESSION['menu1']);
    }
}