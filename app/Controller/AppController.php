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
        //$this->Session->write('order',array());
        if (!empty($temp['id'])) {
            $this->userInfo = $temp;
            $this->set('userInfo', $this->userInfo);
        }
    }
    function _checkLogin() {
        $bankData =  $this->Session->read('UserBank');
        $this->set('UserBank' , $bankData );
        if( $this->Session->read('User') ) {
           $Login =1;
           $this->Session->write('Login' , 1);
           $user = $this->Session->read('User');
           if (empty($bankData['id'])) {
                $bank_detail = $this->UserBank->find('first', array( 'conditions' => array('user_id' => $user['id'],'is_active' =>1)));
                $this->Session->write('UserBank',$bank_detail['UserBank']);
                $this->set('UserBank' , $bank_detail['UserBank']);
            }
           if($user['status'] == 1 && $user['payment'] == 1){
                $user_id =$user['id'];
                return $user_id;
           } else if($user['payment'] == 0) {
                $this->Session->setFlash('<h3 class="well text-danger">Please complete your registration payment first</h3>');
                $this->redirect( array( 'controller' => 'users', 'action' => 'doPayments' ) );
           }else {
                $this->Session->delete('User');
                $this->Session->destroy();
                $this->redirect( array( 'controller' => 'pages', 'action' => 'home' ) );
           }
        } else {
            $this->redirect( array( 'controller' => 'pages', 'action' => 'home' ) );
        }
    }
    function __checkAdminLogin() {
        $bankData =  $this->Session->read('UserBank');
        $this->set('UserBank' , $bankData );
        if( $this->Session->read('User') ) {
           $Login =1;
           $this->Session->write('Login' , 1);
           $user = $this->Session->read('User');
           if (empty($bankData['id'])) {
                $bank_detail = $this->UserBank->find('first', array( 'conditions' => array('user_id' => $user['id'],'is_active' =>1)));
                $this->Session->write('UserBank',$bank_detail['UserBank']);
                $this->set('UserBank' , $bank_detail['UserBank']);
            }
           if($user['status'] == 1 && $user['is_admin'] == 1){
                $user_id =$user['id'];
                return $user_id;
           } else {
                $this->Session->delete('User');
                $this->Session->destroy();
                $this->redirect( array( 'controller' => 'pages', 'action' => 'home' ) );
           }
        } else {
            $this->redirect( array( 'controller' => 'pages', 'action' => 'home' ) );
        }
    }
	function getSponcer($email,$side){
        set_time_limit(0);
        $loginData = $this->User->find('first', array(
            'fields' => array("User.username"),
            'conditions' => array('User.sponcer' => $email,'side' =>$side)
        ));
        if (empty($loginData['User']['username'])) {
            return $email;
        } else{
            $data = $this->getTree($loginData['User']['username']);
            $cnt = count($data);
            if (!empty($cnt)) {
                $emailSponcer = $this->validateSponcer($data,0,$side);
                return $emailSponcer;
            } else {
                return $loginData['User']['username'];
            }
        }
    }
    function getTree($email = null){
        if (empty($email)) {
            $userData = $this->Session->read('User');
        } else{
            $userData['username'] = $email;
        }
        $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?username='.$userData['username']),true);
        return $arr;
    }
    function validateSponcer($data,$lim,$side){
        $cnt = count($data);
        $loginData = $this->User->find('first', array(
            'fields' => array("User.username"),
            'conditions' => array('User.sponcer' => $data[$lim]['username'],'side' =>$side)
        ));
        if (empty($loginData)) {
            return $data[$cnt-$lim]['username'];
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
	            'conditions' => array('User.username' => $emailId)
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
    // function walletIncome($option = null,$source = null){
    //     set_time_limit(0);
    //     $memberToBinary = Configure::read('memberToBinary');
    //     if (!empty($option)) {
    //         $userData = $option;
    //     } else{
    //         $userData = $this->Session->read('User');
    //     }
    //     $user = $this->User->find('all', array( 'conditions' => array('direct' => $userData['username'])));
    //     $b = $this->getLRIncome($userData['username']);
    //     $binary = min($b['left'],$b['right']);
    //     foreach ($user as $key => $value) {
    //         if ($value['User']['payment'] == 1) {
    //             $ref[] = $value['User']['donation'];
    //         }
    //     }
    //     $roi = ($userData['donation']*$memberToBinary[$userData['package']]['roi'])/100;
    //     $referal = array_sum($ref);
    //     if (empty($source) || $source != 'dashboard') {
    //         $wallets = $this->WithdrawalRequest->find('all', array( 'conditions' => array('user_id' => $userData['id'],'is_paid !=' => 2)));
    //         $bin =  Set::classicExtract($wallets, "{n}.WithdrawalRequest.binary");
    //         $ref =  Set::classicExtract($wallets, "{n}.WithdrawalRequest.referal");
    //         $dal =  Set::classicExtract($wallets, "{n}.WithdrawalRequest.daily");
    //         if (!empty($binary)) {
    //             $binary = $binary - (array_sum($bin)*$memberToBinary[$userData['package']]['binary']) ;
    //         } else{
    //             $binary = 0;
    //         }
    //         if (!empty($referal)) {
    //             $referal = $referal - ((array_sum($ref)*100)/$memberToBinary[$userData['package']]['direct']) ;
    //         } else {
    //             $referal = 0;
    //         }
    //         if (!empty($daily)) {
    //             $daily = $daily - array_sum($dal) ;
    //         } else {
    //             $daily = 0;
    //         }
    //     }
    //     if (!empty($option)) {
    //         $this->autoRender = false;
    //         $totalIncome['binary'] = $binary;
    //         $totalIncome['daily'] = $roi;
    //         $totalIncome['referal'] = $referal;
    //         return $totalIncome;
    //     }
    // }
    function getTeam($option,$flag){
        $rps = array();
        $this->layout = 'dashboard';
        //$user_id = $this->_checkLogin();
        set_time_limit(0);
        if (empty($option)) {
            $userData = $this->Session->read('User');
        } else {
            $userData = $option;
        }
        //echo '<pre>';print_r($userData);die;
        $data['username'] = $userData['username'];
        if($userData['payment'] == 1){
            $data['image'] = ABSOLUTE_URL.'/img/green.png';
        } else {
            $data['image'] = ABSOLUTE_URL.'/img/user.png';
        }
        if (!empty($flag)) {
            $rr[0]= $userData;
        } else {
            $rr[0]= $userData;
            $rr[0]['image'] = $data['image'];
            $rr[0]['username'] = $data['username'];
            $rr[0]['sponcer'] = $data['username'];
        }
       
        $rps = $this->fetch_children($userData['username']);
        
        
        $rps = array_merge((array)$rr,(array)$rps);
        return  $rps;
    }
    function getLRIncome($email){
        $loginData = $this->User->find('all', array(
            'conditions' => array('User.sponcer' => $email)
        ));
        foreach ($loginData as $key => $value) {
            $data[$value['User']['side']] = $this->getTree($value['User']['username']);
            $r[$value['User']['side']] = $value['User']['donation'];
        }
        foreach ($data as $key => $value) {
            foreach ($value as $k => $val) {
                if ($val['payment'] == 1 ) {
                    $rsp[$key][] = $val;
                }
            }
        }
        foreach ($rsp as $key => $value) {
            $income[$key] = array_sum(Set::classicExtract($value, "{n}.donation"));
        }
        if (!empty($income['left'])) {
            $arr['left'] = $income['left'];
        } else {
            $arr['left'] = 0;
        }
        if (!empty($income['right'])) {
            $arr['right'] = $income['right'];
        } else {
            $arr['right'] = 0;
        }
        $arr['right'] = $arr['right'] + $r['right'];
        $arr['left'] = $arr['left'] + $r['left'];
        return $arr;
    }
    function moveFile($file){
        $this->autoRender = false;
        $stamp = time();
        $rsp = "";
        $file['name']=preg_replace('/\s+/', '', $file['name']);
        if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $stamp .$file['name'])) {
            $rsp = ABSOLUTE_URL.'/img/'.$stamp.$file['name'];
        }else{
            $rsp = "";
        }
        return $rsp;
    }
}
