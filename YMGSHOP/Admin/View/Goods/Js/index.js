
$(function(){
	/**
	 * [异步修改热销状态]
	 * @return {[type]} [description]
	 */
	$("td img.ishot").live('click',function() {
		var TPL=$(this).parent('td').parent('tr').attr('TPL');
		var is_hot=$(this).attr('ishot');
		var gid=$(this).parent('td').parent('tr').find('td.gid').html();
		var obj=$(this).parent('td').parent('tr').find("td img.ishot");
		$.ajax({
			url: CONTROLLER+'&a=isHot',
			type: 'POST',
			data: {gid: gid,is_hot:is_hot},
			success:function(json){
				if(json!=0){
					obj.attr('src',TPL+"/Image/yes.gif");
					obj.attr('ishot',0);
				}else if(json==0){
					obj.attr('src',TPL+'/Image/no.gif');
					obj.attr('ishot',1);
				}
			}
		})
	});
	/**
	 * [异步修改新品状态]
	 * @return {[type]} [description]
	 */
	$("td img.isnew").live('click',function() {
		var TPL=$(this).parent('td').parent('tr').attr('TPL');
		var is_new=$(this).attr('isnew');
		var gid=$(this).parent('td').parent('tr').find('td.gid').html();
		var obj=$(this).parent('td').parent('tr').find("td img.isnew");
		$.ajax({
			url: CONTROLLER+'&a=isnew',
			type: 'POST',
			data: {gid: gid,is_new:is_new},
			success:function(json){
				if(json!=0){
					obj.attr('src',TPL+"/Image/yes.gif");
					obj.attr('isnew',0);
				}else{
					obj.attr('src',TPL+'/Image/no.gif');
					obj.attr('isnew',1);
				}
			}
		})
	
	});
	/**
	 * [异步修改精品状态]
	 * @return {[type]} [description]
	 */
	$("td img.isbest").live('click',function() {
		var TPL=$(this).parent('td').parent('tr').attr('TPL');
		var is_best=$(this).attr('isbest');
		var gid=$(this).parent('td').parent('tr').find('td.gid').html();
		var obj=$(this).parent('td').parent('tr').find("td img.isbest");
		$.ajax({
			url: CONTROLLER+'&a=isbest',
			type: 'POST',
			data: {gid: gid,is_best:is_best},
			success:function(json){
				if(json!=0){
					obj.attr('src',TPL+"/Image/yes.gif");
					obj.attr('isbest',0);
				}else{
					obj.attr('src',TPL+'/Image/no.gif');
					obj.attr('isbest',1);
				}
			}
		})
	
	});
	/**
	 * [异步修改上架状态]
	 * @return {[type]} [description]
	 */
	$("td img.isonsale").live('click',function() {
		var TPL=$(this).parent('td').parent('tr').attr('TPL');
		var is_on_sale=$(this).attr('isonsale');
		var gid=$(this).parent('td').parent('tr').find('td.gid').html();
		var obj=$(this).parent('td').parent('tr').find("td img.isonsale");
		$.ajax({
			url: CONTROLLER+'&a=isonsale',
			type: 'POST',
			data: {gid: gid,is_on_sale:is_on_sale},
			success:function(json){
				if(json!=0){
					obj.attr('src',TPL+"/Image/yes.gif");
					obj.attr('isonsale',0);
				}else{
					obj.attr('src',TPL+'/Image/no.gif');
					obj.attr('isonsale',1);
				}
			}
		})
	
	});

})

