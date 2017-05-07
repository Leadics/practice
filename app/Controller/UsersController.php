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
App::import('Vendor', 'api-v1/src/Blockchain');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

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
	function register(){
		$this->layout = "dash";
		$country = $this->Country->find('all');       
        $this->set('country',$country);
	}
    function login(){
        $this->layout = "dash";
    }
    function logout(){
        $this->Session->delete('User');
        $this->Session->destroy();
        $this->redirect( '/' );
    }
    function whatIsBitcoin(){
        $this->layout = "dash";
    }
    function packages(){
        $this->layout = "dash";
    }
    function logins() {
        $this->autoRender = false;
        $this->layout = "";
        $login_detail = $this->User->find('first', array( 'conditions' => array('username' => $this->data['email'])));
        if(empty($login_detail)) {
            $this->Session->setFlash('<h3 class="well text-danger">Please enter correct login or password</h3>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
        } else if($login_detail['User']['status'] == 7) {
            $this->Session->setFlash('<h2 class="well text-danger">Account Blocked Due to donation time out please contact to customer care</h2>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
        }else if($login_detail['User']['status'] == 9) {
            $this->Session->setFlash('<h3 class="well text-danger">Your account is blocked please contact to customer care</h3>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
        } else if($login_detail['User']['status'] == 0) {
            $this->Session->setFlash('<h3 class="well text-danger">Please verify your email ID before login</h3>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
        } else if($login_detail['User']['status'] == 1){
           // echo '<pre>';print_r($login_detail);print_r($this->data);die;
            if($login_detail['User']['username'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
                $bank_detail = $this->UserBank->find('first', array( 'conditions' => array('user_id' => $login_detail['User']['id'],'is_active' =>1)));
                $data= $login_detail['User'];
                //$this->Session->write('UserBank',$bank_detail['UserBank']);
                $this->Session->write('User',$data);
                 //echo '<pre>';print_r($login_detail);print_r($this->data);die;
                // if ($login_detail['User']['is_admin'] == 1) {
                //     $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
                // }else {
                    $this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ) );
                //}
                
            } else {
                $this->Session->setFlash('<h3 class="well text-danger">Please enter correct login or password</h3>');
                $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
            }
        } else {
            $this->Session->setFlash('<h3 class="well text-danger">Your account is blocked please contact to customer care</h3>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'index' ) );
        }
    }
	function getAjax($attr,$modal){
        $this->autoRender = false;
        $this->layout = null;
        if ($modal == 'state') {
            $rsp = $this->State->find('list', array( 'conditions' => array('country_id' => $attr)));
        }else if($modal == 'city'){
            $rsp = $this->City->find('list', array( 'conditions' => array('state_id' => $attr)));
        }
        $str = '<select  onchange="getAjax(this.id,'.$modal.');" class="form-control" id="'.$modal.'" name="'.$modal.'"  title="Please enter your '.$modal.'"><option value="">Please select your '.$modal.'</option>';
        foreach ($rsp as $key => $value) {
            $str .= '<option value="'.$key.'">'.$value.'</option>';
        }
        $str .= '</select>';
        if (empty($rsp)) {
            $str .= '<option value="other">Other</option>';
        }
        echo $str;
    }
    function signUp(){
        $this->autoRender = false;
        set_time_limit(0);
        $data['User']['name'] =  $this->data['name'];
        $data['User']['username'] =  $this->data['username'];
        $data['User']['emailid'] =  $this->data['email'];
        $data['User']['state'] =  $this->data['state'];
        $data['User']['mobile'] =  $this->data['mobile'];
        $data['User']['password'] =  md5($this->data['password']);
        $data['UserBank']['bank_name'] =  $this->data['bank_name'];
        $data['UserBank']['account_number'] =  $this->data['account_number'];
        $data['UserBank']['act_name'] =  $this->data['act_name'];
        $data['User']['state'] =  $this->data['state'];
        $data['User']['country'] =  $this->data['country'];
        $data['User']['side']  = $side = $this->data['side'];
        $data['User']['sponcer'] =$this->getSponcer($this->data['sponcer'],$side);
        $data['User']['direct'] = $this->data['sponcer'];
        $data['User']['state'] =  $this->data['state'];
        $data['User']['city'] =  $this->data['city'];
        $data['User']['country'] =  $this->data['country'];
        if (EMAIL_SENDING == 1) {
            $data['User']['status'] = 0;
        } else {
            $data['User']['status'] = 1;
        }
        $data['User']['r1'] = 0;
        if (!empty($data['User']['email'])) {
             $this->User->save($data);
        }
        $userId = $this->User->getLastInsertID();
        $data['UserBank']['user_id'] = $userId;
        $this->UserBank->save($data);
        $bankId = $this->UserBank->getLastInsertID();
        $data['User']['id'] = $userId;
        $data['UserBank']['id'] = $bankId;
        if (EMAIL_SENDING == 1) {
            $loginData = $this->User->find('first', array(
                'conditions' => array('User.id' => $userId)
            ));
            $k1 = md5($loginData['created'].''.$loginData['id']);
            $message['name'] =  $loginData['User']['name'];
            $message['email'] =  $loginData['User']['emailid'];
            $message['approveUrl'] = ABSOLUTE_URL.'/pages/emailConfirmation/'.$userId.'/'.$k1;
            $m = $this->sendMail($loginData['User']['emailid'], $message, "Your Flanks Media  Membership", 'success', 'registration');
           // $this->redirect( array( 'controller' => 'pages', 'action' => 'index/'.$userId ));
            $_POST = array();
            $this->data = array();
            unset($_POST);
            unset($this->data);
            $this->Session->setFlash('<h3 class="well text-success">Your registration is successful kindly login to your email to activate your account</h3>');
            $this->redirect( array( 'controller' => 'Pages', 'action' => 'index' ));
         } else if (TEMP == 1) {
            $this->redirect( array( 'controller' => 'users', 'action' => 'proceedToPay' ));
         }else {
            $this->Session->write('User', $data['User']);
            $this->Session->write('UserBank',$data['UserBank']);
            $this->redirect( array( 'controller' => 'Pages', 'action' => 'dashboard' ));
        }
    }
    function proceedToPay($data = null){
        $this->layout = "dash";
        // switch ($data) {
        //     case '1':
        //         $content = 'Your registration is successful kindly login to your email to activate your account';
        //         break;
        //     case '2':
        //         $content = 'Your account is activated successfully you will get login access soon';
        //         break;
        // }
        // $this->set('data',$content);
    }
    function checkMemberShipByUserName(){
        $isAvailbale = true;
        $message = false;
        $this->autoRender = false;
        $this->layout = null;
        if (trim($emailId) == '')
            $emailId = $this->params['url']['username'];
        //check if email exists on some mail server
        
        $isMember = false;
        $loginData = $this->User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array('User.username' => $emailId)
        ));
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        if ($isMember) {
            $message = 'This user name is already registered.';
            $isAvailbale = false;
            
        } 
        echo json_encode(array('valid' => $isAvailbale, 'message' => $message));
        exit;
    }
    function checkMemberShipByEmail($emailId = '') {
        $isAvailbale = true;
        $message = false;
        $this->autoRender = false;
        $this->layout = null;
        if (trim($emailId) == '')
            $emailId = $this->params['url']['email'];
        $isMember = false;
        $loginData = $this->User->find('first', array(
            'fields' => array("User.id"),
            'conditions' => array('User.emailid' => $emailId)
        ));
        if (isset($loginData['User']['id']) && (int) $loginData['User']['id']) {
            $isMember = (int) $loginData['User']['id'];
        }
        if ($isMember) {
            $message = 'This email is already registered.';
            $isAvailbale = false;
            
        } 
        echo json_encode(array('valid' => $isAvailbale, 'message' => $message));
        exit;
    }
    function isRegisteredUserName(){
        $isMember = false;
        $this->autoRender = false;
        $this->layout = null;
        $emailId = $this->params['url']['sponcer'];
        $loginId = $this->checkMemberShip($emailId,1);
        if ((int) $loginId) {
            $isMember = true;
        }
        echo json_encode(array('valid' => $isMember));
        exit;
    }
    function isRegisteredEmail(){
        $isMember = false;
        $this->autoRender = false;
        $this->layout = null;
        $emailId = $this->params['url']['email'];
        $loginId = $this->checkMemberShip($emailId,null);
        if ((int) $loginId) {
            $isMember = true;
        }
        echo json_encode(array('valid' => $isMember));
        exit;
    }
    function saveContactUs(){
        $this->autoRender = false;
        $this->layout = null;
        //echo '<pre>';print_r($this->data);die;
        if (!empty($this->data)) {
            $id = $this->checkMemberShip($this->data['email'],null);
            if (!empty($id)) {
                $data['user_id'] = $id;
                $data['is_registered'] = 1;
            }else {
                $data['is_registered'] = 0;
            }
            $data['name'] = $this->data['name'];
            $data['email'] = $this->data['email'];
            $data['subject'] = $this->data['subject'];
            $data['comments'] = $this->data['message'];
            $this->Lead->create();
            $this->Lead->save($data);
            $response['message'] = "Thank you for contacting us we will revert you soon";
        } else {
            $response['message'] = "Something went wrong";
        }
        echo json_encode($response);
        exit;
    }
    function dashboard(){
        $this->layout = "dashboard";
        $this->_checkLogin();
        //$membership = $this->getMembership();
        $userData = $this->Session->read('User');
        $incomes = $this->Income->find('all');
        $this->set('incomes',$incomes);
        $this->set('userData',$userData);
    }
    function getMembership(){
        $userData = $this->Session->read('User');
        $this->autoRender = false;
        $this->layout = null;
        $data['BusinessPlan'] = $userData['package'];
        $loginData = $this->User->find('all', array(
            'conditions' => array('User.id > ' => $userData['id'] , 'payment' => 1)
        ));
        if (count($loginData) < 7 ) {
            $Membership = 'Bronze Club';
        } else if (count($loginData) < 14 ) {
            $Membership = 'Silver club';
        } else {
            $direct = $this->User->find('all', array(
                'conditions' => array('User.direct' => $userData['username'] , 'payment' => 1 , 'plan >=' =>100)
            ));
            if (count($direct) >= 3) {
                $Membership = 'Diamond club';
            }
        }
        $data['membership'] =  $Membership;
        return $data;
    }
    function xxx(){
        $this->autoRender = false;
        $this->layout = null;
        $Blockchain = new \Blockchain\Blockchain();
        $Blockchain->setServiceUrl('http://localhost');
    }
}
