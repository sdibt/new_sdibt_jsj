<?php

namespace Home\Model;

class MainModel{
    
    public function add($type_id,$title,$content,$time,$count){
        $data= array(
            'type_id' => $type_id,
            'title' => $title,
            'content' => $content,
            'addtime' => $time,
            'count' => $count
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
        if ($type == 0){
            $where1['type_id'] = $id;
            M('news_main') -> where($where1) -> delete();
        } else {
            $where2['type_id'] = $type;
            $where2['count'] = $id;
            M('news_main') -> where($where2) -> delete();
        }
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