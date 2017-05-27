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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User','UserWallet','DailyStatus','Income','UserBank','WithdrawalRequest','Lead','Transaction','Testimonial','Shoping');

/**
 * Displays a view
 *
 * @return \Cake\Network\Response|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	
	function adminDashboard(){
		$this->__checkAdminLogin();
		$this->layout = "admin_dash";
		$rejectedHelp = 0;
		$approvedHelp = 0;
		$availableRevenew = 0;
		$blockedUsers = 0;
		$blockedHelp = 0;
		$availableRevenue = 0;
		$totalActiveUsers = 0;
        $totalRegAmount = 0;
        $inactiveUsers = 0;
        $approvedUsers = 0;
        $totalHelps = 0;
		$users = $this->User->find('all',array('conditions' =>array('is_admin !=' =>1)));
		foreach ($users as $key => $value) {
			if ($value['User']['status'] == 1) {
				$totalActiveUsers++;
			} else {
				$blockedUsers++;
			}
            if (!empty($value['User']['package_money'])) {
                $totalHelps++;
                $availableRevenue = $availableRevenue+$value['User']['package_money'];
            }
            if (empty($value['User']['payment'])) {
                $inactiveUsers++;
            } else if ($value['User']['payment'] == 1) {
                $approvedUsers++;
                $totalRegAmount = $totalRegAmount+10;
            }
		}
        $usersList =  $this->User->find('list',array('conditions' =>array('is_admin !=' =>1),'fields'=>'username'));
		$responce[0]['key'] = 'Total Active Users';
		$responce[0]['val'] = $totalActiveUsers;
		$responce[1]['key'] = 'Total Inactive Users';
		$responce[1]['val'] = $blockedUsers;
		$responce[2]['key'] = 'Users Bought package';
		$responce[2]['val'] = $totalHelps; 
		// $responce[3]['key'] = 'Total Rejected Donations';
		// $responce[3]['val'] = $rejectedHelp; 
		// $responce[4]['key'] = 'Total Approved Donations';
		// $responce[4]['val'] = $approvedHelp; 
		// $responce[5]['key'] = 'Total Blocked Donations';
		// $responce[5]['val'] = $blockedHelp; 
		// $responce[7]['key'] = 'Available Donation Amount';
		// $responce[7]['val'] = $availableRevenew.'  N';
        $responce[4]['key'] = 'Total Unpaid Users';
        $responce[4]['val'] = $inactiveUsers;
        $responce[3]['key'] = 'Total Paid Users';
        $responce[3]['val'] = $approvedUsers; 
        $responce[8]['key'] = 'Total Revenew';
        $responce[8]['val'] = $availableRevenue.'  Rs.';
        $responce[8]['key'] = 'Total Registration Amount';
        $responce[8]['val'] = $totalRegAmount.'  USD';
		$req = $this->Shoping->find('all',array('conditions'=>array('status'=>0)));
        $this->set('usersList',$usersList);
		$this->set('Requests',$req);
		$this->set('summary',$responce);
	}
	function approveRequest($id,$auth){
		$this->autoRender = false;
        $this->layout = null;
        $adminId = $this->__checkAdminLogin();
        if (!empty($id)) {
            $lData = $this->Shoping->find('first', array('conditions' => array('id' => $id,'auth_string' => $auth)));
            $d['user_id'] = $lData['Shoping']['user_id'];
            $d['amount'] = $lData['Shoping']['price'];
            $d['shoping_id'] = $id;
            $this->Transaction->save($d);
            $this->Shoping->updateAll(array("status"=>1),array("id"=>$id,'auth_string'=>$auth));
            if ($lData['Shoping']['item'] == 'Subscription') {
                $this->User->updateAll(array("status"=>1,'payment'=>1),array("id"=>$lData['Shoping']['user_id']));
            } else {
                $this->User->updateAll(array("package_money"=>$lData['Shoping']['price'],'package' =>$lData['Shoping']['item'],'payment'=>1),array("id"=>$lData['Shoping']['user_id']));
            }
	       $this->Session->setFlash('<h2 class="text-success">Transaction Accepted</h2>');
        } else {
            $this->Session->setFlash('<h2 class="text-danger">Request can not procced</h2>');
        }
        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
    function usersList($source = null , $internal = null){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
            if ($sortKey != 'games') {
                if (empty($dir)) {
                    $dir = 'DESC';
                }
                $order = $sortKey." ".$dir;
            }
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
        	if ($this->data['search_by'] == 'created') {
        		$filter = "User.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
        	} else{
        		$filter = "User.".$this->data['search_by']." = '".$this->data['value']."'";
        	}
        } else {
        	$filter = "";
        }
        $result =  $this->User->find('all', array('conditions' => array('User.name LIKE' =>"$filt%" , $filter),'order'=>$order));
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
        if ($internal == 'internal') {
    		$this->autoRender = false;
    		return $result;
    	}
    }
    function editUser($id){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if (!empty($id)) {
             $result =  $this->User->find('first', array('conditions' => array('User.id'=>$id)));
             $bank =  $this->UserBank->find('first', array('conditions' => array('UserBank.user_id'=>$id,'is_active'=>1)));
             $this->set('bank',$bank);
             $this->set('user',$result);
        }
    }
    function blockUser($id){
	$this->autoRender = false;
	    $this->layout = "";
    	$this->__checkAdminLogin();
    	if (!empty($id)) {
    		$this->User->updateAll(array('status' => 2),array("id"=>$id));
    	}
    	$this->Session->setFlash('<h2 class="text-success">User Blocked Succesfully</h2>');
    	$this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
    function rejectHelp($id,$user_type){
        if (!empty($id) && $id !=0) {
            if ($user_type == 'recipient') {
                $status = 7;
            } else {
                $status = 8;
            }
            $this->GiveHelp->id = $id;
            $tmp['status']  = $status = 8;
            $tmp['reciver_id']  = "";
            $tmp['is_paid']  = 0;
            $tmp['attachment']  = "";
            $tmp['responce_file'] = "";
            $this->GiveHelp->save($tmp);
            $this->RejectedHelp->save(array('helpid' =>$id,'user_type'=>$user_type));
            $this->Session->setFlash('<h2 class="text-success">Request Recieved you will get Other recipient soon</h2>');
        } 
        return 1;
    }
    function unBlockUser($id){
    	$this->__checkAdminLogin();
    	if (!empty($id)) {
    		$this->User->updateAll(array('status' => 1),array("id"=>$id));
    	}
    	$this->Session->setFlash('<h2 class="text-success">User Activated Succesfully</h2>');
    	$this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
    function transactionList($source = null){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
        	if ($this->data['search_by'] == 'created') {
        		$filter = "Shoping.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
        	} else{
        		$filter = "Shoping.".$this->data['search_by']." = '".$this->data['value']."'";
        	}
        } else {
        	$filter = "";
        }
        $result =  $this->Shoping->find('all');
        $users = Set::classicExtract($result, "{n}.Shoping.user_id");
        $userList =  $this->User->find('list', array('fields'=>'User.name','conditions' => array('User.id' => $users)));
        $this->set('userList', $userList);
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
    }
    function leads($source = null){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
            if ($sortKey != 'games') {
                if (empty($dir)) {
                    $dir = 'DESC';
                }
                $order = $sortKey." ".$dir;
            }
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
        	if ($this->data['search_by'] == 'created') {
        		$filter = "Lead.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
        	} else{
        		$filter = "Lead.".$this->data['search_by']." = '".$this->data['value']."'";
        	}
        } else {
        	$filter = "";
        }
        $result =  $this->Lead->find('all', array('conditions' => array('Lead.name LIKE' =>"$filt%" ,$filter),'order'=>$order));
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        //echo '<pre>';print_r($result);die;
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
    }
    function testimony($source = null){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
            if ($sortKey != 'games') {
                if (empty($dir)) {
                    $dir = 'DESC';
                }
                $order = $sortKey." ".$dir;
            }
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
        	if ($this->data['search_by'] == 'created') {
        		$filter = "Testimonial.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
        	} else{
        		$filter = "Testimonial.".$this->data['search_by']." = '".$this->data['value']."'";
        	}
        } else {
        	$filter = "";
        }
        $result =  $this->Testimonial->find('all', array('conditions' => array('Testimonial.name LIKE' =>"$filt%" ,$filter),'order'=>$order));
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        //echo '<pre>';print_r($result);die;
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
    }
    function setOrRemove($id,$status){
    	if (!empty($status) && !empty($id)) {
    		$this->Testimonial->updateAll(array("set_to_wall"=>$status),array("id"=>$id));
    	}
    	$this->Session->setFlash('<h2 class="text-success">Testimonial operation saved succesfully</h2>');
    	$this->redirect( array( 'controller' => 'admin', 'action' => 'testimony' ) );
    }
    function approveUsers($source = null ){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
            if ($sortKey != 'games') {
                if (empty($dir)) {
                    $dir = 'DESC';
                }
                $order = $sortKey." ".$dir;
            }
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
        	if ($this->data['search_by'] == 'created') {
        		$filter = "User.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
        	} else{
        		$filter = "User.".$this->data['search_by']." = '".$this->data['value']."'";
        	}
        } else {
        	$filter = "";
        }
        $result =  $this->User->find('all', array('conditions' => array('User.name LIKE' =>"$filt%" , $filter,'status' =>1),'order'=>$order));
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
        if ($internal == 'internal') {
    		$this->autoRender = false;
    		return $result;
    	}
    }
    function assignDonor($id = null){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
    	$result =  $this->GiveHelp->find('all',array('conditions' => array( 'GiveHelp.status' => 1 , 'GiveHelp.is_paid' =>0, '(GiveHelp.reciver_id is null OR GiveHelp.reciver_id="")' , '(GiveHelp.attachment is null OR GiveHelp.attachment="")','donator_id !='=> $id)));
    	$donors = Set::classicExtract($result, "{n}.GiveHelp.donator_id");
    	$donorsList =  $this->User->find('list', array('fields'=>'User.name','conditions' => array('User.id' => $donors)));
    	$users = $this->usersList('','internal');
    	$this->set('usersList',$users);
    	$this->set('userToDonate',$id);
    	$this->set('donorsList', $donorsList);
    	$this->set('donations', $result);
    	$this->render('assign_donor');
    }
    function assignGetHelp(){
    	if (!empty($this->data['reciever_id']) && !empty($this->data['GiveHelpId'])) {
    		$this->GiveHelp->updateAll(array("reciver_id"=>$this->data['reciever_id'],'created'=>'NOW()'),array("id"=>$this->data['GiveHelpId']));
    		$this->Session->setFlash('<h2 class="text-success">Donation assigned succesfully</h2>');
    	}
    	$this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
    function acceptRequest($giveHelpId){
    	if (!empty($giveHelpId)) {
    		$this->GiveHelp->updateAll(array("status"=>0 , 'is_paid' =>1),array("id"=>$giveHelpId));
            $help = $this->GiveHelp->find('first',array('conditions' => array("id"=>$giveHelpId)));
            $this->User->updateAll(array("expacting"=>1 , 'cant_pay' =>0 , 'status' =>1 ),array("id"=>$help['GiveHelp']['donator_id']));
	        $wallet['UserWallet']['user_id'] = $help['GiveHelp']['donator_id'];
            $wallet['UserWallet']['amount'] = $help['GiveHelp']['amount'];
            $wallet['UserWallet']['help_id'] = $giveHelpId;
            $wallet['UserWallet']['status'] = 1;
            $this->UserWallet->save($wallet);    		
            $this->Session->setFlash('<h2 class="text-success">Donation accepted succesfully</h2>');
    	}
    	$this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
    function setWeekly(){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
    	if (!empty($this->data)) {
            $this->DailyStatus->updateAll(array('status' =>0));
            foreach ($this->data as $key => $value) {
                $v['plan'] = $key;
                $v['roi'] = $value;
                $v['status'] = 1;
                $this->DailyStatus->create();
                $this->DailyStatus->save($v);
            }
            $this->Session->setFlash('<h2 class="text-success">Limit Updated succesfully</h2>');
            $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
        }
    }
    function editProfileSave(){
        $this->autoRender = false;
        $this->layout = null;
        $data['User']['name'] =  $this->data['name'];
        $data['User']['id'] =  $this->data['user_id'];
        $data['User']['email'] =  $this->data['email'];
        $data['User']['mobile'] =  $this->data['mobile'];
        $data['User']['location'] =  $this->data['location'];
        $data['UserBank']['bank_name'] =  $this->data['bank_name'];
        $data['UserBank']['account_number'] =  $this->data['account_number'];
        $data['UserBank']['act_name'] =  $this->data['act_name'];
        $data['User']['donation'] =  $this->data['donation'];
        $data['User']['state'] =  $this->data['state'];
        $this->User->id=$this->data['user_id'];
        $this->User->save($data);
        $data['UserBank']['user_id'] = $this->data['user_id'];
        $data['UserBank']['id'] = $this->data['bank_id'];
        $this->UserBank->id = $this->data['bank_id'];
        $this->UserBank->save($data);
        $this->Session->setFlash('<h2 class="text-success">Profile Updated Successfully</h2>');
        $this->redirect( array( 'controller' => 'pages', 'action' => 'dashboard' ));
    }
    function createAdmin(){
    	$this->layout = "admin_dash";
		$this->__checkAdminLogin();
    	if (!empty($this->data)) {
    		$this->autoRender = false;
	        $this->layout = null;
	        $data['User']['name'] =  $this->data['name'];
	        $data['User']['email'] =  $this->data['email'];
	        $data['User']['mobile'] =  $this->data['mobile'];
	        $data['User']['password'] =  md5($this->data['password']);
	        $data['User']['expacting'] =  0;
	        $data['User']['location'] =  $this->data['location'];
	        $data['UserBank']['bank_name'] =  $this->data['bank_name'];
	        $data['UserBank']['account_number'] =  $this->data['account_number'];
	        $data['UserBank']['act_name'] =  $this->data['act_name'];
	        $data['User']['donation'] =  $this->data['donation'];
	        $data['User']['state'] =  $this->data['state'];
	        $data['User']['status'] = 1;
	        $data['User']['is_admin'] = 1;
	        $this->User->save($data);
	        $userId = $this->User->getLastInsertID();
	        $data['UserBank']['user_id'] = $userId;
	        $this->UserBank->save($data);
	        $bankId = $this->UserBank->getLastInsertID();
	        $data['User']['id'] = $userId;
	        $data['UserBank']['id'] = $bankId;
	        $this->Session->setFlash('<h2 class="text-success">Admin Added Successfully</h2>');
	        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ));
    	}
    }
    function rejectedDonations($source = null){
        $this->layout = "admin_dash";
        $this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
            if ($this->data['search_by'] == 'created') {
                $filter = "GiveHelp.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
            } else{
                $filter = "GiveHelp.".$this->data['search_by']." = '".$this->data['value']."'";
            }
        } else {
            $filter = "";
        }
        $result =  $this->GiveHelp->find('all',array('conditions' => array('status !=' => array(1,0,5))));
        $users1 = Set::classicExtract($result, "{n}.GiveHelp.donator_id");
        $users2 = Set::classicExtract($result, "{n}.GiveHelp.reciver_id");
        $users = array_unique (array_merge ($users1, $users2));
        $userList =  $this->User->find('list', array('fields'=>'User.name','conditions' => array('User.id' => $users)));
        $this->set('userList', $userList);
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
    }
    function deleteDonation($id){
        if (!empty($id)) {
            $this->GiveHelp->deleteAll(array("id" => $id));
            $this->User->updateAll(array("User.status"=>9 ),array("User.id"=>$data['GiveHelp']['donator_id']));
            $this->Session->setFlash('<h2 class="text-success">Deleted Successfully</h2>');
        }
        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ));
    }
    function addUserWallet(){
        $this->layout = "admin_dash";
        $this->__checkAdminLogin();
        $users =  $this->User->find('all', array('conditions' => array('User.status' => 1)));
        $this->set('usersList',$users);
    }
    function addWalletToUser(){
        $this->__checkAdminLogin();
        if (!empty($this->data)) {
            $wallet['Income']['user_id'] = $this->data['user_id'];
            $wallet['Income']['binary'] = $this->data['binary'];
            $wallet['Income']['referal'] = $this->data['referal'];
            $wallet['Income']['single_lag'] = $this->data['single_lag'];
            $wallet['Income']['weekly'] = $this->data['weekly'];
            $this->Income->save($wallet);
            $this->Session->setFlash('<h2 class="text-success">Wallet Added Succesfully</h2>');
        }
        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ));
    }
    function approveUserEmails(){
        $this->layout = "admin_dash";
        $this->__checkAdminLogin();
        $users =  $this->User->find('all', array('conditions' => array('User.status' => 0)));
        $this->set('usersList',$users);
    }
    function approveEmail($id){
        $this->__checkAdminLogin();
        if (!empty($id)) {
            $this->User->id = $id;
            $this->User->save(array('status' => 1));
        }
        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ));
    }
    function editTransaction($id){
        $this->__checkAdminLogin();
        $this->layout='dashboard';
        $txt =  $this->Shoping->find('first', array('conditions' => array('Shoping.id' => $id)));
        $this->set('txt',$txt);
        if (!empty($this->data['price'])) {
            $this->Shoping->id = $id;
            $this->Shoping->save($this->data);
            $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ));
        }
    }
    function withdrawList(){
        $this->layout = "admin_dash";
        $this->__checkAdminLogin();
        if ($maxPageNumber > $temMax) {
            $maxPageNumber = $temMax + 1;
        }
        if( !empty($this->params['url']['filter'] )) {
            $attr = $this->params['url']['filter'];
            $dir = $this->params['url']['dir'];
        }
        $this->set('maxPageNumber', $maxPageNumber);
        $this->set('start', $tempSeq);
        $this->set('linkdata', $data);
        if( !empty($this->params['url']['page'] )) {
            $filt = $this->params['url']['page'];
        }
        if( !empty($this->params['url']['filter'] )) {
            $sortKey = $this->params['url']['filter'];
            $dir  = $this->params['url']['dir'];
        }
        if ($source == 'filter' && !empty($this->data['search_by'])) {
            if ($this->data['search_by'] == 'created') {
                $filter = "WithdrawalRequest.created  <='".date( "Y-m-d H:i:s", strtotime( $this->data['value']))."'";
            } else{
                $filter = "WithdrawalRequest.".$this->data['search_by']." = '".$this->data['value']."'";
            }
        } else {
            $filter = "";
        }
        $result =  $this->WithdrawalRequest->find('all');
        $users = Set::classicExtract($result, "{n}.WithdrawalRequest.user_id");
        $userList =  $this->User->find('list', array('fields'=>'User.username','conditions' => array('User.id' => $users)));
        $this->set('userList', $userList);
        if ($dir == 'DESC') {
            $dir = 'ASC';
        } else {
            $dir = 'DESC';
        }
        $this->set('dir', $dir);
        $this->set('NameArray', $result);
    }
    function withdrawAction($type,$id){
        if (!empty($type) && !empty($id)) {
            switch ($type) {
                case 'paid':
                    $status = 1;
                    $rsp = 'Marked Paid';
                    break;
                case 'Block':
                    $status = 2;
                    $rsp = 'Blocked';
                    break;
                case 'unblock':
                    $status = 0;
                    $rsp = 'UnBlocked';
                    break;
            }
            $this->WithdrawalRequest->updateAll(array('is_paid' => $status),array("id"=>$id));
            $this->Session->setFlash('<h2 class="text-success">Request '.$rsp.' Succesfully</h2>');
        }
        $this->redirect( array( 'controller' => 'admin', 'action' => 'adminDashboard' ) );
    }
}

