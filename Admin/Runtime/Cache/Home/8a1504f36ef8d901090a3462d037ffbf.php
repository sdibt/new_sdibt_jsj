<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理系统</title>


<script type="text/javascript" charset="utf-8" src="/sdibt_jsj/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/sdibt_jsj/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts/bootstrap.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts/jquery-2.1.4.min.js"></script>



<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/backstage.css" />
<!-- <link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/page.css" />
<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/style.css" />



</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h2 class="head_text fr">计算机科学与技术学院后台管理系统</h2>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl">
        <a href="<?php echo U('Home/Admin/index');?>">计科院</a>
        <span>&gt;&gt;</span>欢迎你: <?php echo $_SESSION['username']?>&nbsp;&nbsp;</div>
        <div algin='right'><a href="<?php echo U('Home/Manager/out');?>">退出</a></div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">学院概况</div>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <a href="<?php echo U('Home/Navigation/showAddSurvey');?>"><input type="button" value="添     加" class="add"></a>
                        </div>
                        <div class="fr">
                            
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search">
                            </div>
                        </div>
                    </div>
                    <!--表格-->
              
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">标题</th>
                                <th width="35%">时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <td colspan= "4">
                                <div class = "yahoo2" style="margin-left:60%"><?php echo ($show); ?></div>
                            </td>
                            
                            </tr>
                        
                        </tfoot>
                        <tbody>
                        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo ($res['news_id']); ?></td>
                                <td><?php echo ($res['title']); ?></td>
                                <td><?php echo ($res['addtime']); ?></td>
                                <td align="center">
                                <a href="/sdibt_jsj/admin.php/Home/Navigation/updSurvey/id/<?php echo ($res['news_id']); ?>">
                                <input type="button" value="修改" class="btn"></a>
                                <a href="/sdibt_jsj/admin.php/Home/Navigation/delSurvey/id/<?php echo ($res['news_id']); ?>">
                                <input type="button" value="删除" class="btn"></a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
                         
                        </tbody>
                    </table>
            		     
                </div>
            </div>
        </div>
 
	
    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    } 
        }
    </script>
</body>
</html>