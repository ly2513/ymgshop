<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>站点配置项</title>
<script type='text/javascript' src='http://localhost/product/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/product/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/product/ymgshop';
WEB = 'http://localhost/product/ymgshop/index.php';
URL = 'http://localhost/product/ymgshop/index.php/Admin/WebSet/index';
APP = 'http://localhost/product/ymgshop/YMGSHOP';
COMMON = 'http://localhost/product/ymgshop/YMGSHOP/Common';
HDPHP = 'http://localhost/product/hdphp/hdphp';
HDPHPDATA = 'http://localhost/product/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/product/hdphp/hdphp/Extend';
MODULE = 'http://localhost/product/ymgshop/index.php/Admin';
CONTROLLER = 'http://localhost/product/ymgshop/index.php/Admin/WebSet';
ACTION = 'http://localhost/product/ymgshop/index.php/Admin/WebSet/index';
STATIC = 'http://localhost/product/ymgshop/Static';
HDPHPTPL = 'http://localhost/product/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View';
PUBLIC = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/product/ymgshop/YMGSHOP/Admin/View/WebSet';
HISTORY = 'http://localhost/product/ymgshop/index.php/Admin/Index/index';
</script>

</head>
<body>
    <div class="warp">
    <form action="" method="post">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>" class="action">配置列表</a></li>
            </ul>
        </div>
    </div>
    <div class="tab hd-form">
        <ul class="tab_menu">
            <li lab="base" ><a >网站基本配置</a></li>
            <li lab="other" ><a >其他配置</a></li>
        </ul>
        <div class="tab_content">
             
            <div id="base" class="action">
                <table class="table1 ">
                    <?php $hd["list"]["v"]["total"]=0;if(isset($data) && !empty($data)):$_id_v=0;$_index_v=0;$lastv=min(1000,count($data));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($data,0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

                    <tr>
                        <td class="w100"><?php echo $v['title'];?></td>
                        <td class="w100"><?php echo $v['html'];?></td>
                        <td class="w150"><?php echo $v['orderlist'];?></td>
                    </tr>
                    <?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                </table>
            </div>
            <div id="other">
               
            </div>
            
        </div>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="保存"/>
        </div>
        </form>
    </div>
        <!--  <table class="table1">
            <tr>
                <th colspan="100">验证码配置</th>
            </tr>
            <?php if(is_array($data)){?><?php  foreach($data as $key=>$v){ ?>
             <?php if($v['type_id'] == 2){?>
            <tr>
                <td class="w100"><?php echo $v['name'];?></td>
                <td class="w100">
                <input type="text" name="<?php echo $v['name'];?>" id="" value="<?php echo $v['value'];?>"/>
                </td>
               <td class="w150"><?php echo $v['title'];?></td>   
              <td class="w150"><?php echo $v['des'];?></td>
            </tr>
            <?php }?>
            <?php }}?>
        </table>
            <table class="table1">
            <tr>
                <th colspan="100">水印配置</th>
            </tr>
            <?php if(is_array($data)){?><?php  foreach($data as $key=>$v){ ?>
             <?php if($v['type_id'] == 3){?>
            <tr>
                <td class="w100"><?php echo $v['name'];?></td>
                <td class="w100">
                <input type="text" name="<?php echo $v['name'];?>" id="" value="<?php echo $v['value'];?>"/>
                </td>
               <td class="w150"><?php echo $v['title'];?></td>   
              <td class="w150"><?php echo $v['des'];?></td>
            </tr>
            <?php }?>
            <?php }}?>
        </table>
         <table class="table1">
            <tr>
                <th colspan="100">缩略图配置</th>
            </tr>
            <?php if(is_array($data)){?><?php  foreach($data as $key=>$v){ ?>
             <?php if($v['type_id'] == 4){?>
            <tr>
                <td class="w100"><?php echo $v['name'];?></td>
                <td class="w100">
                <input type="text" name="<?php echo $v['name'];?>" id="" value="<?php echo $v['value'];?>"/>
                </td>
               <td class="w150"><?php echo $v['title'];?></td>   
              <td class="w150"><?php echo $v['des'];?></td>
            </tr>
             <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <?php }?>
            <?php }}?>
        </table> -->

</body>
</html>