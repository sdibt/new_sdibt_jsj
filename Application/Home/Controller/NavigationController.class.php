<?php
namespace Home\Controller;
use Think\Controller;
class NavigationController extends Controller {
    public function showNav(){
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
        
        //侧栏标题的显示
        $where['type_id'] =0;
        $where['news_id'] =intval($_GET['type_id']);
        $Title1 = $sql->where($where)->order("news_id asc")->select();
        $this->assign('Title1',$Title1[0]);
        $where1['type_id'] =intval($_GET['type_id']);
        $Title = $sql->where($where1)->order("news_id asc")->select();
        $this->assign('Title',$Title);
        
        $where1['type_id'] =intval($_GET['type_id']);
        $where1['news_id'] =intval($_GET['news_id']);
        $Con = $sql->where($where1)->select();
        $this->assign('Con',$Con[0]);

        $this->display();
    }
}