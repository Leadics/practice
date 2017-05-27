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
	public $uses = array('Country','State','City','User','Lead','Income','WithdrawalRequest','Shoping','Transaction');

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
        $this->Session->write('order',array());
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
        $this->Session->write('order',array());
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
        }  else if($login_detail['User']['status'] == 0){
            if($login_detail['User']['username'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
                $bank_detail = $this->UserBank->find('first', array( 'conditions' => array('user_id' => $login_detail['User']['id'],'is_active' =>1)));
                $data= $login_detail['User'];
                $this->Session->write('User',$data);
                $this->redirect( array( 'controller' => 'users', 'action' => 'doPayments' ) );
            } 
        }else if($login_detail['User']['status'] == 1){
                if($login_detail['User']['username'] == $this->data['email'] && $login_detail['User']['password'] == md5($this->data['password'])) {
                    $bank_detail = $this->UserBank->find('first', array( 'conditions' => array('user_id' => $login_detail['User']['id'],'is_active' =>1)));
                    $data= $login_detail['User'];
                    $this->Session->write('User',$data);
                    $this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ) );
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
        $data['User']['auth'] =  md5(time()."userbtc");
        $data['User']['country'] =  $this->data['country'];
        $data['User']['status'] = 0;
        $data['User']['r1'] = 0;
        if (!empty($data['User']['username'])) {
             $this->User->save($data);
        }
        $userId = $this->User->getLastInsertID();
       // echo $userId;die;
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
            $_POST = array();
            $this->data = array();
            unset($_POST);
            unset($this->data);
            $this->Session->setFlash('<h3 class="well text-success">Your registration is successful kindly login to your email to activate your account</h3>');
            $this->redirect( array( 'controller' => 'Pages', 'action' => 'index' ));
         } else if (TEMP == 1) {
            $this->Session->write('User', $data['User']);
            $this->Session->write('UserBank',$data['UserBank']);
            $this->redirect( array( 'controller' => 'users', 'action' => 'doPayments' ));
         }else {
            $this->Session->write('User', $data['User']);
            $this->Session->write('UserBank',$data['UserBank']);
            $this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ));
        }
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
        $loginData = $this->User->find('all', array(
            'group' =>'package'
        ));
        $userData = $this->Session->read('User');
        $this->set('summary',$responce);
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
    
    function myTeam(){
        $this->layout = 'dashboard';
        $userData = $this->Session->read('User');
        $in[0] = $userData;
        $in[0]['sponcer'] = $userData['username'];
        $in[0]['business'] = $this->getLRIncome($userData['email']);
        if($userData['payment'] == 1){
            $in[0]['image'] = ABSOLUTE_URL.'/img/green.png';
        } else {
            $in[0]['image'] = ABSOLUTE_URL.'/img/user.png';
        }
        $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?username='.$userData['username']),true);
        foreach ($arr as $key => $value) {
            $arr[$key]['business'] = $this->getLRIncome($value['email']);
            if($value['payment'] == 1){
                $arr[$key]['image'] = ABSOLUTE_URL.'/img/green.png';
                $arr[$key]['username'] = $value['username'];
            } else {
                $arr[$key]['username'] = $value['username'];
                $arr[$key]['image'] = ABSOLUTE_URL.'/img/user.png';
            }
        }
        $arr = array_merge((array)$in,(array)$arr);
        $this->set('use',$arr);
    }
    function mySubTree(){
        $this->layout = 'dashboard';
        $treeMail = $this->Session->read('tree');
        if (!empty($treeMail)) {
           $data = $this->User->find('first',array('conditions' => array ('username'=>$treeMail)));
           $userData = $data['User'];
        }else {
            $userData = $this->Session->read('User');
        }
        $in[0] = $userData;
        $in[0]['sponcer'] = $userData['username'];
        $in[0]['business']  = $this->getLRIncome($userData['username']);
        if($userData['payment'] == 1){
            $in[0]['image'] = ABSOLUTE_URL.'/img/green.png';
        } else {
            $in[0]['image'] = ABSOLUTE_URL.'/img/user.png';
        }
        $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?username='.$userData['username']),true);
        foreach ($arr as $key => $value) {
            $arr[$key]['business'] = $this->getLRIncome($value['username']);
            if($value['payment'] == 1){
                $arr[$key]['image'] = ABSOLUTE_URL.'/img/green.png';
            } else {
                $arr[$key]['image'] = ABSOLUTE_URL.'/img/user.png';
            }
        }
        $arr = array_merge((array)$in,(array)$arr);
        $this->set('use',$arr);
    }
    function makeSession($email){
        $this->Session->write('tree',$email);
        $this->redirect( array( 'controller' => 'users', 'action' => 'mySubTree' ) );
    }
    function myTeamSide($side = null){
        $this->layout = 'dashboard';
        $userData = $this->Session->read('User');
        $data = $this->User->find('all',array('conditions' => array ('sponcer'=>$userData['username'])));
        if ($side =='left') {
            $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?username='.$data[0]['User']['username']),true);
            $arr = array_merge($data[0],$arr);
        } else if($side == 'right') {
            $arr = json_decode(file_get_contents(ABSOLUTE_URL.'/team.php?username='.$data[1]['User']['username']),true);
            $arr = array_merge($data[1],$arr);
        }
        $this->set('availablePin',$arr);
        $this->set('side',$side);
    }
    function buildOrder(){
        $this->layout = 'dashboard';
        $this->Session->write('order',array());
        $id = $this->_checkLogin();
        if (!empty($this->data)) {
            if ($this->data['amount'] >=99 &&  $this->data['amount'] < 300) {
                $item = 'LEARNER';
            }else if ($this->data['amount'] >=300 &&  $this->data['amount'] < 700) {
                $item = 'PRE–TRADER';
            }else if ($this->data['amount'] >=700 &&  $this->data['amount'] < 1500) {
                $item = 'TRADER';
            }else if ($this->data['amount'] >=1500 &&  $this->data['amount'] < 5000) {
                $item = 'PR0–TRADER';
            }else if ($this->data['amount'] >=5000 &&  $this->data['amount'] < 10000) {
                $item = 'MERCHANT' ;
            }else if ($this->data['amount'] >=10000) {
                $item = 'EXCHANGER' ;
            }
            $keyword['item'] = $item;
            $keyword['user_id'] = $id;
            $keyword['amount'] = $this->data['amount'];
            $keyword['price'] = $this->data['amount'];
            $keyword['status'] = 0;
            $keyword['description'] = "Buying ".$item." plan";
            $this->Shoping->save($keyword);
            $keyword['order_id'] = $this->Shoping->getLastInsertID();
            if (!empty($keyword['order_id'])) {
                $this->Session->write('order',$keyword);
                $this->redirect( array( 'controller' => 'users', 'action' => 'doPayments' ) );
            }else{
                $this->Session->write('order',array());
                $this->data = array();
                $this->redirect( array( 'controller' => 'users', 'action' => 'buildOrder' ) );
            }
        }
    }
    function doPayments(){
        $this->layout = 'dashboard';
        $userData = $this->Session->read('User');
        $keyword = explode(",", $keyword);
        if (empty($userData['id'])) {
            $this->redirect( array( 'controller' => 'pages', 'action' => 'home' ) );
        }
        $keyword = $this->Session->read('order');
        $keyword['auth_string'] = md5(time('now').$userData['id']);
        if (empty($keyword['item'])) {
            $keyword['item'] = 'Subscription';
            $keyword['user_id'] = $userData['id'];
            $keyword['amount'] = 10;
            $keyword['price'] = 10;
            $keyword['status'] = 0;
            $this->Shoping->save($keyword);
            $keyword['order_id'] = $this->Shoping->getLastInsertID();
            $data['registration'] = 1;
        }
        $data['m_shop'] =  '355769670'; 
        $data['m_orderid'] =   $keyword['order_id'];  
        $data['m_amount'] =   number_format($keyword['amount'],2,   '.',   '');  
        $data['m_curr'] =   'USD'; 
        $data['m_desc'] =  base64_encode($keyword['description']);
        $data['m_key'] = '8923317589';
        $data['arHash']  =  array($data['m_shop'],$data['m_orderid'],$data['m_amount'],$data['m_curr'],$data['m_desc']);
        $data['arParams'] =   array('success_url'  =>   ABSOLUTE_URL.'/success?auth='.$keyword['auth_string'].'&user_id='.$userData['id'].'&keyword='.$keyword['item'],'fail_url'  =>   ABSOLUTE_URL.'/fail?auth='.$keyword['auth_string'].'&user_id='.$userData['id'].'&keyword='.$keyword['item'],'status_url'  =>   ABSOLUTE_URL.'/status','reference' =>   array('user_id' =>   '1','auth' =>   '2','amount' =>'3'));
        $data['key']   =   md5('8923317589'.$data['m_orderid']);
        $data['m_params'] =   urlencode(base64_encode(openssl_encrypt(json_encode($data['arParams']),'AES-256-CBC', $data['key'],   OPENSSL_RAW_DATA)));
        $data['arHash'][] =   $data['m_params'];
        $data['arHash'][]  =   $data['m_key'];
        $data['sign']  =   strtoupper(hash('sha256', implode(':', $data['arHash'])));
        $this->set('data',$data);
        $this->set('keyword',$keyword);
    }
    //////////////******  BITPAY*****////////////////////
    // function createKey(){
    //     $this->autoRender = false;
    //     $this->layout = null;
    //     $privateKey = new \Bitpay\PrivateKey('../tmp/bitpay.pri');
    //     $privateKey->generate();
    //     $publicKey = new \Bitpay\PublicKey('../tmp/bitpay.pub');
    //     $publicKey->setPrivateKey($privateKey);
    //     $publicKey->generate();
    //     $storageEngine = new \Bitpay\Storage\FilesystemStorage();
    //     $storageEngine->persist($privateKey);
    //     $storageEngine->persist($publicKey);
    // }
    // function temp(){
    //     $this->autoRender = false;
    //     $this->layout = null;
    //     $this->createKey();
    //     $storageEngine = new \Bitpay\Storage\FilesystemStorage();
    //     $privateKey = $storageEngine->load('../tmp/bitpay.pri');
    //     $publicKey = $storageEngine->load('../tmp/bitpay.pub');
    //     $sin = \Bitpay\SinKey::create()->setPublicKey($publicKey)->generate();
    //     $client = new \Bitpay\Client\Client();
    //     $network = new \Bitpay\Network\Testnet();
    //     $adapter = new \Bitpay\Client\Adapter\CurlAdapter();
    //     $client->setPrivateKey($privateKey);
    //     $client->setPublicKey($publicKey);
    //     $client->setNetwork($network);
    //     $client->setAdapter($adapter);
    //     $pairingCode = 'xrtqQpE';
    //     $token = $client->createToken(
    //      array(
    //      'pairingCode' => $pairingCode,
    //      'label' => 'Some description...',
    //      'id' => (string) $sin,
    //      )
    //     );
    //     $persistThisValue = $token->getToken();
    //     echo ($persistThisValue . PHP_EOL);die;
    //     //return ($persistThisValue . PHP_EOL);
    // }
    // function createInvoice(){
    //     $this->autoRender = false;
    //     $this->layout = null;
    //     $storageEngine = new \Bitpay\Storage\FilesystemStorage();
    //     $privateKey = $storageEngine->load('../tmp/bitpay.pri');
    //     $publicKey = $storageEngine->load('../tmp/bitpay.pub');
    //     $client = new \Bitpay\Client\Client();
    //     $network = new \Bitpay\Network\Testnet();
    //     $adapter = new \Bitpay\Client\Adapter\CurlAdapter();
    //     $client->setPrivateKey($privateKey);
    //     $client->setPublicKey($publicKey);
    //     $client->setNetwork($network);
    //     $client->setAdapter($adapter);
    //     $token = new \Bitpay\Token();
    //     $token->setToken('KscEHkcgnfg71LVuVerqC3');
    //     $client->setToken($token);
    //     $invoice = new \Bitpay\Invoice();
    //     $item = new \Bitpay\Item();
    //     $item->setCode('23313');
    //     $item->setDescription('General Description of Item');
    //     $item->setPrice('1.99');
    //     $invoice->setItem($item);
    //     $invoice->setCurrency(new \Bitpay\Currency('USD'));
    //     $client->createInvoice($invoice);
    //     echo 'Success! Created invoice "' . $invoice->getId() . '". See ' . $invoice->getUrl() . PHP_EOL;
    // }
    //////////////******  BITPAY*****////////////////////
    function transactions(){
        $id = $this->_checkLogin();
        $this->layout = "dashboard";
        $userData = $this->Session->read('User');
        $UserArray = $this->WithdrawalRequest->find('all', array( 'conditions' => array('user_id' => $id)));
        $this->set('UserArray',$userData);
        $this->set('NameArray', $UserArray);
    }
    function contactUs(){
        $this->layout = "dash";
        if ($this->data) {
            $userId = $this->checkMemberShipEmail($this->data['email']);
            if (!empty($userId)) {
                $data['Lead']['is_registered'] = 1;
                $data['Lead']['user_id'] = $userId;
            }
            $file = (isset($_FILES["File1"]) ? $_FILES["File1"] : 0);
            $link = $this->moveFile($file);
            $data['Lead'] = $this->data;
            $data['Lead']['attachment'] = $link;
            $this->Lead->save($data);
            $message['name'] =  $this->data['name'];
            $message['email'] =  $this->data['email'];
            $m = $this->sendMail($message['email'], $message, "Thanks your for reaching us.", 'success','contact-us');
            $this->Session->setFlash('<h2 class="well text-success">Thank you for your query we will get back to you shortly</h2>');
            $this->redirect( array( 'controller' => 'pages', 'action' => 'dashboard' ) );
        }
    }
    function setting(){
        $this->layout = 'dashboard';
        $country = $this->Country->find('all');
        $this->set('country',$country);
        $this->_checkLogin();
    }
    function editProfileSave(){
        $this->autoRender = false;
        $this->layout = null;
        $id = $this->_checkLogin();
        $data['User'] =  $this->Session->read('User');
        $data['User']['name'] =  $this->data['name'];
        $data['User']['id'] =  $id;
        $data['User']['mobile'] =  $this->data['mobile'];
        $data['UserBank']['bank_name'] =  $this->data['bank_name'];
        $data['UserBank']['account_number'] =  $this->data['account_number'];
        $data['UserBank']['act_name'] =  $this->data['act_name'];
        $data['UserBank']['ifsc_code'] =  $this->data['ifsc_code'];
        $data['UserBank']['branch'] =  $this->data['branch'];
        $data['User']['state'] =  $this->data['state'];
        $data['User']['city'] =  $this->data['city'];
        $data['User']['country'] =  $this->data['country'];
        $this->User->id=$id;
        $this->User->save($data);
        $data['UserBank']['user_id'] = $id;
        $data['UserBank']['id'] = $this->data['bank_id'];
        $this->UserBank->id = $this->data['bank_id'];
        $this->UserBank->save($data);
        $this->Session->write('User',$data['User']);
        $this->Session->write('UserBank',$data['UserBank']);
        $this->Session->setFlash('<h2 class="text-success">Profile Updated Successfully</h2>');
        $this->redirect( array( 'controller' => 'users', 'action' => 'dashboard' ));
    }
    function wallet(){
        $this->layout = 'dashboard';
        $userData = $this->Session->read('User');
        App::import('Controller', 'Crons');
        $CronsController = new CronsController;
        $binary = json_decode($CronsController->calculateBinary($userData['id']),true);
        $referal = json_decode($CronsController->calculateReferals($userData['id']),true);
        $singleLag = json_decode($CronsController->calculateSingleLag($userData['id']),true);
        $roi = json_decode($CronsController->getRoi($userData['id']),true);
        $data['binary'] = $binary['binary'];
        $data['referal'] = $referal['referal'];
        $data['singleLag'] = $singleLag['singlelag'];
        $data['roi'] = $roi['roi'];
        $this->set('data',$data);
        $this->render('wallet');
    }
    function withdraw(){
        $id = $this->_checkLogin();
        if (!empty($this->data)) {
            $data['user_id'] = $id;
            $data['is_paid'] = 0;
            $data['binary'] = $this->data['binary'];
            $data['referal'] = $this->data['referal'];
            $data['single_lag'] = $this->data['single_lag'];
            $data['roi'] = $this->data['roi'];
            $data['total'] = $this->data['total'];
            $this->WithdrawalRequest->save($data);
            $this->Session->setFlash('<h3 class="well text-success">Withdraw request submitted successfully</h3>');
        }
        $this->redirect( array( 'controller' => 'users', 'action' => 'dashboard'));
    }
    function passwordReset($id , $auth){
        $this->layout = 'dashboard';
        if (empty($auth) || empty($id)) {
            $this->redirect( array( 'controller' => 'users', 'action' => 'logout' ) );
        }
        if ( $auth == 1) {
           $id = $this->_checkLogin();
        }else{
            $this->redirect( array( 'controller' => 'users', 'action' => 'logout' ) );
        }
        $this->set('userId',$id);
    }
    function savePass(){
        if (!empty($this->data)) {
            $this->User->id = $this->data['user_id'];
            $userData['User']['password'] =  md5($this->data['password']);
            $this->User->save($userData);
        }
        $this->Session->setFlash('<h2 class="well text-success">Password reset successfully please login</h2>');
        $this->redirect( array( 'controller' => 'users', 'action' => 'logout' ) );
    }
}
