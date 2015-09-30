<?php if (!defined('THINK_PATH')) exit();?>
	<!--左侧列表-->
        <div class="menu" style="height:570px">
        
            <div class="cont">
                <div class="title">管理员</div>

                <ul class="mList">
                    <li>
                        <h3 style="color:#fff"><span onclick="show('menu1','change1')" id="change1" style="color:#fff">+</span>导航栏的设置</h3>
                        <dl id="menu1" style="display:none;">
                        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><dd><a href="/sdibt_jsj/admin.php/Home/Navigation/show/id/<?php echo ($res['news_id']); ?>"><?php echo ($res['title']); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
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
                            <dd><a href="<?php echo U('Home/Manager/showUpdPassword');?>">密码修改</a></dd>
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