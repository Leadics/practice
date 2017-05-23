<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//$Blockchain = new \Blockchain\Blockchain();
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CronsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Country','State','City','User','Lead','Income');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function calculateBinary($id){
		$this->autoRender = false;
        $this->layout = null;
		if (!empty($id)) {
			$user = $this->User->find('first', array( 'conditions' => array('id' => $id)));
			$userData = $user['User'];
			$b = $this->getLRIncome($userData['username']);
    	    $binary = min($b['left'],$b['right']);
		}
		$rsp['binary']['Membership'] = 'Binary Income';
		$rsp['binary']['amount'] = $binary;
		return json_encode($rsp);
	}
	function calculateReferals($id){
		$this->autoRender = false;
        $this->layout = null;
		if (!empty($id)) {
			$user1 = $this->User->find('first', array( 'conditions' => array('id' => $id)));
			$userData = $user1['User'];
			$user = $this->User->find('all', array( 'conditions' => array('direct' => $userData['username'])));
			foreach ($user as $key => $value) {
		        if ($value['User']['payment'] == 1) {
		            $ref[] = $value['User']['donation'];
		        }
		    }
		    $referal = array_sum($ref);
		}
		$rsp['referal']['Membership'] = 'Referal Income';
		$rsp['referal']['amount'] = $referal;
		return json_encode($rsp);
	}
	function calculateMatrix($id){
		$this->autoRender = false;
        $this->layout = null;
        $rsp = '';
		if (!empty($id)) {
			$user = $this->User->find('first', array( 'conditions' => array('id' => $id)));
			$incomes = $this->Income->find('first', array( 'conditions' => array('user_id' => $id)));
			$userData = $user['User'];
			if (!empty($incomes['Income']['bronz']) && !empty($incomes['Income']['silver']) && empty($incomes['Income']['dimond'])) {
				$dmdcnt =0;
				$dimond = $this->User->find('all', array( 'conditions' => array('id >' => $id , 'payment' =>1,'package_money >' => 300)));
				foreach ($dimond as $key => $value) {
					$b = $this->Income->find('first', array( 'conditions' => array('user_id' => $value['User']['id'])));
					if (!empty($b['Income']['silver'])) {
						$dmdcnt++;
					}
				}
				if ($dmdcnt >= 3) {
					$this->Income->updateAll(array("dimond"=>2500),array("user_id"=>$id));
					$this->User->updateAll(array("membership"=>'Diamond'),array("id"=>$id));
					$rsp['membership']['Membership'] = 'Diamond';
					$rsp['membership']['amount'] = '2500 $';
				}
			} else if (!empty($incomes['Income']['bronz'] && empty($incomes['Income']['silver']))) {
				$silver = $this->User->find('all', array( 'conditions' => array('direct' => $userData['username'] , 'payment' =>1,'package_money >' => 100)));
				if (count($silver) >= 3) {
					$this->Income->updateAll(array("silver"=>100),array("user_id"=>$id));
					$this->User->updateAll(array("membership"=>'Silver'),array("id"=>$id));
					$rsp['membership']['Membership'] = 'Silver';
					$rsp['membership']['amount'] = '100 $';
				}
			} else if (empty($incomes['Income']['bronz'])) {
				$bronz = $this->User->find('all', array( 'conditions' => array('id >' => $id , 'payment' =>1)));
				if (count($bronz) >= 6 ) {
					$this->Income->updateAll(array("bronz"=>10),array("user_id"=>$id));
					$this->User->updateAll(array("membership"=>'Bronze'),array("id"=>$id));
					$rsp['membership']['Membership'] = 'Bronze';
					$rsp['membership']['amount'] = '10 $';
				}
			}
		}
		return json_encode($rsp);
	}
	function calculateSingleLag($id){
		$this->autoRender = false;
        $this->layout = null;
        $singleLagBinary = Configure::read('singleLagBinary');
		$user = $this->User->find('first', array( 'conditions' => array('id' => $id)));
		switch ($user['User']['package']) {
			case 'learner':
				$level = 1;
				break;
			case 'pre-trader':
				$level = 2;
				break;
			case 'trader':
				$level = 4;
				break;
			case 'pro-trader':
				$level = 5;
				break;
			case 'merchant':
				$level = 6;
				break;
			case 'exchanger':
				$level = 7;
				break;
		}
		$arr = json_encode(file_get_contents(ABSOLUTE_URL.'/teamWithLevel.php?username='.$user['User']['username'].'&level=0'),true);
		foreach ($arr as $key => $value) {
			if ($level > $value['level']) {
				$value['amount'] = ($value['donation']*$singleLagBinary['level'.$value['level']])/100;
				$newArr[$value['side']][] = $value;
			}
		}
		$inc['left'] = array_sum(Set::classicExtract($newArr['left'], "{n}.amount"));
		$inc['right'] = array_sum(Set::classicExtract($newArr['right'], "{n}.amount"));
		$rsp['singlelag']['Membership'] = 'Single Lag Binary Income';
		$rsp['singlelag']['amount'] = min($inc['left'],$inc['right']);
		return json_encode($rsp);
	}
}