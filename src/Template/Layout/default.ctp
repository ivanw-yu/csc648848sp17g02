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

    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="stylesheet" href="/stylesheets/index.css">
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
          <li><a href="#!" class="brand-logo"><?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?></a></li>
          <li><a onclick="window.location.href = 'sell/'">Sell</a></li>
          <li><a onclick="window.location.href = 'browse/'">Browse</a></li>
          <li><a onclick="window.location.href = 'recent/'">Recent</a></li>
        </ul>
        
        <ul id="nav-mobile" class="right hide-on-med-and-down" style="height: 100%; display: flex; align-items: center;">
          <li></li>
          <!-- Modal Trigger -->
          <li><a href="#modal1"r>Register/Sign in</a></li>
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
      <form>

      <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>

        <div class="input-field col s6 grey darken-3 search-cat">
          <select class="browser-default grey search-select">
            <option value=""><?= $this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                <?php foreach ($validCategories as $row): ?>
            <option value="<?= $row->category_name?>"><?= $row->category_name; ?></option>
                <?php endforeach; ?>
          </select>
        </div>
        
        <div class="input-field grey lighten-1" style="width:150%;">
          <input id="txtkey" name="tags" type="search" placeholder="search..." aria-describedby="ddlsearch" style="padding-left: 1rem;" required>
          <label for="search"></label>
        </div>
        
        <button class="btn grey searchbutton" type="submit" name="action" value="Go" style="height: 100%;">
          <i class="material-icons right">search</i>
        </button>
      </form>
    </div>
  </nav>

  <!-- Login Modal Structure -->
  <div id="modal1" class="modal">
    
    <div class="modal-content">
      <h5><center>LOG IN</center></h5>
      <form>
        <div class="row">
          <div class="col s6">

            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" class="active validate" required>
                <label for="name" data-error="enter a valid username">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password" data-error="incorrect password">Password</label>
              </div>
            </div>
            <p><a href = "#" class="right"> Forgot password?</a></p>
          </div>
        </div>
      </form>
      <center><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">SIGN IN</a></center>
      <center><p>Don't have an account? Register <a href="#modal2" class="modal-close">here</a>!</p></center>
    </div>
  </div>

    <!-- Registration Modal Structure -->
  <div id="modal2" class="modal">

    <div class="modal-content">
      <h5><center>REGISTRATION</center></h5>
      <form>
        <div class="row">
          <div class="col s6">

            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate" required>
                <label for="email" data-error="This email has already been registered">Email</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" class="validate" required>
                <label for="name" data-error="Username has already been taken">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" required>
                <label for="password" data-error="wrong">Password</label>
              </div>
            </div>

          </div>
        </div>
      </form>
      <center><p> By creating an account, you agree to  our <a href = "#" > Terms & Conditions</a>.</p></center>
      <center><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">REGISTER</a></center>
      <center><p>Already have an account? Log in <a href="#modal1" class="modal-close">here</a>!</p></center>

    </div>
  </div>



  
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

  <script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();
      $('select').material_select();
      $('.modal').modal();

    });


  </script>


</body>
</html>
