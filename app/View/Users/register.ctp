<style type="text/css">
  .text-bold{color:#000000 ;}
  .margin-top-minus-40 {
        margin-top: -40px!important;
    }
  .navigation {
      background:transparent!important;
      
  }
  .navbar-default{
    background-color: #f8f8f800!important;
    border: none!important;
  }
  .control-label{color:black;}
  @media(max-width:500px) {
        .margin-top-minus-40 {
            margin-top: 0px!important;
        }
        .drop-shadow {
            -webkit-box-shadow: 0 0  rgba(0, 0, 0, 0); 
            box-shadow: 0 rgba(0, 0, 0, 0); 
        }
      }
</style>
<div class="intro-header" style="background-image: url('<?php echo ABSOLUTE_URL; ?>/img/2.jpg');min-height: 225px;margin-bottom: 3%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading" >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-header">
    <div class="container">
    <div class="row" >
        <div class="drop-shadow col-md-12 margin-top-minus-40"  style="">
            <div style="margin-top: 10px;">
                <h3 class="text-success"><strong>Create Your Account</strong></h3>
            </div>
            <div>
                <form id="regFormNew" method="POST" action="<?php echo ABSOLUTE_URL;?>/users/signUp" data-toggle="validator" >
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="Name" class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" title="Please enter your password">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >User Name</label>
                        <input type="text" class="form-control" minlength="5" id="username" name="username" title="Please enter you username" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="email" class="control-label" >Email</label>
                        <input type="text" class="form-control" id="email" name="email" title="Please enter you username" placeholder="example@gmail.com" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="mobile" class="control-label">Mobile</label>
                        <input type="text" maxlength="10"  minlength="10" class="form-control" id="mobile" name="mobile" title="Please enter your mobile number">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="age" class="control-label">Sponcer</label>
                        <input type="text" class="form-control" id="sponcer" name="sponcer" required="" title="Please enter your sponcer">
                        <input type="radio" required  title="Please select a placment" name="side" value="left">&nbsp;&nbsp;Left&nbsp;
                        <input type="radio" required  title="Please select a placment" name="side" value="right">&nbsp;&nbsp;Right
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="passwordFirsh" name="password" title="Please enter your password">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12 pull-left">
                        <label for="password" class="control-label">Retype Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" title="Please re-enter your password">
                        <span class="help-block"></span>
                    </div>
                  <div class="form-group control-group controls col-xs-12 col-md-6">
                        <label for="type_of_employment" class="control-label">Country</label>
                        <select  required="" onchange="getAjax(this.id,'state');" class="form-control" id="country" name="country"  title="Please enter your country">
                            <option value="">Please select your country</option>
                            <?php foreach ($country as $key => $value) {?>
                                <option value="<?php echo $value['Country']['id'];?>"><?php echo $value['Country']['name'];?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12 col-md-6">
                        <label for="type_of_employment" class="control-label">State</label>
                        <select value=""  required="" onchange="getAjax(this.id,'city');" class="form-control" id="state" name="state"  title="Please enter your state">
                            <option  value="">Please select your state</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-xs-12 col-md-6">
                        <label for="type_of_employment" class="control-label">City</label>
                        <select    required="" class="form-control" id="city" name="city"  title="Please enter your city">
                            <option value="">Please select your city</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="bankName" class="control-label">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" title="Please enter your bank name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="accountNumber" class="control-label" >Account Number</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" title="Please enter you account number" required="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="ifsc" class="control-label">Account Name</label>
                        <input  class="form-control" id="act_name" name="act_name" title="Please enter your account name">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group control-group controls col-md-6 col-xs-12">
                        <label for="ifsc" class="control-label">Ifsc</label>
                        <input  class="form-control" id="ifsc" name="ifsc" title="Please enter ifsc code">
                        <span class="help-block"></span>
                    </div>
                   
                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                  
                <div class="panel-heading col-md-6" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a href="javascript:openCloseTand();" id="collapseToggle" >
                        <small>By clicking on the Submit button, the USER is consenting to be bound by and is becoming a party to this Agreement. </small>
                           Terms and conditions
                        </a>
                    </h4>
                </div>
               <div class="form-group control-group controls col-md-6 col-xs-12 ">
                        <label for="type_of_employment" class="control-label">&nbsp;</label>
                        <button type="submit" style="padding-top: 10px;padding-bottom: 10px;" class="btn btn-primary btn-block pull-right">Sign Up</button>
                   </div>
                </form>
                
<div id="collapsehidden"  hidden>
                 </p>
<p>By clicking on the “ACCEPT / I AGREE” button,  the USER is consenting
 to be bound by and is becoming a party to this  Agreement. </p>
<p>If the USER does not agree to all of  the terms of this agreement, 
click the “DO NOT AGREE / CANCEL” button or leave  the website / 
terminate the Services. </p>
<p>These Terms of Use shall govern the  User’s use of and access to all of CoinIgyDex products and websites..<br>
    <br>
  The User agrees that: <br>
  <br>
  1. He / She is at least 18 years of age; is competent and of sound 
mind; and  has the authority to enter into this Agreement,&nbsp;<br>
  <br>
  2. The use of this website would be in compliance with Indian laws,&nbsp;<br>
  <br>
  3. This Agreement is binding and enforceable against him/her,&nbsp;<br>
  <br>
  4. To the extent an individual is accepting this Agreement on behalf 
of an  entity, such individual has the right and authority to agree to 
all of the  terms set forth herein on behalf of such entity, and&nbsp;<br>
  <br>
  5. That he / she has read and understands CoinIgyDex’s Privacy Policy, 
the terms  of which are posted at the Website and incorporated herein by
 reference (the  "Privacy Policy"), and agree to abide by the Privacy 
Policy.&nbsp;<br>
  <br>
  <strong>THIS WORK AGREEMENT (the “Agreement”)</strong>&nbsp;is valid and existing for  services registered online at CoinIgyDex, </p>
<p>This Agreement is effective after the  User has registered as 
Campaigner and from date of purchase of any of the  available package.<br>
    <br>
  This Work Agreement is entered into between “USER” the registered 
User;  hereinafter referred to as the “USER”, which expression shall, 
unless it be  repugnant to the context or meaning thereof be deemed to 
mean and include its  successors and permitted assign of the &nbsp;<strong>One Part;&nbsp;</strong><br>
  <br>
  <strong>AND&nbsp;</strong><br>
  <br>
  <strong>CoinIgyDex,&nbsp;</strong>a registered Company under the laws 
of India and having  its Operational office at 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(hereinafter
  referred to as the 
“&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  _____________”, which expression shall, unless it be repugnant to the 
 context or meaning thereof be deemed to mean and include its successors
 and  permitted assign) of the Other Part.&nbsp;<br>
  (The User and CoinIgyDex are hereinafter referred to individually as the “Party”  and collectively as “Parties”.)</p>
<p><strong>WHEREAS:</strong></p>
<ol>
  <li>CoinIgyDex Pvt. Ltd  is engaged in the business of Information and 
Technology Services and is the  owner of indigenously developed software
 and original business methods related  to virtual and IT related 
services.&nbsp;</li>
  <li>CoinIgyDex Pvt. Ltd uses original software and  business methods to
 provide IT solutions to individual customers and corporate  
customers.&nbsp;</li>
  <li>User is engaged in  the business as per details entered in the online registration form.&nbsp;</li>
  <li>The User is  desirous in working for CoinIgyDex for earning apart 
from its business  requirements including digital marketing and 
e-commerce.</li>
  <li>Relying on the  representations and covenants made and agreed by 
the User herein and believing  the same to be true and correct, coinigydex 
Media has accepted the offer to allow User  to work for them, subject to
 the terms and conditions as set forth in this  Agreement.</li>
</ol>
<p><br>
    <strong>NOW THIS  AGREEMENT WITNESSETH AND IT IS HEREBY AGREED TO BY AND BETWEEN THE PARTIES  HERETO AS FOLLOWS :&nbsp;</strong><br>
    <br>
    <br>
    <strong>1. ENGAGEMENT AND SCOPE OF  WORK:</strong><br>
    <br>
  1.1.&nbsp;The User has paid  the full amount of the Campaign package 
(for campaigning his / her package),  which is available on the website 
www.coinigydex.com) and hence become entitled  to be registered as 
&nbsp;Free User and work  from Home for the CoinIgyDex.<br>
  1.2.&nbsp;The User is  to be responsible to ensure that he will act 
and abide by the terms and  conditions as specifically mentioned in this
 document and website of the  company i.e. www.coinigydexinfo.com.<br>
  1.3. Apart from above,  It is specifically agreed and understood by 
the User that the conditions as  mentioned on the website of the company
 and in this documents can be amended by  the Company at any time at its
 sole discretion. In this event, the company will  notifying the same by
 displaying the amendments on CoinIgyDex website.</p>
<p><strong>2. HOME BASED WORK:</strong><br>
    <strong><br>
  2.1.&nbsp;</strong>Company shall  provide part time work to the USER 
with the purchase of any of the available  Digital Marketing Package on 
the website www.coinigydex.com)<br>
  <strong>2.2.</strong>Part time work may  includes (Social Media 
Promotion, In-Organic Visits on Website &amp; Blogs,  Affiliate 
Advertisement and other online work)<br>
<strong>2.3.</strong> Company can  discontinue Part time work if work 
done by the customer is found fake or  scripted or skipped by customer 
without any prior information to company.</p>
<p><strong>3.PRICING &amp; PAYMENTS:</strong></p>
<p><strong>3.1.&nbsp;</strong> During the tenure  of this Agreement, coinigydex
 Media grants permission to the User to create a User  Account and 
