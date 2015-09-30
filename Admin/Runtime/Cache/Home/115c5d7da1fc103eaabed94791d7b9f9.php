<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理系统</title>


<script type="text/javascript" charset="utf-8" src="/sdibt_jsj/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/sdibt_jsj/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts/bootstrap.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/My97DatePicker/WdatePicker.js"></script>



<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/backstage.css" />
<!-- <link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/page.css" />
<link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/style.css" />



</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h2 class="head_text fr" style="margin:0 0 10px 0">计算机科学与技术学院后台管理系统</h2>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl">
        <a href="<?php echo U('Home/Admin/index');?>"><b>计科院</b></a>
        <span style="color:#000">&gt;&gt;</span>欢迎你: <?php echo $_SESSION['username']?>&nbsp;&nbsp;&nbsp;</div>
        <div <a href="<?php echo U('Home/Manager/out');?>"><b >退出</b></a>
             <a href="/sdibt_jsj/index.php" target="_Blank" style="float:right;margin:-5px -320px 0 0;font-size:15px;color:#000">学院首页&raquo;</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            
            <div class="cont">
                <div class="title"><?php echo ($til); ?>的修改&raquo;</div>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <a href="<?php echo U('Home/HomePage/showAdd');?>"><input type="button" value="添     加" class="add"></a>
                        </div>
                    </div>
                    <!--表格-->
              <section class="column width6 first" style="margin-left:200px;">					
					<h3>Add new Text</h3>	
					<form id="sampleform" method="post" action="<?php echo U('Home/HomePage/updJudge');?>">
						<fieldset>
							<legend>Text info</legend>

							<p>
								<label class="required" for="title">标题</label><br/>
								<input type="text"  class="title1" value="<?php echo ($res['title']); ?>" name="texttitle1" style="height:20px;color:#000"/>
								<small>e.g. 学院简介</small>
							</p>
							<p>
								<label class="required" for="title">发布时间</label><br/>
								<input name="date1" class="Wdate" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',readOnly:true})" value="<?php echo ($res['addtime']); ?>"/>
							</p>
							<p>
								<label for="textdesc">Describe your Text</label><br/>
								<textarea  class="large full" id="editor" name="content1" style="height:260px"><?php echo ($res['content']); ?></textarea>
								 <script type="text/javascript">
    								//实例化编辑器
   									 //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  								  var ue = UE.getEditor('editor');
    							</script>
							</p>		
							<p class="box"><input type="submit" class="btn btn-green big" value="Save"/> or 
										   <input type="reset" class="btn btn-green big" value="resetting"/>
										   <input type="hidden" name="id" value="<?php echo ($res['news_id']); ?>"/></p>
						</fieldset>
					</form>
				</section>
             
                    
            		     
                </div>
            </div>
        </div>
 
	<!--左侧列表-->
        <div class="menu" style="height:570px">
            <div class="cont">
                <div class="title">管理员</div>

                <ul class="mList">
                    <li>
                        <h3 style="color:#fff"><span onclick="show()" id="change1" style="color:#fff"><?php echo ($_SESSION['change1']); ?></span>导航栏的信息管理</h3>
                        <dl id="menu1" style="display:<?php echo ($_SESSION['menu1']); ?>;">
                        <?php if(is_array($result1)): $i = 0; $__LIST__ = $result1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><dd><a href="/sdibt_jsj/admin.php/Home/Navigation/ruKou/id/<?php echo ($res['news_id']); ?>"><?php echo ($res['title']); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        <dd><a href="<?php echo U('Home/Navigation/showSet');?>">导航设置</a></dd>
                        </dl>
                    </li>
                    
                    <li>
                        <h3 style="color:#fff"><span onclick="show()" id="change2" style="color:#fff"><?php echo ($_SESSION['change2']); ?></span>首页信息管理</h3>
                        <dl id="menu2" style="display:<?php echo ($_SESSION['menu2']); ?>;">
                            <?php if(is_array($result2)): $i = 0; $__LIST__ = $result2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><dd><a href="/sdibt_jsj/admin.php/Home/HomePage/ruKou/id/<?php echo ($res['news_id']); ?>"><?php echo ($res['title']); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                        <dd><a href="<?php echo U('Home/HomePage/showSet');?>">首页设置</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3 style="color:#fff"><span onclick="show()" id="change3" style="color:#fff"><?php echo ($_SESSION['change3']); ?></span>管理员信息管理</h3>
                        <dl id="menu3" style="display:<?php echo ($_SESSION['menu3']); ?>;">
                            <dd><a href="<?php echo U('Home/Manager/showUpdPassword');?>">密码修改</a></dd>
                        </dl>
                    </li>

                </ul>
            </div>
        </div>
    </div>
   <!--  <script type="text/javascript">
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
    </script> -->
    <script>
        $(function show() {
           //POST 
            $("#change1").click(function () {
                $.post("<?php echo U('Home/Admin/change');?>", {menu:"menu1",change:"change1"}, function (data) {
                	 /* alert(data);
                	$("#change1").empty().html(data);  */
                	location.reload();
                });
            });
           
            $("#change2").click(function () {
                $.post("<?php echo U('Home/Admin/change');?>", {menu:"menu2",change:"change2"}, function (data) {
                	 /* alert(data);
                	$("#change1").empty().html(data);  */
                	location.reload();
                });
            });
            
            $("#change3").click(function () {
                $.post("<?php echo U('Home/Admin/change');?>", {menu:"menu3",change:"change3"}, function (data) {
                	 /* alert(data);
                	$("#change1").empty().html(data);  */
                	location.reload();
                });
            });

        });
    </script>
    
</body>
</html>