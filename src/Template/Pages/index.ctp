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

<div class="content" style="padding: 0;">
  <div class="carousel carousel-slider valign-wrapper center" data-indicators="true" style="">
    <div class="carousel-fixed-item center">
    </div>
    <div class="carousel-item deep-purple darken-1 white-text" href="#one!">
      <h2>Welcome to GatorBay</h2>
      <p class="white-text">a place where Gators buy and sell!</p>
    </div>
    <!--<//?php $href_items = array("0" => "#two!", "1" => "#three!", "2" => "#four!");
          $href_vals = array_values($href_items);
          $count = 0; 
          echo $href_values[1];
          ?>
    <//?php foreach ($expensive_items as $it): ?>
    <div class="carousel-item amber white-text" href = "<//?php echo  $href_vals[$count]; ?>" >
      <h2> <//?= $it->title ?> </h2>
      <p class="white-text"> Only $ <//?= $it->price ?> </p>
      <?php $blob// = stream_get_contents($it->image); ?>
      <//?= '<img src = " ' . $blob . '" style = "width: 30%px; height: 100px" />' ?>

    </div>
    <//?php $count++; 
          if($count>2){
            break;
          }
    ?>
    
    <//?php endforeach; ?>
    -->
    <script>
      function convertToDataURL(blobString){
        return readAsDataURL(blobString);
      }      
    </script>

    <?php foreach($all_categories as $category): ?>
        <?php $cat_image = ($category->image !== NULL) ? base64_encode(stream_get_contents($category->image)) : NULL; ?>
        <a href = <?php echo '\'listings/index/'. $category->category_name . '\''; ?> style = "text-decoration: none; width: 100%; height: 100%;">
          <div class="carousel-item amber" style="width: 100%; height: 100%; 
          <?php if($cat_image !== NULL): ?>
            <?= "background-image:  url(data:image/png;base64,". $cat_image .");" ?>
          <?php endif; ?>
           background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
            <div class="carousel-title-container" onclick="window.location.href = <?= '\'listings?category='.$category->category_name. '\'' ?>" >
              <a class="carousel-title" href = <?php echo '\'listings/index/'. $category->category_name . '\''; ?> > <?= strtoupper($category->category_name) ?></a>
            </div>
          </div>
      </a>

    <?php endforeach ?>  

    <!--<a href = "listings/index/books" style = "text-decoration: none; width: 100%; height: 100%;">
      <div class="carousel-item amber" style="width: 100%; height: 100%; background-image:  url(<//?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/books.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
        <div class="carousel-title-container" href="#!" onclick="window.location.href = './listings/index/books'">
          <a class="carousel-title">BOOKS</a>
        </div>
      </div>
    </a>
    <a href = "listings/index/clothing" style = "text-decoration: none; width: 100%; height: 100%;">
      <div class="carousel-item green" style="width: 100%; height: 100%; background-image:  url(<//?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/clothing.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
        <div class="carousel-title-container" href="#!" onclick="window.location.href = './listings/index/clothing'">
          <a class="carousel-title">CLOTHING</a>
        </div>
      </div>
    </a>
    <a href = "listings/index/electronics" style = "text-decoration: none; width: 100%; height: 100%;">
      <div class="carousel-item blue" style="width: 100%; height: 100%; background-image:  url(<//?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/electronics.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 60%;">
        <div class="carousel-title-container" href="#!" onclick="window.location.href = './listings/index/electronics'">
          <a class="carousel-title">ELECTRONICS</a>
        </div>
      </div>
    </a>-->
  </div>

  <div class="recent-container">
    <div class="recent-content">
      <span><center>Recent Items</center></span>
      <div class="row" style="display: flex; justify-content: center;">

      <?php $counter = 0; ?>
      <?php foreach ($recent_items as $item): ?> 
        <div class="col s12 m6 l3">
          <div class="card medium">
            <div class="card-image">
              <?php $blobimg = stream_get_contents($item->image); ?>
              <?= '<img src = " ' . $blobimg . '" style = "width: 400px; height: 250px" />' ?>
            </div>
            <div class="card-action">
              <?= $this->Html->link( $item->title, ['controller' => 'Listings', 'action' => 'view', $item->listing_num] ) ?>
            </div>
          </div>
        </div>
      <?php $counter++;
        if($counter >3)
          break; ?>
      <?php endforeach; ?>
        <!--<div class="col s12 m6 l3">
          <div class="card small">
            <div class="card-image">
              <img src="http://www.publicdomainpictures.net/pictures/170000/nahled/math.jpg">
            </div>
            <div class="card-content">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m6 l3">
          <div class="card medium">
            <div class="card-image">
              <img src="http://www.publicdomainpictures.net/pictures/170000/nahled/math.jpg">
            </div>
            <div class="card-content">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m6 l3">
          <div class="card medium">
            <div class="card-image">
              <img src="http://www.publicdomainpictures.net/pictures/170000/nahled/math.jpg">
            </div>
            <div class="card-content">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>-->

      </div>

    </div>
  </div>

</div>




<script>
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('.carousel').carousel();
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 6000); //6000 = 6 secs
        
</script>

                            <!--<//?= $this->Html->link( 'convo', ['controller' => 'Conversations', 'action' => 'add']);?>
                            <//?= $this->Html->link( 'pm', ['controller' => 'PrivateMessages', 'action' => 'index']);?>
                            <//?= $this->Html->link( 'sell', ['controller' => 'Listings', 'action' => 'add']);?>
<//?= $this->Html->link( 'selling_list', ['controller' => 'SellingLists',
                                        'action' => 'index']); ?>-->
    </body>
</html>