access the Dashboard.<br>
    <strong>3.2.</strong> Company shall pay  to the User on per view 
basis. Price of per view shall be subjected to the  discretion of 
company which shall be notified to the service provider from time  to 
time. The price may increase or decrease pertaining competition in 
market.&nbsp;<br>
<strong>3.3.</strong>The invoice(s)  submitted by CoinIgyDex shall be 
subject to inspection and verification by the  User and any 
discrepancies therein shall be brought to the notice of CoinIgyDex  
within 7 days of receipt of the invoice(s). If necessary, CoinIgyDex 
shall  modify and provide an amended invoice(s).&nbsp;<br>
<strong>3.4.</strong> The Company shall  withhold taxes at applicable 
rates as required by law and provide necessary  certificates evidencing 
such deduction in due course. Service Tax is additional  as 
applicable.&nbsp;<br>
<strong>3.5.</strong> Company can hold  the work payment if work done by
 the customer is in investigation by the web  intelligence team. User is
 not guaranteeing any kind of fixed income or  business to coinigydex 
Media.&nbsp;<br>
<strong>3.6.</strong> Payment Modes will  only be following: <br>
Online NEFT/RTGS/IMPS transfers to  bank accounts of CoinIgyDex Pvt. Ltd,
 Cheques /DD drawn in favour of CoinIgyDex  Info Solutions Pvt. Ltd 
