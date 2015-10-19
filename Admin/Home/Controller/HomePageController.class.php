<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Date;
class HomePageController extends MainController {
    //首页通用类
public  function ruKou(){
        $_SESSION['type_id']=intval($_GET['id']);
        $this->redirect("show");
    }
    public function showAdd(){
        //导航栏
        $sql=M('news_main');
        $id = intval($_SESSION['type_id']);
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);

        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql
                 ->where($where)
                 ->order("news_id asc")
                 ->select();
        $this->assign('result2',$result2);
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $this->display();
    }
     public function show(){
    
        import("ORG.Util.Page");//导入分页助手类
        $id = intval($_SESSION['type_id']);
        $sql=M('home_page');
        $where['type_id']=$id;
    
        $total = $sql->where($where)->count();
        $num_per_page = 10;
        $page = new Page($total,$num_per_page);
         
        $page->setConfig('header','篇文章');
        $show = $page->show();
         
        $result=$sql->where($where)
        ->order('addtime desc')
        ->limit("$page->firstRow,$page->listRows")
        ->select();
        $this->assign('result',$result);
        $this->assign('show',$show);
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
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $cnt=1;
        $this->assign('cnt',$cnt);
        $this->display();
    } 
    public function add(){
    
        header("content-type:text/html;charset=utf-8");
        $type_id = intval($_SESSION['type_id']);
        $title    = htmlspecialchars($_POST['texttitle1']);
        $content  = htmlspecialchars($_POST['content1']);
        if($_POST['date1']=='')
            $time = Date('Y-m-d H:i:s');
        else
            $time = $_POST['date1'];
        $seecount = 0;
        if (empty($title)||empty($content)){
    
            echo "<script>alert('标题或者内容不能为空!');
              location.href='showAdd';</script>";
    
        }else{
    
            D('HomePage')->add($type_id,$title,$content,$time,$seecount);
            echo "<script language='javascript'>\n";
            echo "alert('添加成功');\n";
            echo "location.href='show';\n";
            echo "</script>";
        }
    }
    public function del(){
        header("content-type:text/html;charset=utf-8");
    
        $id = intval($_GET['id']);
        D('HomePage')->del($_SESSION['type_id'],$id);
        $url= U('Home/HomePage/show');
        $this->success('删除成功',$url,5);
    }
    public function upd(){
        $id= intval($_GET['id']);
        $info = D('HomePage')->showUpd($_SESSION['type_id'],$id);
        $this->assign('res',$info[0]);
        
        $sql=M('news_main');
        $id = $_SESSION['type_id'];
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);

        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result2',$result2);
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $this->display();
    }
    public function updJudge(){
        header("content-type:text/html;charset=utf-8");
    
        $id = intval($_POST['id']);
        $time = $_POST['date1'];
        $textinfo['type_id']= $_SESSION['type_id'];
        $textinfo['title']= htmlspecialchars($_POST['texttitle1']);
        $textinfo['content']= htmlspecialchars($_POST['content1']);
        $textinfo['addtime']= $time;
        $textinfo['seecount']= 0;
    
        D('HomePage')->upd($_SESSION['type_id'],$id,$textinfo);
         
        echo "<script>alert('修改成功!');
              location.href='show';</script>";
    }
    

    
