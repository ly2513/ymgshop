<?php
	/**
	 * 配置项模型
	 */
	class WebSetModel extends Model{
		/**
		 * [$table 配置表]
		 * @var string
		 */
		public $table='config';
		/**
		 * [getAll 获得所有的网站配置]
		 * @return [type] [description]
		 */
		public function getAll(){
			//获得所有配置项
			$data=$this->all();
			foreach ($data as $id => $value) {
				//录入类型函数
				$function='_'.$value['type'];
				$data[$id]['html']=$this->$function($value);
			}
			return $data;
		}
		/**
		 * [updateConfig 更新配置项]
		 * @return [type] [description]
		 */
		public function updateConfig(){
			//存放相应配置项的值
			$data=array();
			foreach ($_POST as $name => $value) {
				$data['value']=$value;
				if(!$this->where("name='$name'")->save($data)){
					$this->error='更新配置项失败';
					return false;
				}
			}
			//将配置项写入文件中
			return $this->createConfigFile();
		}
		public function createConfigFile(){
			//获得配置项的名称和值
			$config=$this->getField('name,value');
			
			$data="<?php \n return ".var_export($config,true).";\n?>";
			//将配置数据写入base.php文件中
			return file_put_contents(APP_CONFIG_PATH.'base.php', $data);
		}
		/**
		 * [_text 配置项录入数据使用文本框]
		 * @param  [type] $config [description]
		 * @return [type]         [description]
		 */
		public function _text($config){
			return "<input type='text' name='{$config['name']}' value='{$config['value']}'/>";
		}
		/**
		 * [_radio 录入方式为单选按钮]
		 * @param  [type] $config [description]
		 * @return [type]         [description]
		 */
		public function _radio($config){
			$data=explode(',', $config['info']);//$data[0]=1|开启，$data[1]=0|关闭
			$html="";
			foreach ($data as $id => $value) {
				//$info[0]=1,$info[1]=开启;$info[0]=0,$info[1]=关闭
				$info=explode('|', $value);
				$checked=$config['value']==$info[0]?" checked='' ":'';
				$html.="<label><input type='radio' name='{$config['name']}' $checked value='{$info[0]}' class='w40'>$info[1]</label>";
			}
			return $html;
		} 
		/**
		 * [_textarea 配置项录入为文本域]
		 * @param  [type] $config [description]
		 * @return [type]         [description]
		 */
		public function _textarea($config){
			return "<textarea name='{$config['name']}'>{$config['value']}</textarea>";
		}


	}





?>