(payable 
at&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 ).&nbsp;<br>
<strong>3.7.</strong> All transactions  on the website through Company's registered payment gateways.</p>
<p><strong>4. COMPLIANCE WITH LAWS/WARRANTIES:</strong></p>
<p><strong>4.1.&nbsp;</strong>The User warrants  that: a) the 
assignment/work will be rendered in accordance with the  specifications 
as mentioned in this documents and terms and conditions as  mentioned on
 the company website i.e. www.coinigydexifno.com; b) the assignment will  be 
provided in accordance with the specifications and instructions of the  
Company;<br>
    <br>
    <br>
    <strong>4.2.&nbsp;</strong>Each Party shall be  individually 
responsible for ensuring compliance by them with all relevant  laws, 
rules and regulations or legal obligations relating to the subject 
matter  of this Agreement, including obtaining of any applicable 
registrations,  maintenance of registers, submission of returns to the 
authorities,  environmental/occupational health/safety regulations, etc.<br>
    <br>
    <br>
    <strong>4.3.&nbsp;</strong>The User shall  indemnify and hold the 
Company harmless in respect of any damage or loss that  the Company may 
suffer on account of any non compliance of User’s obligations  under 
relevant laws. The Service Provider shall on request provide necessary  
proof of the compliance in this regard.<br>
    <br>
    <br>
    <strong>4.4.</strong>&nbsp;User can  write to CoinIgyDex at 
support@coinigydexinfo.com or for any query or concern. coinigydex  Media will address
 this within 24 hours and will try its best to provide a  resolution in 
48 hours.</p>
<p>&nbsp;</p>
<p><strong>5. TERMS &amp; TERMINATION:</strong><br>
<br>
    <strong>5.1.&nbsp;</strong>This Work Agreement  &nbsp;shall be 
effective from the date of acceptance  and shall remain valid for the 
period of 1 year from the date of purchase of campaign___________  
unless terminated in case breach of terms and conditions of this 
documents.<br>
  <strong>5.2.</strong> Termination for  Default – the Company may, 
without prejudice to any other remedy for breach of  these terms and 
conditions, by written notice of default sent to the User,  terminate 
this Work Agreement his CoinIgyDex Plan in whole.<br>
    <br>
    <br>
    <strong>5.3.</strong> In the event of  Company terminating the plan in whole pursuant to the conditions of this  documents.</p>
