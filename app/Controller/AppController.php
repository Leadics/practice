<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	var $userInfo = null;
    public $uses = array('Product','User','GiveHelp','DailyClick','UserBank','UserWallet','RejectedHelp','WithdrawalRequest');
 
    public function beforeFilter() {
        $temp = $this->Session->read('User');
        if (!empty($temp['id'])) {
            $this->userInfo = $temp;
            $this->set('userInfo', $this->userInfo);
        }
    }
	function getSponcer($email,$side){
        set_time_limit(0);
        $loginData = $this->User->find('first', array(
            'fields' => array("User.email"),
            'conditions' => array('User.sponcer' => $email,'side' =>$side)
        ));
        if (empty($loginData['User']['email'])) {
            return $email;
        } else{
            $data = $this->getTree($loginData['User']['email']);
            $cnt = count($data);
            if (!empty($cnt)) {
                $emailSponcer = $this->validateSponcer($data,0,$side);
                return $emailSponcer;
            } else {
                return $loginData['User']['email'];
            }
        }
    }
    function getTree($email = null){
        if (empty($email)) {
            $userData = $this->Session->read('User');
        } else{
            $userData['email'] = $email;
        }
        $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?email='.$userData['email']),true);
        return $arr;
    }
    function validateSponcer($data,$lim,$side){
        $cnt = count($data);
        $loginData = $this->User->find('first', array(
            'fields' => array("User.email"),
            'conditions' => array('User.sponcer' => $data[$lim]['email'],'side' =>$side)
        ));
        if (empty($loginData)) {
            return $data[$cnt-$lim]['email'];
        } else {
            $lim++;
            $emailSponcer = $this->validateSponcer($data,$lim,$side);
            return $emailSponcer;
        }
    }
    function checkMemberShip($emailId = '',$userName = null) {
        $isAvailbale = true;
        $message = false;
        $this->autoRender = false;
        $this->layout = null;
        $isMember = false;
     	if (!empty($userName)) {
     		$loginData = $this->User->find('first', array(
	            'fields' => array("User.id"),
	            'conditions' => array('User.email' => $emailId)
	        ));
     	} else {
     		$loginData = $this->User->find('first', array(
	            'fields' => array("User.id"),
	            'conditions' => array('User.emailid' => $emailId)
	        ));
     	}
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        return $isMember;
    }
}
