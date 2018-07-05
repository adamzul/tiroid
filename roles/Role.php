<?php
namespace app\roles;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Role {
	function getRole(){
		$role['access'] = [
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'actions'=>[
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                        ],
                        'allow'=>true,
                        'roles' => ['@']
                    ],
                    
                ],
            ];
		return $role['access'];
	}
	
} 