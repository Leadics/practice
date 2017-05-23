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
// require __DIR__  . '/vendor/php-sdk/CoinifyAPI.php';
// require __DIR__  . '/vendor/php-sdk/CoinifyCallback.php';
class ShopingCartController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Country','Shoping','State','City','User','Lead','Income','WithdrawalRequest','Tranaction');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	function proceedToPay(){
		$this->autoRender = false;
        $this->layout = "";
        $userInfo = $this->Session->read('User');
        $api_key = "qBIWSPHmkKcyMLXl5SVT1bgvOOCSAOxXCgadv+Wkrn01T5ARYxhzEZ/F0xKtjoNx";
		$api_secret = "ufweMCXKHSbh/4haNbtJ7CmuERueq+VwgjIoSK11dmHIwjdABlnQxGBI+Chn+y5i";
		$api = new CoinifyAPI($api_key, $api_secret);
		$plugin_name = 'MyPlugin';
		$plugin_version = '1';
		$loginData = $this->User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array('User.id' => $userInfo['id'])
        ));
		$auth = $loginData['User']['auth'];
		$shop['paid'] = md5($userInfo['id'].$userInfo['created'].'1success');
		$shop['fail'] = md5($userInfo['id'].$userInfo['created'].'0fail');
		$shop['user_id'] = md5($userInfo['id'].$userInfo['created']);
		$obj = implode(",", $shop);
		$this->Session->write('shop',$shop);
		$callback_url= 'https://www.coinigydex.com/ShopingCart/paymentRecienved/'.$obj.'/'.$auth;
		$callback_email = 'devr96@gmail.com';
		$cancel_url='https://www.coinigydex.com/ShopingCart/paymentCanceled/'.$obj.'/'.$auth;
		$return_url='https://www.coinigydex.com/ShopingCart/return/'.$userInfo['id'].'/'.$auth;
		$custom = array('user_id' => $userInfo['id'],'amount' =>10,);
		$response = $api->invoiceCreate(1.0, "USD", $plugin_name, $plugin_version,null,$custom,$callback_url,$callback_email,$return_url, $cancel_url);
		$this->redirect($response['data']['payment_url']);
	}
	function paymentRecienved(){
		$this->autoRender = false;
        $this->layout = "";
		$data = $_GET;
		if ($data['m_amount'] == 10 && $data['keyword'] == 'Subscription') {
			$authentication = $this->Shoping->find('first',array('conditions' => array ('id'=>$data['m_orderid'])));
			if (!empty($data['auth']) && $data['auth'] == $authentication['Shoping']['auth_string']) {
				$this->User->updateAll(array("status"=>1,'payment'=>1),array("id"=>$data['user_id']));
				$this->Shoping->updateAll(array("status"=>1),array("id"=>$data['m_orderid']));
				$d['user_id'] = $data['user_id'];
				$d['amount'] = $data['amount'];
				$d['shoping_id'] = $data['m_orderid'];
				$lData = $this->Shoping->find('first', array(
		            'fields' => array("item"),
		            'conditions' => array('id' => $data['m_orderid'])
		        ));
		        $d['shoping_id'] = $lData['Shoping']['item'];
		        $this->Tranaction->save($d);
			}
		} else {
			$authentication = $this->Shoping->find('first',array('conditions' => array ('id'=>$data['m_orderid'])));
			if (!empty($data['auth']) && $data['auth'] == $authentication['Shoping']['auth_string']) {
				$this->Shoping->updateAll(array("status"=>1),array("order_id"=>$data['m_orderid']));
			}
		}
		$this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ));
	}
	function paymentCanceled(){
		$this->autoRender = false;
        $this->layout = "";
        $userInfo = $this->Session->read('User');
		$this->redirect( array( 'controller' => 'users', 'action' => 'doPayments' ));
	}
	function status(){
		$this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ));
	}
}
