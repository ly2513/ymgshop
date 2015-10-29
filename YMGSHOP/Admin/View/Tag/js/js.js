/* 
* @Author: nic-tes
* @Date:   2014-03-12 16:58:42
* @Last Modified by:   nic-tes
* @Last Modified time: 2014-03-12 18:20:59
*/

// $(document).ready(function(){
//     //点击编辑标签效果
//     $('.edit_tag').click(function() {
//     	//原来显示标签名的隐藏
//     	var tr = $(this).parents('tr');
//     	tr.find('span.name').hide();

//     	//显示input表单
//     	tr.find('input[name=tagname]').show();

//     	//把编辑变为保存
//     	$(this).parents('tr').find('.submit_tag').show();
//     	$(this).hide();
    	
//     });
// });

$(function(){
   $('#edit_a').click(function(){
   	  var tr=$(this).parents('tr');
   	  //让标签名隐藏
   	  tr.find('.tname').hide();
   	  //让input显示
   	  tr.find('.taginput').show();
   	  //把编辑变为保存
   	  tr.find('#save_a').show();
   	  $(this).hide();
   })
   $('#save_a').click(function(){
   	 var tr=$(this).parents('tr');
   	  var data= $('form[name=tag_form]').serialize();
   	  $.ajax({
   	  	  url:CONTROLLER+'/ajax_tag_edit',
   	  	  type:'post',
   	  	  data:data,
   	  	  dataType:'text',
   	  	  success:function(data){
            if(data){
             //抓取表单值
             var val=tr.find('input[name=tagname]');
             //抓取span写入值
             tr.find('.tname').html(val.val());
             tr.find('.taginput').hide();
             tr.find('.tname').show();
             tr.find('#save_a').hide();
             tr.find('#edit_a').show();
            }else{
            	alert('修改失败');
            }
   	  	  }
   	  })
   })
})