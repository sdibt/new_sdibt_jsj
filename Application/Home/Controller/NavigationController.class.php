<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class NavigationController extends Controller {
    public function showNav(){
        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->order("news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        
        foreach ($allResult as $key=>$val){
            if($allResult[$key]['count']==0)
            $result1[$allResult[$key]['type_id']][$allResult[$key]['news_id']] = $val;
        }
        $this->assign('result1',$result1);
        
        //侧栏标题的显示
        $where['type_id'] =0;
        $where['news_id'] =intval($_GET['type_id']);
        $Title1 = $sql->where($where)->order("news_id asc")->select();
        $this->assign('Title1',$Title1[0]);
        $where2['type_id'] =intval($_GET['type_id']);
        $where2['count'] =0;
        $Title = $sql->where($where2)->order("news_id asc")->select();
        $this->assign('Title',$Title);
        
        $where1['type_id'] =intval($_GET['type_id']);
        $where1['count'] =intval($_GET['news_id']);
        $Con = $sql->where($where1)->select();
        if(empty($Con)){
            $where['type_id'] =intval($_GET['type_id']);
            $where['news_id'] =intval($_GET['news_id']);
            $Con = $sql->where($where)->select();
            $this->assign('Con',$Con[0]);
            $this->display();
        }else{
            $type_id = intval($_GET['type_id']);
            $count = intval($_GET['news_id']);
            $_SESSION['Type_id'] = intval($_GET['type_id']);
            $_SESSION['News_id'] = intval($_GET['news_id']);
            $title = $sql->where($where)->select();
            $_SESSION['Type_Title'] = $title[0]['title'];
            $where['type_id'] =intval($_GET['type_id']);
            $where['news_id'] =intval($_GET['news_id']);
            $title = $sql->where($where)->select();
            $_SESSION['Type_Title1'] = $title[0]['title'];
            $this->redirect('showNavSome');
        }
    }
    
    public function showNavSome(){
        $type_id = $_SESSION['Type_id'];
        $count = $_SESSION['News_id'];
        $Type_Title = $_SESSION['Type_Title'];
        $Type_Title1 = $_SESSION['Type_Title1'];
        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->order("news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        
        foreach ($allResult as $key=>$val){
            if($allResult[$key]['count']==0)
            $result1[$allResult[$key]['type_id']][$allResult[$key]['news_id']] = $val;
        }
        $this->assign('result1',$result1);
        
        
        //侧栏标题的显示
        $where['type_id'] =0;
        $where['news_id'] =$type_id;
        $Title1 = $sql->where($where)->order("news_id asc")->select();
        $this->assign('Title1',$Title1[0]);
        $where2['type_id'] =$type_id;
        $where2['count'] =0;
        $Title = $sql->where($where2)->order("news_id asc")->select();
        $this->assign('Title',$Title);
        
        //分页 list显示
        import("ORG.Util.Page");//导入分页助手类
        $id = $type_id;
        $sql=M('news_main');
        $whereP['type_id']=$id;
        $whereP['count']=$count;
        
        $total = $sql->where($whereP)->count();
        $num_per_page = 10;
        $page = new Page($total,$num_per_page);
         
        $page->setConfig('header','篇文章');
        $show = $page->show();
         
        $PageContent=$sql
        ->where($whereP)
        ->limit("$page->firstRow,$page->listRows")
        ->order("addtime desc")
        ->select();
        $this->assign('Pagecontent',$PageContent);

        $this->assign('Type_Title',$Type_Title);
        $this->assign('Type_Title1',$Type_Title1);
        $this->assign('show',$show);
        
        $this->display(); 
    }
    
    public function showNavSomeContent(){
        $sql = M('news_main');
        $allResult = $sql->order("news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        
        foreach ($allResult as $key=>$val){
            if($allResult[$key]['count']==0)
                $result1[$allResult[$key]['type_id']][$allResult[$key]['news_id']] = $val;
        }
        $this->assign('result1',$result1);
        
        $where['type_id'] =0;
        $where['news_id'] =intval($_GET['type_id']);
        $Title1 = $sql->where($where)->order("news_id asc")->select();
        $this->assign('Title1',$Title1[0]);
        $where2['type_id'] =intval($_GET['type_id']);
        $where2['count'] =0;
        $Title = $sql->where($where2)->order("news_id asc")->select();
        $this->assign('Title',$Title);
        
        //content显示
        $sql = M('news_main');
        $whereC['type_id'] = intval($_GET['type_id']);
        $whereC['news_id'] = intval($_GET['news_id']);
        $PageContent = $sql->where($whereC)->select();
        $this->assign('PageContent',$PageContent[0]);
        $this->display();
    }
}