<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Date;
class HomePageController extends Controller {
    public function showPage(){
        //导航栏标题的平均分配
        $sql = M('news_main');
        $where['type_id'] = 0;
        $count = $sql -> where($where) -> count();
        $this->assign('count',$count);

        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->order("type_id,news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        $type = 0;
        $cas = 0;
        foreach ($allResult as $key=>$val){
            if ($allResult[$key]['type_id']!=$type){
                $type = $allResult[$key]['type_id'];
                $cas = 0;
            }
            if($allResult[$key]['count']==0)
                $result1[$allResult[$key]['type_id']][$cas++] = $val;
        }
        $this->assign('result1',$result1);
        
        
        //侧栏显示
        $sql = M('home_page');
        $whereP['type_id'] = 0;
        $whereP['news_id'] = array(neq,3);
        $allPageResult = $sql->where($whereP)->order("news_id asc")->select();
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
        //导航栏标题的平均分配
        $sql = M('news_main');
        $where['type_id'] = 0;
        $count = $sql -> where($where) -> count();
        $this->assign('count',$count);

        //导航栏的显示
        $sql = M('news_main');
        $allResult = $sql->order("type_id,news_id asc")->select();
        $where['type_id'] = 0;
        $result = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result',$result);
        $type = 0;
        $cas = 0;
        foreach ($allResult as $key=>$val){
            if ($allResult[$key]['type_id']!=$type){
                $type = $allResult[$key]['type_id'];
                $cas = 0;
            }
            if($allResult[$key]['count']==0)
                $result1[$allResult[$key]['type_id']][$cas++] = $val;
        }
        $this->assign('result1',$result1);
    
    
        //侧栏显示
        $sql = M('home_page');
        $whereP['type_id'] = 0;
        $whereP['news_id'] = array(neq,3);
        $allPageResult = $sql->where($whereP)->order("news_id asc")->select();
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