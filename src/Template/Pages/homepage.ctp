<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
//$this->layout = true;
?>

<!--<!DOCTYPE html>
<html>
  <head>
      <meta charset = "utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>


      .center-block
      {
        display:block;
      	margin-right:auto;
      	margin-left:auto;
      	
      }
      .title-font{
        font-family: Verdana,sans-serif;
        font-size: 2.5em;
      }

      .col-centered{
        float:none;
        margin:0 auto;
      }


      input[type=text], input[type=password] {
    	width: 300px;
    	box-sizing: border-box;
    	border: 2px solid #ccc;
    	border-radius: 4px;
      display: inline-block;
    	font-size: 16px;
    	background-color: white;
    	background-position: 10px 10px; 
    	background-repeat: no-repeat;
    	padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
    	transition: width 0.4s ease-in-out;
      text-align: center;
		  }
		  input[type=text]:focus {
    	width: 100%;
		  }


      .cancelbtn,.signupbtn,.loginbtn {float:left;width:50%}


      .container1 {
       padding: 16px;
        }



        .modal 
        {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
        } 

        .modal-content 
        {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
        }

        .close:hover,
        .close:focus {
          color: red;
          cursor: pointer;
        }
        .clearfix::after {
        content: "";
        clear: both;
        display: table;
        }


        @media screen and (max-width: 300px) {
          .cancelbtn, .signupbtn .loginbtn{
            width: 100%;
          }
        }


      </style>
      <head>

     <body>

     <title>TheGatorBay</title>
     <nav class = "navbar navbar-inverse ">
          <div class = "container-fluid">
              <div class = "navbar-header">
              </div>
              <ul class="nav navbar-nav navbar-right">
                  <button type="button" class="btn btn-primary btn-md" onclick = "document.getElementById('id01').style.display ='block'" style = "width:auto;">Login/Register</button>
              </ul>
          </div>
        </nav>-->

        <div id = "id01" class= "modal">
            <span onclick = "document.getElementById('id01').style.display = 'none'" class = "close" title = "Close">x</span>
            <!--<form  method="post" class ="modal-content animate"
            action = "../RegisteredUsers/add">-->
            <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'add'], 'class'=>'modal-content animate']); ?>
              <div class = "container1">
              <label>Registration</label><br>
              <label><b>Email</b></label><br>
              <input type = "text" name = "email" placeholder = "your email" required><br>
              <label><b>Username</b></label><br>
              <input type = "text" name = "username" placeholder = "your username" required><br>
              <label><b>Password</b></label><br>
              <input type = "password" name = "password" placeholder = "password" required>
              <p> By creating an account you agree to  our <a href = "#" > Terms & Privacy </a>. </p><br/>
              <p> Have an account? Login <a rel = "ck_modal" onclick= "document.getElementById('id02').style.display = 'block';document.getElementById('id01').style.display = 'none'">here </a> </p>
              <div class = "clearfix">
                <button type = "button" class=" cancelbtn btn btn-primary btn-md" onclick = "document.getElementById('id01').style.display = 'none'">Cancel</button>
                <button type = "submit" class ="btn btn-primary btn-md signupbtn"> Sign Up </button>
                </div>
                </div>
              <?= $this->Form->end();?>
        </div>


        <div id = "id02" class = "modal">
          <span onclick = "document.getElementById('id02').style.display = 'none'" class = "close" title = "Close">x</span>
            <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'login'], 'class'=>'modal-content animate']); ?>
              <div class = "container1">
              <label>Sign in</label><br>
              <label><b>Username</b></label><br>
              <input type = "text" name = "username" placeholder = "your username" required><br>
              <label><b>Password</b></label><br>
              <input type = "password" name = "password" placeholder = "password" required>
              <div class = "clearfix">
                <button type = "button" class=" cancelbtn btn btn-primary btn-md" onclick = "document.getElementById('id02').style.display = 'none'">Cancel</button>
                <button type = "submit" class ="btn btn-primary btn-md signupbtn"> Login </button>
                </div>
                </div>
              <?= $this->Form->end();?>

        </div>

        

     <div class = "container">
     		<div class = "row  ">
     		 	<div class = "col-lg col-centered text-center title-font">
           <br/>
     		 	TheGatorBay
           <br/>
     		 	</div>
     		 </div>
     		<div class = "row">
     			<div class = "col">
           <br/>
     			</div> 	
     		</div>
              	<div class = "row ">
     			<div class = "col col-centered text-center">
           <br/>
     			</div> 	
     		</div>
              	<div class = "row">
     			<div class = "col-sm col-centered text-center">
                            <!-- This creates a button which links to Template/Pages/browse.ctp. The last associative array argument is for
                                 the attributes of the button, like the type, class and/or style if specified.-->
                            <?= $this->Html->link( 'Browse', ['controller' => 'Pages', 'action' => 'display', 'browse' ], ['type'=>'button', 'class' => 'btn btn-primary btn-md']);?>
                            <button type="button" class="btn btn-primary btn-md">Recent</button>
     			</div> 	
     		</div>
     		<div class ="row ">
     			<div class = "col-12 col-centered text-center">
           <br/>
     			<form>
                           <input type="text" name="search" placeholder="Search..">
                        </form>
     			</div>
     		</div>
                <div class = "row ">
     			        <div class = "col-sm col-centered text-center">
                            <button type="button" class="btn btn-primary btn-sm">Search</button>
     			        </div> 	
     		       </div>


     </div>   
<script>
        var modal = document.getElementById('id01');
        window.onclick = function(event){
          if (event.target == modal){
             modal.style.display = "none";
          }
        }
        var modal = document.getElementById('id02');
        window.onclick = function(event){
          if (event.target == modal){
             modal.style.display = "none";
          }
        }
        
</script>
    </body>
</html>

