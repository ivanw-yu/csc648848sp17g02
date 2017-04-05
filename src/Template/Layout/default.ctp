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

//$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
    
    .ddl-select.input-group-btn{
      width: 100px;
    }
    .category-warpper {
      top: 300px;
    }
    .category-row {
      display: flex;
    }
    .card {
      width: 150px;
      height: 150px;
    }
    .card-image {
      padding-bottom: 30px;
    }

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
</head>
<body>
    <!--<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><//?=// $this->fetch('title') ?></a></h1>
            </li>
        </ul>-->
        <!--<div id = "nav-search">
        <ul class = "left">
                <li>
                <//?= //$this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get',
                                   'class' => 'navbar-form',
                                   'style' => 'text-align: center']) ?>
                <input name='tags'  type="text" class="form-control input-lg" placeholder="Enter here">
                <button type='submit' id="btn-search" class="btn btn-info glyphicon glyphicon-search" type="button">
                </button>
                <//?= //$this->Form->end() ?>
                </li>
            </ul>
        </div>-->
        <!--<div class="col-md-6">
            <div class="form-horizontal">

    <//?= //$this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>
              <div class="input-group">
                <div class="ddl-select input-group-btn">
                  <select name='category' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                    <option value="all"><//?=// $this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                      <//?php// foreach ($id as $row): ?>
<option value="<//?= //$row->category_name?>"><//?= //$row->category_name; ?></option>
                      <//?php// endforeach; ?>
                  </select>
                </div>
                <input name='tags' id="txtkey" type="text" class="form-control" placeholder="Enter here" aria-describedby="ddlsearch">
                <span class="input-group-btn">
                  <button type='submit' id="btn-search" class="btn btn-info glyphicon glyphicon-search" type="button"><i class="fa fa-search fa-fw"></i></button>
                </span>
              </div>
    <//?= //$this->Form->end() ?>
            </div>
          </div>
        <div class="top-bar-section">
            <ul class="right">
                <li><//?= //$this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display']);?></li>
                <li><//?= //$this->Html->link( "Browse Categories", ['controller' => 'Pages', 'action' => 'display', 'browse']);?></li>
            </ul>
        </div>
    </nav>-->
     <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    
    <div class="page-content"><!-- Your content goes here -->
    <!-- Nav-bar -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?>
          </div>
          <span style = "color: white">
            <?php if($currentUser !== null): ?>
              <?= "Welcome ". $currentUser . "!" ?>
            <?php else: ?>
              <?= "" ?>
            <?php endif; ?>
          </span>

          <div class="col-md-6">
            <div class="form-horizontal">

    <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>
              <div class="input-group">
                <div class="ddl-select input-group-btn">
                  <select name='category' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                    <!-- value="" so that when 'All' is selected, nothing is
                         given to the controller, in which case it will search
                         for everything.
                    -->
                    <option value=""><?= $this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                      <?php foreach ($id as $row): ?>
                        <option value="<?= $row->category_name?>"><?= $row->category_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="ddl-select input-group-btn">
                  <select name='course' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                    <!-- value="" makes the controller search for everything.  -->
                    <option value="">All courses</option>
                      <?php foreach ($select_courses as $row): ?>
<option value="<?= $row->course_name?>"><?= $row->course_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="ddl-select input-group-btn">
                  <select name='condition' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                    <!-- value="" makes the controller search for everything.  -->
                    <option value="">All conditions</option>
                      <?php foreach ($select_conditions as $row): ?>
<option value="<?= $row->condition_name?>"><?= $row->condition_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <input name='tags' id="txtkey" type="text" class="form-control" placeholder="Enter here" aria-describedby="ddlsearch">
                <span class="input-group-btn">
                  <button type='submit' id="btn-search" class="btn btn-info glyphicon glyphicon-search" type="button"><i class="fa fa-search fa-fw"></i></button>
                </span>
              </div>
    <?= $this->Form->end() ?>

            </div>
          </div>
         <!-- <div class="top-bar-section">
            <ul class="right">
                <li style = "text-decoration: none, background-color: black"><//?= //$this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display']);?></li>
                <li><//?= //$this->Html->link( "Browse Categories", ['controller' => 'Pages', 'action' => 'display', 'browse']);?></li>
            </ul>
        </div>-->
          <ul class="nav navbar-nav right">
            <?php if($currentUser === null): ?>
              <button type="button" class="btn btn-primary btn-md" onclick = "document.getElementById('id01').style.display ='block'" style = "width:auto;">Login/Register</button>  
            <?php else: ?>
              <button type="button" class="btn btn-primary btn-md" style = "width:auto;"><?= $this->Html->link('Logout', 
                                                                                                              ['controller' => 'RegisteredUsers',
                                                                                                              'action' => 'logout']) ?></button> 
            <?php endif; ?>
          </ul>
        </div>
      </nav>

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


    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
