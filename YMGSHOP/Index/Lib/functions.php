<?php
	//商品属性帅选链接处理函数
	function getlink($index,$id,$attr_value){
		$cid=Q('cid',0,'intval');
		$s=Q('s',null,'trim');
		// 将$s按-拆成一个数组
		$s=explode('-', $s);
		//给选中的属性加个样式
		$class=$s[$index-1]==$id?"class='active'":'';
		$s[$index-1]=$id;
		//将$s按-连接成一个字符串
		$s=implode('-', $s);
		$url=U('lists',array('cid'=>$cid,'s'=>$s));
		// 输出链接(<a href="$url" class="active" >属性名称</a>)
		$str='<a href="'.$url.'"'.$class.">".$attr_value."</a>";
		return $str;
	}




?>