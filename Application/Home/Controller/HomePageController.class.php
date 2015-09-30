<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Date;
class HomePageController extends Controller {
    public function showPage(){
        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->order("news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        
        foreach ($allResult as $key=>$val){
            $result1[$allResult[$key]['type_id']][$allResult[$key]['news_id']] = $val;
        }
        $this->assign('result1',$result1);
        
        
        //侧栏显示
        $sql = M('home_page');
        $whereP['type_id'] = 0;
        $allPageResult = $sql->where($where)->order("news_id asc")->select();
        $this->assign('PageResult',$allPageResult);
        
        //分页 list显示
        import("ORG.Util.Page");//导入分页助手类
        $id = intval($_GET['type_id']);
        $sql=M('home_page');
        $whereP['type_id']=$id;
        
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
        foreach ($allPageResult as $key=>$val){
            if($val['news_id']==$id)
                $Type_Title=$val['title'];
        }
         
        $this->assign('Type_Title',$Type_Title);
        $this->assign('show',$show);
        
        $this->display();
    }
    
    
    public function showPageContent(){
        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
    
        foreach ($allResult as $key=>$val){
            $result1[$allResult[$key]['type_id']][$allResult[$key]['news_id']] = $val;
        }
        $this->assign('result1',$result1);
    
    
        //侧栏显示
        $sql = M('home_page');
        $whereP['type_id'] = 0;
        $allPageResult = $sql->where($where)->order("news_id asc")->select();
        $this->assign('PageResult',$allPageResult);
    
        //content显示
        $sql = M('home_page');
        $whereC['type_id'] = intval($_GET['type_id']);
        $whereC['news_id'] = intval($_GET['news_id']);
        $PageContent = $sql->where($whereC)->select();
        //dump($PageContent);
        $this->assign('PageContent',$PageContent[0]);
        
        $this->display();
    }
}