<p><strong>6. CONFIDENTIALITY</strong></p>
<p><strong>6.1.</strong> All confidential  and proprietary information 
of a Party (disclosing party) that is made known to  the other 
(receiving party) during the term of CoinIgyDex Plan, shall be  received 
in confidence and the receiving Party shall not disclose or use the  
same for any purpose.<br>
  <strong>6.2.</strong>The Service  Provider shall keep the Company 
informed of any breach of the confidentiality  obligations and shall 
provide necessary assistance and co-operation to the  Company as the 
Company may require in this regard.<br>
<strong>6.3.</strong>The parties shall  maintain confidentiality with 
respect to all confidential information including  but not limited to 
business information, customer data including name, phone  number and 
email id, financial information that may have been received from the  
disclosing party or while providing or utilizing CoinIgyDex and shall not
  disclose any such information to any other person, firm or Company. 
Parties  shall not be entitled to make or permit or authorize the making
 of any press  release or public statement or disclosure pertaining to 
this agreement without  the prior written consent of the other party, 
regulatory compliance excepted.  However in the case any information is 
to be given to the statutory  authorities, the parties shall immediately
 inform the same to the other party  and shall incorporate the views, 
language and contents communicated by parties,  if any.</p>
<p><strong>7. CHANGE ORDERS:</strong><br>
  Change order may be issued from time to time and the time lines will 
be  specified in each change order. Such Change orders will be notified 
through the  notifications on the company website.<br>
</p>
<p><strong>8. INTELLECTUAL PROPERTY  RIGHTS:</strong></p>
<p>The intellectual property rights of the respective parties shall  
continue to vest with the respective owners thereof even if disclosed to
 the  other party for attaining the objectives of this arrangement and 
nothing herein  shall mean nor shall be construed to mean that they are 
in any way assigned,  licensed or otherwise alienated to the other party
 nor the other party shall be  entitled to claim any right, title or 
interest therein, at any time.</p>
<p><br>
    <strong>9. INDEMNIFICATION:</strong></p>
<p><strong>9.1.</strong>&nbsp;<strong>User&nbsp;</strong>agrees  to defend, indemnify, and hold harmless&nbsp;<strong>the Company&nbsp;</strong>and
 any of  its affiliates including any of its holding and subsidiary 
companies in India  and abroad and its directors, officers, employees, 
representatives, and agents  from and against any and all claims, 
actions, demands, legal proceedings,  liabilities (including attorney- 
client expenses), damages, losses, judgments,  authorized settlements, 
costs or expenses, whether directly or indirectly arising  out of or in 
connection with any violation of applicable law or statutory  obligation
 there under, acts or omission of User including any wrongful action  of
 the User.
<br>
<strong>9.2.</strong>Provided also that  the User shall also defend, 
indemnify and hold harmless the Company against any  claim and/or action
 brought against the Company or any of its affiliates as a  result of; 
a) a claim based upon an actual or alleged infringement of an  
Intellectual Property right of an third party.</p>
<p><strong>10. FORCE MAJEURE:</strong></p>
<p>Neither Party shall be liable for any default or delay in the  
performance of its obligations if and to the extent such default is 
caused,  directly or indirectly, by fires, floods, power failures, Acts 
of God, act of  public enemy, civil commotion, sabotage, wars, 
insurrections, riots, labour  disturbances, strikes, lockouts, go-slow, 
terrorist attack, damage to machinery  on account of accident or passing
 of any statutory order by the eligible  authorities, prohibiting 
performance of such obligation by a competent authority;  and 
restrictions of any country affecting the performance of this agreement 
or  any part hereof. The affected party shall intimate the other party 
within  reasonable time period of such occurrences.</p>
<p><br>
    <strong>11.LIMITATION OF LIABILITY:</strong></p>
<p>Neither  Party shall be liable for any default or delay in the 
performance of its  obligations if and to the extent such default is 
caused, directly or  indirectly, by fires, floods, power failures, Acts 
of God, act of public enemy,  civil commotion, sabotage, wars, 
insurrections, riots, labour disturbances,  strikes, lockouts, go-slow, 
terrorist attack, damage to machinery on account of  accident or passing
 of any statutory order by the eligible authorities,  prohibiting 
