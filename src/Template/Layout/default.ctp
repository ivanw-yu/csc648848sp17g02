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
    <title>
      <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <meta charset="utf-8">
    <meta htp-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  

    <!-- THIS COMMENTED PART IS GIVING ERRORS
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="stylesheet" href="/stylesheets/index.css">-->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <style>

      form {
        display: flex;
        justify-content: center;
        min-width: 70%;
      }

      .search-select { 
        height: inherit; 
        border: grey; 
        text-overflow: ellipsis;
      }

      .searchbar {
        display: flex;
        justify-content: center;
      }

      .search-cat {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        text-overflow: ellipsis;
      }

      .recent-container{
        display: flex;
        justify-content: center;
        padding: 25px;
      }

      .recent-content {
        max-height: 450px;
        max-width: 1200px;
        background-color: #eeeeee;
      }

      .col {
        margin: 0 auto;
      }

      .row {
        display: flex;
        justify-content: center;
      }

      .footer {
        display: flex;
        justify-content: flex-end;
        max-height: 100%;
        max-width: 100%;
        z-index: 1;
        clear: top;        
      }

    </style>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
  <!-- Top navbar -->
  <nav>
    <div class="nav-wrapper grey darken-3">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down" style="height: 100%; display: flex; align-items: center;">
          <li><?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?></li>
          <li><a onclick="window.location.href = 'sell/'">Sell</a></li>
          <li><?= $this->Html->link( 'Browse', ['controller' => 'Pages', 'action' => 'display', 'browse' ]) ?></li>
          <li><a onclick="window.location.href = 'recent/'">Recent</a></li>
          <?php if($currentUser !== null): ?>
                <li><?= $this->Html->link('Private messages',
                                        ['controller' => 'PrivateMessages',
                                         'action' => 'index']);?> </li>
                  <li><?= $this->Html->link('Sell',
                                        ['controller' => 'Listings',
                                         'action' => 'add']);?> </li>
                  <li><?= $this->Html->link('Selling',
                                        ['controller' => 'SellingLists',
                                         'action' => 'index']); ?> </li>
                  <li><?= $this->Html->link('Watching',
                                        ['controller' => 'WatchingLists',
                                         'action' => 'index']); ?></li>
          <?php endif; ?>
        </ul>

        <ul id="nav-mobile" class="right hide-on-med-and-down" style="height: 100%; display: flex; align-items: center;">
          <li></li>
          <!-- Modal Trigger -->
          <?php if($currentUser === null): ?>
            <li><a href="#modal1"r>Register/Sign in</a></li>
          <?php else: ?>

                  <li> <?= "Welcome ". $currentUser . "!" ?> </li>
                  <li><?= $this->Html->link('Logout', ['controller' => 'RegisteredUsers', 'action' => 'logout']) ?></li>
                  
          <?php endif; ?>
        </ul>

      
        <ul class="side-nav" id="mobile-demo">
          <!-- Modal Trigger -->
          <center>
            <a href="#!" class="brand-logo"><?= $this->Html->link( "Home", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?></a>
            <li><a onclick="window.location.href = 'sell/'">Sell</a></li>
            <li><a onclick="window.location.href = 'browse/'">Browse</a></li>
            <li><a onclick="window.location.href = 'recent/'">Recent</a></li>
            <li><a href="#modal1"r>Register/Sign in</a></li>
            </center>
        </ul>
    </div>
  </nav>

  <!-- search bar -->
  <nav>
    <div class="nav-wrapper grey darken-2 searchbar">
      
      <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>

        <div class="input-field col s6 grey darken-3 search-cat">
          <select class="browser-default grey search-select">
            <option value="">All courses</option>
                <?php foreach ($select_courses as $row): ?>
                    <option value="<?= $row->course_name?>"><?= $row->course_name; ?></option>
                <?php endforeach; ?>
          </select>
        </div>
        <div class="input-field col s6 grey darken-3 search-cat">
          <select class="browser-default grey search-select">
            <option value="">All conditions</option>
                <?php foreach ($select_conditions as $row): ?>
                    <option value="<?= $row->condition_name?>"><?= $row->condition_name; ?></option>
                <?php endforeach; ?>
          </select>
        </div>
        <div class="input-field col s6 grey darken-3 search-cat">
          <select class="browser-default grey search-select">
            <option value=""><?= $this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                <?php foreach ($validCategories as $row): ?>
            <option value="<?= $row->category_name?>"><?= $row->category_name; ?></option>
                <?php endforeach; ?>
          </select>
        </div>
        
        <div class="input-field grey lighten-1" style="width:150%;">
          <input id="txtkey" name="tags" type="search" placeholder="search..." aria-describedby="ddlsearch" style="padding-left: 1rem; background-color: white" required>
          <label for="search"></label>
        </div>
        
        <button class="btn grey searchbutton" type="submit" style="height: 100%;">
          <i class="material-icons right">search</i>
        </button>
      <?= $this->Form->end() ?>
    </div>
  </nav>

  <!-- Login Modal Structure -->
  <div id="modal1" class="modal">
    
    <div class="modal-content">
      <h5><center>LOG IN</center></h5>
       <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'login'], 'class'=>'modal-content animate']) ?>
        <div class="row">
          <div class="col s6">

            <div class="row">
              <div class="input-field col s12">
                <input id="name" name = "username" type="text" class="active validate" required>
                <label for="name" data-error="enter a valid username">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate">
                <label for="password" data-error="incorrect password">Password</label>
              </div>
            </div>
            <center><button type = "submit" class="modal-action modal-close waves-effect waves-green btn-flat">SIGN IN</button></center>
            <?= $this->Form->end();?>
            <p><a href = "#" class="right"> Forgot password?</a></p>
          </div>
        </div>
      
