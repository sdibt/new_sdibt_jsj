<?php
namespace Home\Controller;
use Think\Controller;
class ManagerController extends MainController {
    public function out(){
        unset($_SESSION['username']);
        $this->display("Login:index");
    }
    public function showUpdPassword(){
        //导航栏
        $sql=M('news_main');
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);
        
        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result2',$result2);
        $this->display();
    }
    
    public function doUpdPassword(){
        header("content-type:text/html;charset=utf-8");
        
        $oldpassword = md5($_POST['oldPassword']);
        $newpassword = md5($_POST['newPassword']);
        $newpasswordq = md5($_POST['newPasswordq']);
        
        $where['username'] = $_SESSION['username'];
        $where['password'] = $oldpassword;
        $result = M('user')->where($where)->find();
        if ($result){
            if ($newpassword != $newpasswordq)
            {
                echo "<script>alert('两次密码输入不一致!');
              location.href='showUpdPassword';</script>";
            }else {
                $id = $result['id'];
                $where['password'] = $newpassword;
                 M('user')->where("id = $id")->save($where); 
                echo "<script>alert('修改成功!');
              location.href='showUpdPassword';</script>";
            }
                
        }else{
            echo "<script>alert('原始密码输入错误!');
              location.href='showUpdPassword';</script>";
        }
    }
}