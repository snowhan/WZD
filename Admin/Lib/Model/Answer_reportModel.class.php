<?php

class Answer_reportModel extends RelationModel{
    
    protected $_link=array(
        'reporter'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'User',
            'foreign_key'=>'reporterid',
            'mapping_name'=>'reporter',
            'mapping_fields'=>'username',
        ),
        'answer'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'Answers',
            'foreign_key'=>'answer_id',
            'mapping_name'=>'answer',
            'mapping_fields'=>'id,content'
        ),
        
    );
}

