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
        <span>&gt;&gt;</span>欢迎你: <?php echo $_SESSION['username']?></div>
        <div class="link fr">
            <a href="<?php echo U('Home/Admin/index');?>" class="icon icon_i">首页</a>
            <span></span><a href="#" class="icon icon_j">前进</a>
            <span></span><a href="#" class="icon icon_t">后退</a>
            <span></span><a href="#" class="icon icon_n">刷新</a>
            <span></span><a href="#" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">党建与工会</div>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <a href="<?php echo U('Home/Navigation/showAddLabor');?>"><input type="button" value="添     加" class="add"></a>
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
                                <a href="/sdibt_jsj/admin.php/Home/Navigation/updLabor/id/<?php echo ($res['news_id']); ?>">
                                <input type="button" value="修改" class="btn"></a>
                                <a href="/sdibt_jsj/admin.php/Home/Navigation/delLabor/id/<?php echo ($res['news_id']); ?>">
                                <input type="button" value="删除" class="btn"></a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
                         
                        </tbody>
                    </table>
            		     
                </div>
            </div>
        </div>
 <!--左侧列表-->
        <div class="menu" style="height:570px">
        
            <div class="cont">
                <div class="title">管理员</div>

                <ul class="mList">
                    <li>
                        <h3 style="color:#fff"><span onclick="show('menu1','change1')" id="change1" style="color:#fff">+</span>导航栏的设置</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="<?php echo U('Home/Navigation/showSurvey');?>" >学院概况</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showScience');?>" >科学研究</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showEducation');?>" >研究生教育</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showCourse');?>" >重点科学与精品课程</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showJob');?>" >招生就业</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showLabor');?>" >党建与工会</a></dd>
                            <dd><a href="<?php echo U('Home/Navigation/showWork');?>" >学生作品</a></dd>
                        </dl>
                    </li>
                    
                    <li>
                        <h3 style="color:#fff"><span onclick="show('menu2','change2')" id="change2" style="color:#fff">+</span>首页信息管理</h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="<?php echo U('Home/HomePage/showNews');?>">学院新闻</a></dd>
                            <dd><a href="<?php echo U('Home/HomePage/showScientific');?>">教学科研</a></dd>
                            <dd><a href="<?php echo U('Home/HomePage/showStuJob');?>">学生工作</a></dd>
                            <dd><a href="<?php echo U('Home/HomePage/showHiring');?>">企业招聘</a></dd>
                            <dd><a href="<?php echo U('Home/HomePage/showNotice');?>">学院通知</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3 style="color:#fff"><span onclick="show('menu3','change3')" id="change3" style="color:#fff">+</span>管理员信息管理</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="#" target="mainFrame">密码修改</a></dd>
                        </dl>
                    </li>

                </ul>
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