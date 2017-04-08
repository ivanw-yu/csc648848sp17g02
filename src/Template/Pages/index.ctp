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
  <div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect white grey-text darken-text-2">button</a>
    </div>
    <div class="carousel-item red white-text" href="#one!">
      <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <h2>Second Panel</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <h2>Third Panel</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <h2>Fourth Panel</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>

  <div class="recent-container">
    <div class="recent-content">
      <span><center>Recent Items</center></span>
      <div class="row" style="display: flex; justify-content: center;">
        <div class="col s12 m6 l3">
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
                            <?= $this->Html->link( 'convo', ['controller' => 'Conversations', 'action' => 'add']);?>
                            <?= $this->Html->link( 'pm', ['controller' => 'PrivateMessages', 'action' => 'index']);?>
                            <?= $this->Html->link( 'sell', ['controller' => 'Listings', 'action' => 'add']);?>
<?= $this->Html->link( 'selling_list', ['controller' => 'SellingLists',
                                        'action' => 'index']); ?>
    </body>
</html>

