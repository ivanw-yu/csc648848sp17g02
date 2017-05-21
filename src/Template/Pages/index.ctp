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
$title = 'GatorBay: A Place For Gators to Buy and Sell.';
$this->assign('title', $title);
?>

<div class="content" style="padding: 0;">
  <div class="carousel carousel-slider valign-wrapper center" data-indicators="true" style="">

    <!-- <a href = "listings/index/' style = "text-decoration: none; width: 100%; height: 100%;"> -->
      <div class="carousel-item deep-purple darken-1 white-text"  style = "width: 100%; height: 100%; background-image: url('webroot/img/sfsupic.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;" >
        <div class="carousel-title-container">
          <a class="carousel-title">Welcome to GatorBay</a>
          <p style = "color: white; margin-top: -1%">A place where Gators buy and sell!</p>
        </div>
      </div>

    <!-- </a> -->

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
      function setModalLabelAndFormInput(name, title, item){
        // for displaying name and title on modal
        document.getElementById('seller_name').innerHTML = name;
        document.getElementById('seller_item').innerHTML = title;

        // for form inputs
        document.getElementById('receiver').value = name;
        document.getElementById('items_listing_id').value = item;
        //document.getElementById('sender').value = "<?= $currentUser ?>";
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
            <div class="carousel-title-container" style="cursor: pointer;" onclick="window.location.href = <?= '\'listings?category='.$category->category_name. '\'' ?>" >
              <a class="carousel-title"> <?= strtoupper($category->category_name) ?> </a>
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
    <div class="row recent-content" style="display: flex; justify-content: space-around;">
      <div class="col">
        <div class="row">
        <center><strong>RECENT ITEMS</strong></center>
        </div>
        <div class="row">
          <?php $counter = 0; ?>
          <?php foreach ($recent_items as $item): ?> 
            <div class="col s12 m10 l3" style="display: flex; justify-content: space-around;">
              <div class="card medium hoverable">
                <div class="clickable" onclick="window.location.href = <?= '\'listings/view/'.$item->listing_num. '\'' ?>">
                  <div class="card-image">
                    <?php $blobimg = stream_get_contents($item->image); ?>
                    <?= '<img src = " ' . $blobimg . '" style = "width: 400px; height: 250px" />' ?>
                  </div>
                  <div class="card-content">
                    <span class="card-title" style="font-size: 8px; font-size: 1vmax; font-weight: bold; text-transform: uppercase; text-align: center">
                        <?= $this->Html->link( $item->title, ['controller' => 'Listings', 'action' => 'view', $item->listing_num] ) ?>
                    </span>
                    <a class="left"><strong>Category: </strong> <?= h($item->category_id) ?></a>
                    <br>
                    <a class="left"><strong>Condition: </strong> <?= h($item->condition_id) ?></a>
                    <a class="right"><strong>$ </strong><?= h($item->price) ?></a>
                  </div>
                </div>
                <div class="card-action">
                    <?= '<a class="btn-flat left" style="font-size: 12px; padding-right: .5rem; padding-left: .5rem;" href="#quickview' . $item->listing_num . '">Quick View</a>' ?>

                    <?php if($currentUser !== null): ?>
                            <!-- this allows user to send a message to the seller through the modal. 4/16/17 -->
                             <a class="btn-flat right modal-close" style="font-size: 12px; padding-right: .5rem; padding-left: .5rem; margin: 0 auto;" href="#contact_box" onclick = "setModalLabelAndFormInput('<?= $item->registered_user_id ?>', '<?= $item->title ?>', '<?= $item->listing_num ?>');"> Contact Seller</a>                          <?php else: ?>
                            <a class="btn-flat right modal-close" style="font-size: 12px; padding-right: .5rem; padding-left: .5rem; margin: 0 auto;" href="#modal1">Contact Seller</a>
                          <?php endif; ?>

                    <?= '<div class="modal" id="quickview' . $item->listing_num . '">' ?>
                      <div class="modal-content">
                        <div class="row">
                          <h5><?= $this->Html->link(__($item->title), ['action' => 'view', $item->listing_num]) ?></h5>  
                        </div>
                        <div class="row">

                          <div class="col m7 12" style="overflow: hidden;">
                            <a class = "col s12 item-img" style = "text-decoration: none" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                              <?= '<img src = " ' . $blobimg . '" style = "width: 100%; height: 100%; position: 50% 50%;" />' ?>
                            </a>
                          </div>

                          <div class="col m5 12">
                            <div class="row">
                              <span><?= h($item->condition_id) ?></span>
                              <span class="right">$ <?= h($item->price) ?></span>
                            </div>
                            <div class="row">
                              <span><strong>Description: </strong> <?= h($item->item_desc) ?></span>
                            </div>
                            <div class="row">
                              <?= $this->Html->link( 'View more details', ['controller' => 'Listings', 'action' => 'view', $item->listing_num] ) ?>
                            </div>
                          </div>
                            
                        </div>
                        <div class="modal-footer">
                          <?php if($currentUser !== null): ?>
                            <!-- this allows user to send a message to the seller through the modal. 4/16/17 -->
                            <a class="btn grey modal-close" href="#contact_box" onclick = "document.getElementById('receiver').value = '<?php echo $listing->registered_user_id; ?>';">Contact Seller</a>
                          <?php else: ?>
                            <a class="btn grey modal-close" href="#modal1">Contact Seller</a>
                          <?php endif; ?>

                        </div>
                      </div>
                    <?= '</div>'; ?> 
                  
                </div>
              </div>
            </div>
          <?php $counter++;
            if($counter >3)
              break; ?>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>

</div>




<script>
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('.carousel').carousel();
  // setInterval(function() {
  //   $('.carousel').carousel('next');
  // }, 6000); //6000 = 6 secs
        
</script>

                            <!--<//?= $this->Html->link( 'convo', ['controller' => 'Conversations', 'action' => 'add']);?>
                            <//?= $this->Html->link( 'pm', ['controller' => 'PrivateMessages', 'action' => 'index']);?>
                            <//?= $this->Html->link( 'sell', ['controller' => 'Listings', 'action' => 'add']);?>
<//?= $this->Html->link( 'selling_list', ['controller' => 'SellingLists',
                                        'action' => 'index']); ?>-->
    </body>
</html>
