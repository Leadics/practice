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
	public $uses = array('Country','State','City','User','Lead','Income','DailyStatus');

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
        $memberToBinary = Configure::read('memberToBinary');
		if (!empty($id)) {
			$user = $this->User->find('first', array( 'conditions' => array('id' => $id)));
			$userData = $user['User'];
			$b = $this->getLRIncome($userData['username']);
    	    $binary = min($b['left'],$b['right']);
		}
		$incomes = $this->Income->find('list', array('fields' =>'binary', 'conditions' => array('user_id' => $id)));
		$rsp['binary']['Membership'] = 'Binary Income';
		$rsp['binary']['amount'] = $binary*($memberToBinary[$userData['package']]['binary']/100);
		$rsp['binary']['amount'] = $rsp['binary']['amount']+array_sum($incomes);
		return json_encode($rsp);
	}
	function calculateReferals($id){
		$this->autoRender = false;
        $this->layout = null;
        $memberToBinary = Configure::read('memberToBinary');
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
		$incomes = $this->Income->find('list', array('fields' =>'referal', 'conditions' => array('user_id' => $id)));
		$rsp['referal']['Membership'] = 'Referal Income';
		$rsp['referal']['amount'] = $referal*($memberToBinary[$userData['package']]['referal']/100);
		$rsp['referal']['amount'] = $rsp['referal']['amount']+array_sum($incomes);
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
		$rsp['singlelag']['Membership'] = 'Single Leg Binary Income';
		$rsp['singlelag']['amount'] = min($inc['left'],$inc['right']);
		$incomes = $this->Income->find('list', array('fields' =>'single_lag', 'conditions' => array('user_id' => $id)));
		$rsp['singlelag']['amount'] = $rsp['singlelag']['amount']+array_sum($incomes);
		return json_encode($rsp);
	}
	function calculateRoi($id){
		$this->autoRender = false;
        $this->layout = null;
        $cnt = 0;
        $user = $this->User->find('first', array( 'conditions' => array('id' => $id)));
        $incomes = $this->Income->find('first', array( 'conditions' => array('user_id' => $id,'DATE(created) > DATE_SUB(date("'.$user['User']['created'].'"), INTERVAL 7 DAY);')));
        if (empty($incomes)) {
        	 $daily = $this->DailyStatus->find('list',array('fields'=>array('plan','roi'),'conditions'=>array('status' =>1), 'order' => 'created desc'));
			if (!empty($id)) {
				$date1=date_create("2017-05-25");
				$date2=date_create("now");
				$diff=date_diff($date1,$date2);
				$direct = $this->User->find('all',array('conditions'=>array('direct'=>$user['User']['username'],'DATE(created) > DATE_SUB(date("'.$user['User']['created'].'"), INTERVAL 15 DAY);')));
				$cnt = count($direct);
				if ($cnt >= 2) {
					$m = 2;
				} else {
					$m = 1;
				}
				$d= $diff->format("%R%a");
				if ($d > 0) {
					$userData = $user['User'];
				} 
				$rsp['roi']['Membership'] = 'ROI Income';
				$rsp['roi']['amount'] = $userData['package_money']*($daily[$userData['package']]/100)*$m;
				$s['weekly']  = $rsp['roi']['amount'];
				$s['user_id'] = $id;
				$this->Income->save($s);
			}
        } else {
        	$rsp="";
        }
		return json_encode($rsp);
	}
	function getRoi($id){
		$this->autoRender = false;
        $this->layout = null;
        $this->calculateRoi($id);
        $incomes = $this->Income->find('list', array('fields' =>'weekly', 'conditions' => array('user_id' => $id)));
        $rsp['roi']['Membership'] = 'ROI Income';
		$rsp['roi']['amount'] = array_sum($incomes);
		return json_encode($rsp);
	}
	function getMapData(){
		$this->autoRender = false;
        $this->layout = null;
        $incomes = $this->City->find('list', array('fields' =>array('City.name'),'limit'=>120));
        foreach ($incomes as $key => $value) {
        	$rsp[$key]['states'] = $value;
        	$rsp[$key]['registration'] = rand(1,109);
        	$rsp[$key]['amount'] = rand(177,999);
        }
        return json_encode($rsp);
	}
}