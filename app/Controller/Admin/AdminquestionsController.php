<?php
App::uses('AdminAppController', 'Controller');
class AdminQuestionsController extends AdminAppController {
	public $components = array('RequestHandler');
	public $uses = array('Service','Question','TransactionManager');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->layout = 'admin';
	}

	public function index() {

		$limit = (!empty($this->params->query['limit'])) ? $this->params->query['limit'] : 50;
		$keyword = (!empty($this->params->query['keyword'])) ? trim($this->params->query['keyword']) : '';
		$condition = array();


	
		// $condition = array(
		// 	array(
		// 		'Customer.deleted ' => 0
		// 	),
		// 	'OR' => array(
		// 		array('Customer.customer_id LIKE' => '%'. $keyword .'%'),
		// 		array('Customer.name LIKE' => '%'. $keyword .'%'),
		// 		array('Customer.email LIKE' => '%'. $keyword .'%'),
		// 		array('Customer.address LIKE' => '%'. $keyword .'%'),
		// 		array('Customer.phone_number LIKE' => '%'. $keyword .'%')
		// 	)
		// ) ;
		
		$this->paginate = array(
			'paramType' => 'querystring',
			'limit' => $limit,
			'order' => array('id' => 'ASC'),
			// 'conditions' => $condition
		);
		$pag = $this->paginate('Question');
		$this->set(compact('pag','limit'));

	}

	public function add($id=null) {
		$data = array() ;

		$service_name = $this->Service->findByid($id,array(
			'fields' => 'name'));
		$service_id = $id ;

		$this->set(compact('service_name','service_id'));

		if ($this->request->is(array('post', 'put'))) {

			try {
				$transaction = $this->TransactionManager->begin();

				$i = 0 ;
				foreach ($this->request->data['Question'] as $key => $value) {
					$data[$i]['Question']['Ename'] = $value['Ename'] ;
					$data[$i]['Question']['Mname'] = $value['Mname'] ;
					$data[$i]['Question']['service_id'] = $service_id ;
					$i++ ;
				}

				$this->Question->create();
				
				if (!$this->Question->saveMany($data, array('deep' => true))) {
					throw new Exception('ERROR COULD NOT ADD Tag');
				}


				$this->TransactionManager->commit($transaction);
				$this->redirect(array('action' => 'index'));

			} catch (Exception $e) {
				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
			}
		}

	}

	public function addAnswer($id = null) {

		$quest = $this->Question->findById($id);

		$services = $this->Service->find('all');
		$service_name = array();
		foreach ($services as $key => $value) {
			$service_name[$key+1] = $value['Service']['name'].'	'.$value['Service']['myan_name'];
		}

		// Question type
		$type = array('text','check','radio');

		$this->set(compact('services','type','quest','service_name'));

		$eAnswer = '';
		$mAnswer = '';


		if ($this->request->is(array('post', 'put'))) {
			$tooltype = $type[$this->request->data['Question']['type']];
			unset($this->request->data['Question']['type']);

			foreach ($this->request->data['Question'] as $key => $value) {
				$eAnswer .= $value['en_answer'].'@@';
				$mAnswer .= $value['mm_answer'].'@@';
			}
			$eAnswer = rtrim($eAnswer,"@@");
			$mAnswer = rtrim($mAnswer,"@@");
			
			unset($this->request->data['Question']);
			$this->request->data['Question']['en_answer'] = $eAnswer ;
			$this->request->data['Question']['mm_answer'] = $mAnswer ;
			$this->request->data['Question']['type'] = $tooltype ;
			$this->request->data['Question']['id'] = $id ;
			try {
				$transaction = $this->TransactionManager->begin();
				$this->Question->create();
				if (!$this->Question->saveMany($this->request->data)) {
					throw new Exception('ERROR COULD NOT ADD Tag');
				}

				$this->TransactionManager->commit($transaction);
				$this->redirect(array('action' => 'index'));

			} catch (Exception $e) {
				$this->log('File : ' . $e->getFile() . ' Line : ' . $e->getLine(), LOG_ERR);
				$this->log($e->getMessage(), LOG_ERR);
				$this->TransactionManager->rollback($transaction);
			}
		}
	}
}