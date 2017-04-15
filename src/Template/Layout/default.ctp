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

    <!-- THIS COMMENTED PART IS GIVING ERRORS
    <//?= $this->Html->css('base.css') ?>
    <//?= $this->Html->css('cake.css') ?> -->

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.min.css">

    <style>

        body { 
          background-color: #dddddd;
        }
        form {
          display: flex;
          justify-content: center;
          min-width: 60%;
        }

        ul {
          line-height: 400%;
        }

        .search-select { 
          height: inherit; 
          border: grey; 
          width: initial;
        }

        .searchbar {
          display: flex;
          justify-content: center;
          height: 50px;
        }

        .search-cat {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 20%;
          text-overflow: ellipsis;
        }

        .bread-content {
          padding-left: 4%;
        }

        .breadcrumb {
          font-size: 14px;
          color: #7c3ee0;
          overflow: hidden;

        }

        .breadcrumb:before {
          color: grey;
          margin: 0;
        }

        .breadcrumb:last-child {
          color: grey;

        }

        .content {
          overflow: auto;
        }

        .recent-container{
          display: flex;
          justify-content: center;
          padding: 25px;

        }

        .recent-content {
          max-height: 450px;
          max-width: 1200px;
          background-color: #fcfcfc;
          box-shadow: 5px 5px 10px #cecece;

        }

        .search-details {
          width: 80%; 
          padding-top: 2rem; 
          padding-bottom: 1rem;
        }

        .page-content {
          background-color: #f4f4f4;
          height: auto;
          width: 100%;
        }

        .col {
          margin: 0 auto;
        }

        .row {
          margin-bottom: 2px;
        }

        .card {
          max-width: 275px;
        }

        .footer {
          display: flex;
          justify-content: flex-end;
          max-height: 100%;
          max-width: 100%;
        }

        .footer-links {
          line-height: 200%;
        }

    </style>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.min.js"></script>
  <!-- Top navbar -->
  <nav>
    <div class="nav-wrapper grey darken-3">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="left hide-on-med-and-down" style="height: 100%; display: flex; align-items: center;">
          <li><?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?></li>
          <li><?= $this->Html->link( 'Browse', ['controller' => 'Pages', 'action' => 'display', 'browse' ]) ?></li>
          <li>
            <?php if($currentUser !== null): ?>
              <?= $this->Html->link('Sell',
                                        ['controller' => 'Listings',
                                         'action' => 'add']);?>

            <?php else: ?>
            <a href="#modal1">Sell<a>
              
            <?php endif; ?>
          </li>
          <?php if($currentUser !== null): ?>
                <li><?= $this->Html->link('Private messages',
                                        ['controller' => 'PrivateMessages',
                                         'action' => 'index']);?> </li>
                  
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
            <li><?= $this->Html->link( 'Browse', ['controller' => 'Pages', 'action' => 'display', 'browse' ]) ?></li>
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
            <li><a href="#modal1">Register/Sign in</a></li>
            </center>
        </ul>
    </div>
  </nav>

  <!-- search bar -->
  <nav style="max-height: 50px;">
    <div class="nav-wrapper grey darken-2 searchbar">
      
      <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get']) ?>

        
        <div class="input-field col s6 grey darken-3 search-cat">
          <select name="category_filter" class="browser-default grey search-select">
            <option value=""><?= $this->Html->link( 'All Categories', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                <?php foreach ($validCategories as $row): ?>
            <option id = "<?= $row->category_name . '_id' ?>" value="<?= $row->category_name?>"><?= $row->category_name; ?></option>
                <?php endforeach; ?>
          </select>
        </div>

        <!-- this script sets the default category from the drop down list, which was determined from the previous page -->
        <script>
          document.getElementById("<?php echo $default_category . '_id' ?>").selected = true;
        </script>

        
        <div class="input-field grey lighten-1" style="width:150%;">
          <input id="txtkey" name="tags" type="search" placeholder="search items" aria-describedby="ddlsearch" style="padding-left: 1rem; background-color: #bdbdbd; width: 100%;" > <!--required>-->
          <label for="search"></label>
        </div>
        
        <button class="btn grey searchbutton" type="submit" style="height: 50px; box-shadow: none;">
          <i class="material-icons right" style="line-height: 50px;">search</i>
        </button>
      <?= $this->Form->end() ?>
    </div>
  </nav>

  <!-- Login Modal Structure -->
  <div id="modal1" class="modal">
    
    <div class="modal-content">
      <h5><center>LOG IN</center></h5>
       <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'login'], 'class'=>'modal-content animate']) ?>
        <div class="row" style="width: 100%;">
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


            <div class="row" style="display: flex; justify-content: flex-end; font-size: 12px; margin-bottom: 5px;">
                  <a href = "#"> Forgot password?</a>
            </div>

            <center><button type = "submit" class="modal-action modal-close waves-effect waves-green btn-flat">SIGN IN</button></center>
            
            <?= $this->Form->end();?>
            <center><p>Don't have an account? Register <a href="#modal2" class="modal-close">here</a>!</p></center>

          </div>
        </div> 
      </form> 
    </div>
  </div>

      <!-- Registration Modal Structure -->
    <div id="modal2" class="modal">

      <div class="modal-content">
        <h5><center>REGISTRATION</center></h5>
        <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'add']]); ?>
          <div class="row" style="width: 100%;">
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
        <!--<//?= $this->Form->end();?>-->
        <center><p> By creating an account, you agree to  our <a href = "#" > Terms & Conditions</a>.</p></center>
        <center><button type = "submit" class="modal-action modal-close waves-effect waves-green btn grey darken-1">REGISTER</button></center>
        <?= $this->Form->end();?>
        
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
      <div class="footer-copyright">
        <div class="container">
        © 2017 GatorBay
        </div>
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

