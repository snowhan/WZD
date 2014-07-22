<?php

class AsksModel extends RelationModel{
    
    protected $tableName='asks';


    protected $_link=array(
        'creator'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'User',
            'foreign_key'=>'uid',
            'mapping_name'=>'creator',
            'mapping_fields'=>'username',
        ),
    );
}

