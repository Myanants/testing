<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class Service extends AppModel {

	public $hasMany = array (
		'SubService','Question','ServiceRequest'
	);

	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'message' => ' Please fill name !',
				'required' => true
			)
		)
	);

}