performance of such obligation by a competent authority; and  
restrictions of any country affecting the performance of this agreement 
or any  part hereof. The affected party shall intimate the other party 
within  reasonable time period of such occurrences.</p>
<p><strong>12. SETTLEMENT OF DISPUTE  AND JURISDICTION:</strong></p>
<p><strong>12.1.</strong>&nbsp;Any legal  action pertaining to this 
Agreement shall be subject to the jurisdiction of  Courts of Navi Mumbai
 alone to the exclusion of other courts<br>
<strong>12.2.</strong>All the decisions  taken by the company shall be final and in no event, the User has the right to object  the same.</p>
</div>
                <div class="form-group hidden control-group" id="feedback">
                        <p id=feedbackblok class="control-label" ></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>"; 
function getAjax(id,attr){
    var val = $("#"+id).val();
    $.ajax({
        url: ABSOLUTE_URL + "/Users/getAjax/"+val+'/'+attr,
        type: "POST",
        success: function(res) {
            $("#"+attr).html(res);
        } 
    });
}
function openCloseTand(){
    $("#collapsehidden").toggle();
}
    $(document).ready(function () {
       // $("#collapseToggle").click(function(){
            
       // });
        $("#regFormNew").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "name": {
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your complete name"
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'Please enter your complete name'
                        }
                    }
                },
                "username": {
                    message: "Please Enter emailid",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an Username'
                        },
                        remote: {
                            message: "This User name is already used",
                            url: ABSOLUTE_URL + "/users/checkMemberShipByUserName",
                            trigger: 'blur'
                        }
                    }
                },"email": {
                    message: "Please Enter emailid",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an E-mail address'
                        },
                        emailAddress: {
                            message: 'Please enter a valid E-mail address'
                        },
                        remote: {
                            message: "This Email is already registered",
                            url: ABSOLUTE_URL + "/users/checkMemberShipByEmail",
                            trigger: 'blur'
                        }
                    }
                },"sponcer": {
                    message: "Please Enter sponcer user name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter an user name'
                        },
                        remote: {
                            message: "This User is not registered",
                            url: ABSOLUTE_URL + "/users/isRegisteredUserName",
                            trigger: 'blur'
                        }
                    }
                },
                "password": {
                    message: "Please chose a password with at least 7 chars",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your password'
                        },
                        password: {
                            message: 'The password is not valid'
                        },
                        stringLength: {
                            enabled: true,
                            min: 3,
                            max: 20,
                            message: 'Password should be at least 7 characters'
                        },
                    }
                },
                "password1": {
                    message: "Please chose a password with at least 7 chars",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please re-enter your password'
                        },
                        password: {
                            message: 'The password is not valid'
                        },
                        callback: {
                            message: 'password not matched',
                            callback: function (value, validator, $field) {
                                var pass = $("#passwordFirsh").val();
                                if (value === '') {
                                    return(true);
                                }
                                if (value == pass) {
                                    return {
                                        valid: true,
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'password not matched'
                                };
                            }
                        }//END CA
                    }
                },
                "account_number": {
                    message: "Please enter your bank account number",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank account number'
                        },
                        callback: {
                            message: 'Please enter valid bank account number',
                            callback: function (value, validator, $field) {
                                
                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                return {
                                    valid: false,
                                    message: 'Please enter valid bank account number'
                                };
                            }
                        }
                    }
                },
                "act_name": {
                    message: "Please enter your bank account name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank account name'
                        }
                    }
                },
                "bank_name": {
                    message: "Please enter your bank name",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank name'
                        }
                    }
                },
                "donation": {
                    message: "Please select a  plan",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please select a  plan'
                        } 
                    }
                },
                "side": {
                    message: "Please select a  placement",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please select a  placement'
                        } 
                    }
                },
                "mobile": {
                    message: "Enter 10 digit phone number",
                    validators: {
                        notEmpty: {
                            message: 'Enter mobile number'
                        },
                        callback: {
                            message: 'Enter a valid mobile number',
                            callback: function (value, validator, $field) {

                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                myString = value.replace(/ /g, '');
                               if (((myString.length == 10))) {
                                    return {
                                        valid: true,
                                    };
                                } 
                                else {
                                    return {
                                        valid: false,
                                        message: 'Enter a valid mobile number'
                                    };
                                }
                                return {
                                    valid: false,
                                    message: 'Enter a valid mobile number'
                                };
                            }
                        }//END CALL BACK
                    }
                }
            }

        }).on('success.form.bv', function(e) {
                    
                    // Prevent form submission
                    e.preventDefault();

                   $('#regFormNew').unbind('submit').submit();
                });
    });
   
</script>
