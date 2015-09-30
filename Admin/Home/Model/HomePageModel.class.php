<?php

namespace Home\Model;

class HomePageModel{

    public function add($type_id,$title,$content,$time,$seecount){
        $data= array(
            'type_id' => $type_id,
            'title' => $title,
            'content' => $content,
            'addtime' => $time,
            'seecount' => $seecount
        );
            M('home_page')->add($data);
    }
    public function del($type,$id){

         $id = $_GET['id'];
         $where['type_id'] = $type;
         $where['news_id'] = $id;
         M('home_page')
         ->where($where)
         ->delete();
    }
    public function showUpd($type,$id){
        $where['type_id']=$type;
        $where['news_id']=$id;
        $Surveyinfo = M('home_page')
        ->where($where)
        ->select();
        return $Surveyinfo;
    }
    public function upd($type,$id,$textinfo){  
        $where['type_id']=$type;
        $where['news_id']=$id;
        $sql = M("home_page");      
        $sql->where($where)->save($textinfo);       
    }

}