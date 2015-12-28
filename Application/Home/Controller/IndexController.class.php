<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //导航栏标题的平均分配
        $sql = M('news_main');
        $where['type_id'] = 0;
        $count = $sql -> where($where) -> count();
        $this->assign('count',$count);

        //导航栏
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
        
        //首页信息
        //学院新闻
        $sql = M('home_page');
        $where['type_id'] = 1;
        $result2 = $sql->where($where)->order('addtime desc')->select();
        $cnt=0;
        $p='/img.*alt.*?g&quot;/';
        foreach ($result2 as $val){
            $subres[$cnt]=$val;
            $str = $val['content'];
            preg_match($p,$str,$matches);
            $str = preg_replace($p, '', $str);
            $subres[$cnt]['content'] = $str;
            $cnt++;
            if($cnt==7)
                break;
        }
        $this->assign('result2',$subres);
           
        //学院通知
        $where['type_id'] = 2;
        $result5 = $sql->where($where)->order('addtime desc')->select();
        $cnt=0;
        $p='/img.*alt.*?g&quot;/';
        foreach ($result5 as $val){
            $Result5[$cnt]=$val;
            $cnt++;
            if($cnt==7)
                break;
        }
        $this->assign('result5',$Result5);
        
        //三个小的模块显示
        $where['type_id'] = array(gt,1);
        $allResult1 = $sql->where($where)->order('addtime desc')->select();
        foreach ($allResult1 as $key=>$val){
            if(count($result3[$allResult1[$key]['type_id']])<5)
                $result3[$allResult1[$key]['type_id']][$allResult1[$key]['news_id']] = $val;
        }
        $this->assign('result3',$result3);
        $where['type_id'] = 0;
        $where['news_id'] = array(gt,2);
        $result4 = $sql->where($where)->order("news_id asc")->select();
        $this->assign('result4',$result4);
        //showpic
        
        $where['isshow']=1;
        $result=M('showpic')->where($where)->select();
        $this->assign('pic',$result);
        
        $this->display();
    }
}