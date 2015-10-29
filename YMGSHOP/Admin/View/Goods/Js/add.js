
/**
 * [add 添加上传详情页图片]
 */
function add(){
	var html="<li style='clear:both;margin-top:10px'><a href='javascript:;'onclick='removeImg(this)'><i class='iconfont'>&#xf0176;</i></a><input type='file' name='img_original[]' class='w100'></li>";
		$('#image #img_list').append(html);
}
/**
 * [removeImg 移除详情页图片]
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
function removeImg(obj){
	$(obj).parents('li').eq(0).remove();
}
/**
 * [deleteImg 异步删除详情页图片]
 * @return {[type]} [description]
 */
$(function(){
	$('.sub').click(function() {
		var gallery_id=$(this).attr('gid');
		var obj=$(this).parent('li');
		$.ajax({
			url: CONTROLLER+'&a=deleteImg',
			type: 'POST',
			dataType: 'json',
			data: {gallery_id: gallery_id},
			success:function(json){
				if(json.status==1){
					$.dialog({'message':json.message,'type':'success','timeout':3});
					deleteImg(obj)
				}else{
					$.dialog({'message':json.message,'type':'error','timeout':3});
				}
			}
		})
	});


})
/**
 * [deleteImg 删除编辑页面的图片列表图]
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
 function deleteImg(obj){
 	obj.remove();
 }


/**
 * [getAttr 获取属性]
 * @return {[type]} [description]
 */
function getAttr(){
	var cat_id=$("select[name='cat_id']").val();
	var gid=$("select[name='cat_id']").attr('gid');
	//没选商品类型，就返回
	if(!cat_id) return;
	//传递参数
	var data={'cat_id':cat_id};
	//有商品id就存入json data对象中
	if(gid){
		data.gid=gid;
	}
	$.ajax({
		url: CONTROLLER+'&a=getAttr',
		type: 'POST',
		data: data,
		success:function(html){
			$('#attr').html(html);
		}
	})
}
/**
 * [addAttr 添加属性]
 * @param {[type]} obj [当前对象]
 */
function addAttr(obj){
	var tr=$(obj).parents('tr').eq(0).clone();
	tr.find('a').attr('onclick','removeAttr(this);').html("<i class='iconfont'>&#xf0176;</i></a>");
	$(obj).parents('tr').eq(0).after(tr);
}
/**
 * [removeAttr 删除属性]
 * @param  {[type]} obj [当前对象]
 * @return {[type]}     [description]
 */
 function removeAttr(obj){
 	$(obj).parents('tr').eq(0).remove();
 } 









