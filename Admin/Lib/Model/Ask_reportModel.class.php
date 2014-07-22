<?php

class Ask_reportModel extends RelationModel{
    
    protected $tableName='ask_report';


    protected $_link=array(
        'reporter'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'User',
            'foreign_key'=>'reporterid',
            'mapping_name'=>'reporter',
            'mapping_fields'=>'username',
        ),
        'ask'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'Asks',
            'foreign_key'=>'ask_id',
            'mapping_name'=>'ask',
            'mapping_fields'=>'id,title'
        ),
    );
}

