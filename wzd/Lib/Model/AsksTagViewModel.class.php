<?php
class AsksTagViewModel extends ViewModel{
	public $viewFields = array(
     'Asks_tag'=>array(),   
     'Tags'=>array('tagname', '_on'=>'Asks_tag.tag_id=Tags.id'),
   );	
}
?>