public function showAddSet(){
        //导航栏
        $sql=M('news_main');
        $id = intval($_SESSION['type_id']);
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);
    
        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result2',$result2);
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $this->display();
    }
     public function showSet(){
    
        import("ORG.Util.Page");//导入分页助手类
        $sql=M('home_page');
        $where['type_id']=0;
    
        $total = $sql->where($where)->count();
        $num_per_page =10;
        $page = new Page($total,$num_per_page);
         
        $page->setConfig('header','篇文章');
        $show = $page->show();
         
        $result=$sql
        ->where($where)
        ->limit("$page->firstRow,$page->listRows")
        ->order("news_id asc")
        ->select();
        $this->assign('result',$result);
        $this->assign('show',$show);
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
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $this->display();
    } 
    public function addSet(){
    
        header("content-type:text/html;charset=utf-8");
        $type_id = 0;
        $title    = htmlspecialchars($_POST['texttitle1']);
        $time     = Date('Y-m-d H:i:s');
        $seecount = 0;
        if (empty($title)){
    
            echo "<script>alert('标题不能为空!');
              location.href='showAddSet';</script>";
    
        }else{
    
            D('HomePage')->add($type_id,$title,$content,$time,$seecount);
            echo "<script language='javascript'>\n";
            echo "alert('添加成功');\n";
            echo "location.href='showSet';\n";
            echo "</script>";
        }
    }
    public function delSet(){
        header("content-type:text/html;charset=utf-8");
        $id = intval($_GET['id']);
        D('HomePage')->del(0,$id);
        $url= U('Home/HomePage/showSet');
        $this->success('删除成功',$url,5);
    }
    public function updSet(){
        $id= intval($_GET['id']);
        $info = D('HomePage')->showUpd(0,$id);
        $this->assign('res',$info[0]);
        
        $id = $_SESSION['type_id'];
        //左栏导航
        $sql=M('news_main');
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);
        
        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result2',$result2);    
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        
        $this->display();
    }
    public function updSetJudge(){
        header("content-type:text/html;charset=utf-8");
    
        $id = intval($_POST['id']);
        $time = Date('Y-m-d H:i:s');
        $textinfo['type_id']= 0;
        $textinfo['news_id'] = intval($_POST['id1']);
        $textinfo['title']= htmlspecialchars($_POST['texttitle1']);
        $textinfo['addtime']= $time;
        $textinfo['seecount']= 0;
    
        D('HomePage')->upd(0,$id,$textinfo);
         
        echo "<script>alert('修改成功!');
              location.href='showSet';</script>";
    }
    public function showAddPic(){
        //导航栏
        $sql=M('news_main');
        $id = intval($_SESSION['type_id']);
        $where['type_id']=0;
        $result1=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result1',$result1);
    
        //左栏首页
        $sql=M('home_page');
        $where['type_id']=0;
        $result2=$sql->where($where)->order("news_id asc")->select();
        $this->assign('result2',$result2);
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
    
        $this->display();
    }
    public function showPic(){
    
        import("ORG.Util.Page");//导入分页助手类
        $sql=M('showpic');
       // $where['type_id']=0;
    
        $total = $sql->count();
        $num_per_page = 10;
        $page = new Page($total,$num_per_page);
         
        $page->setConfig('header','个图片');
        $show = $page->show();
         
        $result=$sql
        ->limit("$page->firstRow,$page->listRows")
        ->order("id asc")
        ->select();
        foreach ($result as $key=>$val)
        {
            if($result[$key]['isshow']==1){
                $result[$key]['show2']='隐藏';
                $result[$key]['show1']='显示';
            } 
            else{
                $result[$key]['show1']='隐藏';
                $result[$key]['show2']='显示';
            }
        }
       // dump($result);
        $this->assign('result',$result);
        $this->assign('show',$show);
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
        foreach ($result2 as $key=>$val){
            if($result2[$key]['news_id']==$id){
                $til = $val;
            }
        }
        $this->assign('til',$til['title']);
        $cnt=1;
        $this->assign('cnt',$cnt);
        $this->display();
    }
    public function addPic(){
    
        header("content-type:text/html;charset=utf-8");
        $texttitle    = htmlspecialchars($_POST['texttitle']);
        $textcontent  = htmlspecialchars($_POST['textcontent']);
        $myfile = $_FILES['myFile'];
        $isshow  = 1;
        if (empty($texttitle)||empty($textcontent)||empty($myfile)){
    
            echo "<script>alert('内容不能为空!');
              location.href='showAddPic';</script>";
    
        }else{
            
            $allowExt = array('bmp','gif','jpeg','jpg','png') ;
            $myFile = $_FILES['myFile'];
            $tmp_name = $myFile['tmp_name'];
            $name = $myFile['name'];
            $size = $myFile['size'];
            $ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));
            $error = $myFile['error'];
            if($error==0)
            {
                $max_size=2*1024*1024;
                if($size>$max_size){
                    $url= U('Home/HomePage/showAddPic');
                    $this->error('上传文件过大',$url,3);
                }
                if(!in_array($ext, $allowExt)){
                    $url= U('Home/HomePage/showAddPic');
                    $this->error('非法文件类型',$url,3);
                }
                if(!is_uploaded_file($tmp_name)){
                    $url= U('Home/HomePage/showAddPic');
                    $this->error('文件不是通过HTTP POST方式上传',$url,3);
                }
                if(!getimagesize($tmp_name)){
                    $url= U('Home/HomePage/showAddPic');
                    $this->error('不是一个真正的图片类型',$url,3);
                }
                $path = 'showimage';
                if(!file_exists($path)){
                    mkdir($path,0777,true);
                    chmod($path,0777);
                }
                $uniName = substr(md5(uniqid(microtime(true),true)),0,10);
                $basname=substr($name,0,strrpos($name, '.'));
                $uniName=$basname.'_'.$uniName.'.'.$ext;
                $des = $path.'/'.$uniName;
                if(@move_uploaded_file($tmp_name, $des)){
                    $urllink = htmlspecialchars($des);
                    $urllink = mysql_real_escape_string($urllink);
                    	
                    $data= array(
                        'isshow' => $isshow,
                        'title' => $texttitle,
                        'content' => $textcontent,
                        'pic_url' => $urllink,
                    );
                    M('showpic')->add($data);
                    echo "<script language='javascript'>\n";
                    echo "alert('添加成功');\n";
                    echo "location.href='showPic';\n";
                    echo "</script>";
                }
                else{
                    echo "上传失败";
                }
            }
            else
            {
                switch($error)
                {
                    case 1:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('文件超过了上传限制大小',$url,3);
                        break;
                    case 2:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('文件超过了表单上传限制大小',$url,3);
                        break;
                    case 3:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('只有部分文件被上传',$url,3);
                        break;
                    case 4:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('没有文件被上传',$url,3);
                        break;
                    case 6:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('找不到临时文件夹',$url,3);
                        break;
                    case 7:
                    case 8:
                        $url= U('Home/HomePage/showAddPic');
                        $this->error('系统错误',$url,3);
                        break;
                }
                exit(0);
            }
            
        }
    }
    public function delPic(){
        header("content-type:text/html;charset=utf-8");
        $id = intval($_GET['id']);
        $where['id'] = $id;
         M('showpic')
         ->where($where)
         ->delete();
        $url= U('Home/HomePage/showPic');
        $this->success('删除成功',$url,5);
    }
    public function changePic(){
        header("content-type:text/html;charset=utf-8");
        $id = intval($_GET['id']);
        $where['id'] = $id;
        $result=M('showpic')
        ->where($where)
        ->select();
        if($result[0]['isshow']==1){
            $result[0]['isshow']=0;
        }else {
            $result[0]['isshow']=1;
        }
        M('showpic')
        ->where($where)
        ->save($result[0]);
        $this->redirect('HomePage/showPic');
    }
}



