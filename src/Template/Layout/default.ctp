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

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Walter+Turncoat" rel="stylesheet">

    <style>

        body { background-color: #dddddd; }

        ul { line-height: 400%; }

        a{ color: #5e35b1; }
        

        form {
          display: flex;
          justify-content: center;
          min-width: 60%;
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
          color: #6f38c9;
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


        .carousel-title-container {
          height: 100%;
          width: 100%;
          opacity: 0.7;
          background-color: #333333;
        }

        .carousel-title {
          font-family: 'Comfortaa', cursive;
          font-size: 42px;
          font-weight: 500;
          text-align: justify;
          color: #6E94FF;
          position: relative;
          top: 40%;
        }

        .carousel .indicators .indicator-item {
          height: 10px;
          width: 10px;
        }

        .recent-container{
          display: flex;
          justify-content: center;
          padding: 25px;

        }

        .recent-content {
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

        /* label focus color */
        .input-field input[type=text]:focus + label, .input-field input[type=password]:focus + label, .input-field textarea[type=text]:focus + label, .input-field input[type=username]:focus + label, .input-field input[type=email]:focus + label {
          color: #5e35b1;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus, .input-field input[type=password]:focus, .input-field textarea[type=text]:focus, .input-field input[type=user]:focus, .input-field input[type=email]:focus {
          border-bottom: 1px solid #5e35b1;
          box-shadow: 0 1px 0 0 #5e35b1;
        }

        /*sort colors*/
        .dropdown-content li>a, .dropdown-content li>span {
          color: #5e35b1
        }

        /* filter colors*/
        [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after {
          background-color: #6f38c9;
          border: #6f38c9;
        }

        [type="checkbox"]:checked+label:before {
          border-bottom: 2px solid #5e35b1;
          border-right: 2px solid #5e35b1;
        }

        .col {
          margin: 0 auto;
        }

        .row {
          margin-bottom: 2px;
        }

        .card {
          max-width: 275px;
          cursor: pointer;
        }

        .card .card-content {
          padding-top: 12px;
          padding-bottom: 14px;
          max-height: 275px;
        }


        .card .card-content .card-title {
          font-size: 21px;
          margin-bottom: 0px;
        }

        .card .card-action {
          padding: 10px 16px;
          max-height: 55px;
        }

        .card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating) {
          color: #5e35b1;
        }

        .card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating):hover {
          color: #5e35b1;
        }

        .footer {
          display: flex;
          justify-content: flex-end;
          max-height: 100%;
          max-width: 100%;
        }

    </style>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99568913-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.min.js"></script>
  <!-- Top navbar -->
  <p style = "text-align: center; padding: 0; margin: 0; font-size: 75%"> <i>SFSU Software Engineering Project, Spring 2017. For Demonstration Only</i> </p>
  <nav>
    <div class="nav-wrapper grey darken-3">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        <?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand', 'style' => "padding-left: 15px; padding-right: 15px; font-family: 'Comfortaa', cursive; font-size: 24px; font-weight: bold;"] );?>
          

        <ul id="nav-mobile" class="right hide-on-med-and-down" style="height: 100%; display: flex; align-items: center;">

            <?php if(isset($currentUser)): ?>
                <li style="padding-right: 10px;"> <?= "Welcome ". $currentUser . "!" ?> </li>
                <li><?= $this->Html->link('Sell',
                                            ['controller' => 'Listings',
                                             'action' => 'add']);?></li>
            <?php else: ?>
                <li><a href="#modal1" onclick="sellClicked();">Sell</a></li>
            <?php endif; ?>
            <?php if(isset($currentUser)): ?>
                <li><?= $this->Html->link('Messages',
                                        ['controller' => 'PrivateMessages',
                                         'action' => 'index']);?> </li>
                  
                  <li><?= $this->Html->link('My Items',
                                        ['controller' => 'SellingLists',
                                         'action' => 'index']); ?> </li>
                  <!-- No watching lists.
                  <li><?= $this->Html->link('Watching',
                                        ['controller' => 'WatchingLists',
                                         'action' => 'index']); ?></li>
		 -->
          <?php endif; ?>
          <!-- Modal Trigger -->
          <?php if(!isset($currentUser)): ?>
            <li><a href="#modal1"r>Register/Sign in</a></li>
          <?php else: ?>      
              <li><?= $this->Html->link('Logout', ['controller' => 'RegisteredUsers', 'action' => 'logout']) ?></li>
                  
          <?php endif; ?>
        </ul>

      <!-- MOBILE NAV/SIDE BAR -->
        <ul class="side-nav" id="mobile-demo">
          <!-- Modal Trigger -->
          <center>
            <?php if(isset($currentUser)): ?>
                <li style="color: black; font-weight: bold;"> <?= "Welcome ". $currentUser . "!" ?> </li>
                <li><?= $this->Html->link( "Home", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?></li>
                <li><?= $this->Html->link('Sell',
                                            ['controller' => 'Listings',
                                             'action' => 'add']);?></li>
            <?php else: ?>
                <li><a href="#modal1" onclick="sellClicked();">Sell</a></li>
            <?php endif; ?>
            <?php if(isset($currentUser)): ?>
                <li><?= $this->Html->link('Messages',
                                        ['controller' => 'PrivateMessages',
                                         'action' => 'index']);?> </li>
                  
                  <li><?= $this->Html->link('My Items',
                                        ['controller' => 'SellingLists',
                                         'action' => 'index']); ?> </li>
                  
          <?php endif; ?>
          <!-- Modal Trigger -->
          <?php if(!isset($currentUser)): ?>
            <li><a href="#modal1"r>Register/Sign in</a></li>
          <?php else: ?>      
              <li><?= $this->Html->link('Logout', ['controller' => 'RegisteredUsers', 'action' => 'logout']) ?></li>
                  
          <?php endif; ?>
            </center>
        </ul>
    </div>
  </nav>

  <!-- search bar -->
  <nav style="max-height: 50px;">

    <div class="nav-wrapper grey darken-2 searchbar">

    <!--The entire url is $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] -->
    <!-- The following if-statement allows the "Back To Search" button to show in pages that do not display the index.ctp
         It will link to the previous search, accessed through the $this->request->session()->read('User.lastsearch'),
          which is set in the AppController. The Back to search button will not show up in the homepage -->
    <!-- <//?php $complete_url  = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
      <//?php if(((strrpos($complete_url,'listings')+8)!==strlen($complete_url)) && !strpos($complete_url, 'listings?') && !strpos($complete_url, 'listings/index') && strpos($complete_url, '/listings/view/') && !strpos($complete_url, 'browse') && dirname($_SERVER['REQUEST_URI']) !== '/'): ?>
          <//?php $last_search_url =  $this->request->session()->read('User.lastsearch'); ?> 
          <//?= '<div class="col s6" style = "margin-right: 2%; border-radius: 3%; margin-left: -5%; padding: 0">' ?>
            <//?= $this->Html->link( ' < Back to Search', ['controller' => 'Listings', 'action' => 'index', basename($last_search_url) ]) ?>
          <//?= '</div>' ?>
      <//?php endif; ?> -->
    
      
      <?= $this->Form->create(NULL, ['url' => [
                                   'controller' => 'Listings',
                                   'action' => 'index'],
                                   'type' => 'get', 'class' => 'row']) ?>
        
        <div class="input-field col s5 grey darken-3 search-cat" style="max-width: 125px; padding: 0;">
          <select name="category_filter" class="browser-default grey search-select" style="width: 100%;">
            <option value=""><?= $this->Html->link( 'All Categories', ['controller' => 'Listings', 'action' => 'index'] );?></option>
                <?php foreach ($validCategories as $row): ?>
            <option id = "<?= $row->category_name . '_id' ?>" value="<?= $row->category_name?>"><?= $row->category_name; ?>
            </option>
                <?php endforeach; ?>
          </select>
        </div>

        <!-- this script sets the default category from the drop down list, which was determined from the previous page -->
        <script>
          document.getElementById("<?php echo $default_category . '_id' ?>").selected = true;
        </script>
        
        <div class="input-field col s5 grey lighten-1" style="width:150%;">
          <input id="txtkey" name="tags" type="search" placeholder="search items" aria-describedby="ddlsearch" style="padding-left: 1rem; background-color: #bdbdbd; width: 100%;" maxlength='30' pattern='(\w|[ \t])+' title='Enter letters or numbers, no more than 30 characters'> <!--required>-->
          <label for="search"></label>
        </div>
        
        <button class="btn grey col s2 searchbutton" type="submit" style="height: 50px; box-shadow: none;">
          <i class="material-icons right" style="line-height: 50px;">search</i>
        </button>
          <input id="price_range" name="price" type="hidden">
          <!-- These remember the checked state of condition filters. -->
          <input id="filter_new" name="condition_new" type="hidden">
          <input id="filter_like_new" name="condition_like_new" type="hidden">
          <input id="filter_good" name="condition_good" type="hidden">
          <input id="filter_fair" name="condition_fair" type="hidden">
          <input id="filter_poor" name="condition_poor" type="hidden">
      <?= $this->Form->end() ?>
    </div>
  </nav>

  <!-- SIGN IN Modal Structure -->
  <div id="modal1" class="modal">
    
    <div class="modal-content">
      <h5><center>SIGN IN</center></h5>
       <?= $this->Form->create(null, ['url' => ['controller' => 'RegisteredUsers', 'action' => 'login'], 'class'=>'modal-content animate']) ?>
        <div class="row" style="width: 100%; display: flex; justify-content: space-around;">
          <div class="col s12 m7">

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
            <input name = "trigger" id="trigger" type="hidden" >
            <center><button type = "submit" class="modal-action modal-close waves-effect waves-purple btn-flat">SIGN IN</button></center>
            
            <?= $this->Form->end();?>
            <p></p>
            <center>Don't have an account? Register <a href="#modal2" class="modal-close">here</a>!</center>

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
        <div class="row" style="width: 100%; display: flex; justify-content: space-around;">
          <div class="col s12 m7">

            <div class="row">
              <div class="input-field col s12">
                <input name = "email" id="email" type="email" class="validate"
		       pattern='\w+(\.|_|-|\w)*(@mail.sfsu.edu|@sfsu.edu)' title='Only SFSU students can register' required>
                <label for="email" data-error="Not a valid @mail.sfsu.edu or @sfsu.edu email">Email</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="name" name = "username" type="text" maxlength='15'
                       pattern="\w(\w|_)*" class="validate"
                       title="Only numbers, letters, and _ are allowed.  Max length is 30 characters"  required>
                <label for="name" data-error="Only letters (required), numbers and _ allowed. Max length is 15 characters.">Username</label>

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input id="password" name = "password" type="password" class="validate" minlength="4" required>
                <label for="password" data-error="Password must be atleast 4 characters">Password</label>
              </div>
            </div>

            <center style="font-size: 13px;">By creating an account, you agree to  our <?= $this->Html->link( 'Terms and Conditions', ['controller' => 'Pages', 'action' => 'display', 'termsofservice' ] );?>.</center><p></p>
            <center><button type = "submit" class="modal-action waves-effect waves-purple btn-flat">REGISTER</button></center>
            <?= $this->Form->end();?>
            <p></p>
            <center>Already have an account? Log in <a href="#modal1" class="modal-close">here</a>!</center>
          </div>
        </div>
        <!--<//?= $this->Form->end();?>-->
        

    </div>
  </div>


    <!-- Contact Seller Modal Structure -->
  <div id = "contact_box" class= "modal">
          <!-- <span onclick = "document.getElementById('contact_box').style.display = 'none'" class = "modal-close" title = "Close">x</span> -->
          <!--<form  method="post" class ="modal-content animate"
          action = "../RegisteredUsers/add">-->
      <?= $this->Form->create(null, ['url' => ['controller' => 'PrivateMessages', 'action' => 'add'], 'name' => 'message_form', 'class'=>'modal-content animate']); ?>
        <div class = "modal-content">
            <h5><center>CONTACT <span id = "seller_name"></span> <br><br> for <span id = "seller_item"></span><!--<//?= $listing->registered_user_id ?> for <//?= $listing->listing_num ?>--></center></h5>
            <div class="row">
              <div class="input-field col s12">
                <input id="subject" type="text" name="subject" required><br>
                <label for="subject" data-error="Please enter the subject">Subject</label><br>              

              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <textarea id="textarea1" name="message" class="materialize-textarea" type="text" required=""></textarea>
                <label for="textarea1" data-error="Message required.">Message</label><br>

              </div>
            </div>
            <input type ="hidden" id = "sender" name="registered_user_id">
            <input type ="hidden" id = "receiver" name="recipient_id"> <!--value="<//?= $listing->registered_user_id ?>"-->
            <!-- added 4/27/17 to pass in listing_id to private message to be created-->
            <input type = "hidden" id = "items_listing_id" name = "listing_id"> <!-- value = "<//?= $listing->listing_num ?>"> -->

            <div class = "clearfix">
              <button type = "submit" class ="btn grey signupbtn"> Send </button>
              <button type = "button" class="btn grey cancelbtn modal-close">Cancel</button>
              </div>
        </div>
      <?= $this->Form->end();?>
  </div>


    <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

  <footer class="page-footer grey">
    <div class="container">
      <div class="row" style="width: initial;">
        <div class="col l6 s12">
          <h5 style="color: #424242;">GatorBay</h5>
          <p class="grey-text text-lighten-4">GatorBay is a unique website designed and developed by San Francisco State students to cater their needs for buying and selling items.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 style="color: #424242;">Links</h5>
          <ul style="line-height: 225%;">
            <li><?= $this->Html->link( 'Company info', ['controller' => 'Pages', 'action' => 'display', 'about' ] );?></li>
            <li><?= $this->Html->link( 'Contact Us', ['controller' => 'Pages', 'action' => 'display', 'contact' ] );?></li>
            <li><?= $this->Html->link( 'Terms and Conditions', ['controller' => 'Pages', 'action' => 'display', 'termsofservice' ] );?></li>
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

    <script>
    document.getElementById('txtkey').value = "<?= $this->request->query['tags']; ?>"
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.modal').modal();

      });
      function sellClicked(){
        document.getElementById("trigger").value="Sell";
      };

    </script>

  </body>
</html>

