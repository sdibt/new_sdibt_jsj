<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head >
<title>山东工商学院计算机科学与技术学院</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="/sdibt_jsj/Public/styles1/3_column.css" type="text/css" />
<link rel="stylesheet" href="/sdibt_jsj/Public/styles1/layout.css" type="text/css" />
<link rel="stylesheet" href="/sdibt_jsj/Public/styles1/xiala.css" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="/sdibt_jsj/Public/Css/page.css" /> -->
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="/sdibt_jsj/Public/scripts1/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts1/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts1/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts1/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="/sdibt_jsj/Public/scripts1/jquery.galleryview.setup.js"></script>
<!-- End Homepage Specific Elements -->

</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <img src="/sdibt_jsj/Public/image/logo2.png" alt="" style = "width:80px;height:80px;margin:10px 0 0 0"/>
    	<img src="/sdibt_jsj/Public/image/jsjlogo.png" alt=""  style = "width:600px;height:80px;margin:0 0 0 -10px"/>
    </div>
    <div class="fl_right">
      <form action="/sdibt_jsj/Home/Search/showSearch" method="post" id="sitesearch">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" name ="val" value="Search Our Website&hellip;" onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="image" src="/sdibt_jsj/Public/images1/search.gif" id="search" alt="Search" />
        </fieldset>
      </form>
    </div>
    <div id="topnav" class = "menu">  
      <ul >
        <li class="active"><a href="/sdibt_jsj">首页</a></li>
        	<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><li><a href="/sdibt_jsj/Home/nav/?type_id=<?php echo ($res['news_id']); ?>&news_id=1"><?php echo ($res['title']); ?></a>
		        <ul>
		        	<?php if(is_array($result1[$res['news_id']])): $i = 0; $__LIST__ = $result1[$res['news_id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res1): $mod = ($i % 2 );++$i;?><li><a href="/sdibt_jsj/Home/nav/?type_id=<?php echo ($res['news_id']); ?>&news_id=<?php echo ($res1['news_id']); ?>" ><?php echo ($res1['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>  
		         </ul>
		         </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</div>

<div class="wrapper row3">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="left_column" >
      <div class="holder" >
        <h2 class="title" style="font-style:normal"><b><?php echo ($Title1['title']); ?>&nbsp;&nbsp;&raquo;</b></h2>
        <ul class="nostart" style="margin-left:60px;font-size:16px">
          <?php if(is_array($Title)): $i = 0; $__LIST__ = $Title;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><li><a href="/sdibt_jsj/Home/nav/?type_id=<?php echo ($t['type_id']); ?>&news_id=<?php echo ($t['news_id']); ?>"><?php echo ($t['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <!-- ############ -->
    <div id="content" style="width:600px;margin:20px 0 0 100px">
      <h1 class="title" style="font-style:normal;" align="center"><b> <?php echo ($Con['title']); ?></b></h1>
      <p align="center">发布时间:<?php echo ($Con['addtime']); ?></p>
      <p><?php echo (htmlspecialchars_decode($Con['content'])); ?>
      </p>
    </div>
  </div>
</div>

<div class="wrapper">

  <div id="copyright" class="clear" style="width:960px;display:block;position:relative;">
  		<div class="lists" style="width:560px;display:block;float:left;">
        <h2 style="font-style:normal ; color:#fff">&raquo;<b>快速导航</b></h2>
        <ul >
          <li><a href="http://acm.sdibt.edu.cn/" target="_Blank">&raquo; ACM OnlineJudge</a></li>
          <li><a href="http://acm.sdibt.edu.cn:8080/judge/toIndex.action" target="_Blank">&raquo; ACM VirutalJudge </a></li>
          <li><a href="http://www.ccec.edu.cn/" target="_Blank">&raquo; 山东工商学院</a></li>
          <li><a href="http://xd.sdibt.edu.cn/" target="_Blank">&raquo; 信电学院</a></li>
          <li><a href="http://sx.sdibt.edu.cn/" target="_Blank">&raquo; 数学与信息科学学院</a></li>
          <li><a href="http://career.sdibt.edu.cn/" target="_Blank">&raquo; 招生与就业处</a></li>
          <li><a href="http://lib.sdibt.edu.cn/" target="_Blank">&raquo; 山商图书馆</a></li>
          <li><a href="http://www.tup.com.cn/index.html" target="_Blank">&raquo; 清华大学出版社</a></li>
        </ul>
        </div>
        <div style="width:400px;display:block;float:right;">
         <p style="display:block;float:right; margin:3% 0 0 0; color:#fff">
         	   邮政编码：264005 <br><br>
         	   通讯地址：山东省烟台市莱山区滨海中路191号  <br><br>山东工商学院计算机科学与技术学院
         <a href="/sdibt_jsj/admin.php" target="_Blank"><b >管理员入口</b></a><br><br>
         	   
  			 Copyright &copy; 2015   山东工商学院计算机科学与技术学院<br>
		 </p>
  		</div>
  </div>
</div>
</body>
</html>