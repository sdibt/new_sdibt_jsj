<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller {
    
    public function verify(){
        $config =    array(
            'fontSize'    =>    20,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        
        $Verify =new \Think\Verify($config);
        $Verify->codeSet = '0123456789';
        $Verify->entry();
    }
    public function index(){
        $this->display();
    }

    public function do_login(){
          header("content-type:text/html;charset=utf-8"); 
            // 获取用户名和密码 和数据库中比对，有该用户允许登陆否则输出错误
            // 检查验证码  
            $verify=intval($_POST['verify']);
            $id='';
            if(!check_verify($verify,$id)){   
              echo "<script>alert('验证码错误!');
                    location.href='index';</script>";            
            }
            else{
                
                $username = htmlspecialchars($_POST['username']);
                $password = md5(htmlspecialchars($_POST['password']));
/*                 dump($username);
                dump($password);
                dump($_POST['checkbox']); */
                $where['username'] = $username;
                $where['password'] = $password;
                $cnt = M('user')->where($where)->count();
                if($cnt>0)
                {               
                    $_SESSION['username'] = $username;
                    if ($_POST['checkbox']=='on'){
                        cookie('username',$username,7*24*3600);
                    }
                    $this->redirect('Admin/index');
                }
                else{
                    echo "<script language='javascript'>\n";
                    echo "alert('用户名或密码错误');\n";
                    echo "location.href='javascript:history.go(-1)';\n";
                    echo "</script>";
                    exit(0);
                }
            }
 
    }
}