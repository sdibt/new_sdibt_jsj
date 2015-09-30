<?php

namespace Home\Model;

class MainModel{
    
    public function add($type_id,$title,$content,$time,$seecount){
        $data= array(
            'type_id' => $type_id,
            'title' => $title,
            'content' => $content,
            'addtime' => $time,
            'seecount' => $seecount
        );
            M('news_main')->add($data);
    }
    public function del($type,$id){

         $id = $_GET['id'];
         $where['type_id'] = $type;
         $where['news_id'] = $id;
         M('news_main')
         ->where($where)
         ->delete();
    }
    public function showUpd($type,$id){
        $where['type_id']=$type;
        $where['news_id']=$id;
        $Surveyinfo = M('news_main')
        ->where($where)
        ->select();
        return $Surveyinfo;
    }
    public function upd($type,$id,$textinfo){  
        $where['type_id']=$type;
        $where['news_id']=$id;
        $sql = M("news_main");      
        $sql->where($where)->save($textinfo);       
    }

}