<!--<<<<<<< HEAD -->
    <!--</nav>-->
    
    <!--THIS CAUSES ERROR, EVERYTHING COMMENTED HERE <div class="page-content">--><!-- Your content goes here -->
    <!-- Nav-bar -->
      <!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header"> 
            //<//?= //$this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?>
          </div>

          <div class="col-md-6">
            <div class="form-horizontal">

    //<//?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
		                   'type' => 'get']) ?> 



              <div class="input-group">
                <div class="ddl-select input-group-btn">
                  <select name='category' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">-->
                    <!-- value="" so that when 'All' is selected, nothing is
                         given to the controller, in which case it will search
                         for everything.
                    -->
                    <!--<option value=""><//?= //$this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                      <//?php// foreach ($validCategories as $row): ?>
                        <option value="<//?= //$row->category_name?>"><//?=// $row->category_name; ?></option>
                      <//?php// endforeach; ?>
                  </select>
                </div>

                <div class="ddl-select input-group-btn">
                  <select name='course' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">-->
                    <!-- value="" makes the controller search for everything.  -->
                    <!--<option value="">All courses</option>
                      <//?php //foreach ($select_courses as $row): ?>
<option value="<//?= //$row->course_name?>"><//?= //$row->course_name; ?></option>
                      <//?php //endforeach; ?>
                  </select>
                </div>

                <div class="ddl-select input-group-btn">
                  <select name='condition' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary"> -->
                    <!-- value="" makes the controller search for everything.  -->
                    <!-- <option value="">All conditions</option>
                      <//?php //foreach ($select_conditions as $row): ?>
<option value="<//?= //$row->condition_name?>"><//?= //$row->condition_name; ?></option>
                      <//?php //endforeach; ?>
                  </select>
                </div> 

	<input name='tags' id="txtkey" type="text" class="form-control" placeholder="Enter here" aria-describedby="ddlsearch">

<span class="input-group-btn">
                  <button type='submit' id="btn-search" class="btn btn-info glyphicon glyphicon-search" type="button"><i class="fa fa-search fa-fw"></i></button>
                </span> -->
<!--=======-->
      <!--</form>-->
    
      <center><p>Don't have an account? Register <a href="#modal2" class="modal-close">here</a>!</p></center>
    </div>
  </div>

    <!-- Registration Modal Structure -->
  <div id="modal2" class="modal">

    <div class="modal-content">
      <h5><center>REGISTRATION</center></h5>
      <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'add']]); ?>
        <div class="row">
          <div class="col s6">  
            <div class="row">
              <div class="input-field col s12">
                <input name = "email" id="email" type="email" class="validate" required>
                <label for="email" data-error="This email has already been registered">Email</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="name" name = "username" type="text" class="validate" required>
                <label for="name" data-error="Username has already been taken">Username</label>

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="password" name = "password" type="password" class="validate" required>
                <label for="password" data-error="wrong">Password</label>
              </div>
            </div>
          </div>
        </div>
        <br>
      <p> By creating an account, you agree to  our <a href = "#" > Terms & Conditions</a>.</p><br>
      <button type = "submit" class="modal-action modal-close waves-effect waves-green btn-flat">REGISTER</button>
      <?= $this->Form->end() ?>
      <center><p>Already have an account? Log in <a href="#modal1" class="modal-close">here</a>!</p></center>

    </div>
  </div>

   <script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();
      $('select').material_select();
      $('.modal').modal();

    });


  </script>

  <script>

  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 6000); //6000 = 6 secs



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

    <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

  <footer class="page-footer grey">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">TheGatorBay</h5>
          <p class="grey-text text-lighten-4">TheGatorBay is a unique website designed and developed by San Francisco State students to cater their needs for buying and selling items.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Company Info</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Terms and Conditions</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2017 TheGatorBay
      </div>
    </div>
  </footer>



</body>
</html>

