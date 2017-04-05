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
?>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html {
      background-color:  #EFEFEF;
      background-size: cover; 
      background-attachment: fixed;
    }
    body {
      font: 14px "Lucida Grande", Helvetica, Arial, sans-serif;
    }
    a {
      color: #00B7FF;
    }
    .ddl-select.input-group-btn{
      width: 100px;
    }
    .category-warpper {
      top: 300px;
    }
    .category-row {
      display: flex;
    }
    .row {
      width: 150px;
    }
    .card {
      width: 150px;
      height: 150px;
    }
    .card-image {
      padding-bottom: 30px;
    }
    
  </style>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    
    <div class="page-content"><!-- Your content goes here -->

      <div class="routing">
        <a href="#">Home</a> > Browse</p>
      </div>

      <div class="category-wrapper">
        <div class="category-row">
        <?php foreach ($id as $row): ?>
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <?= $this->Html->link($row->category_name,
                                        ['controller' => 'Listings',
                                         'action' => 'index',
                                         'category' => $row->category_name]
                                         //'course' => $filters['course'],
                                         //'condition' => $filters['condition']
                                         );?>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
        <!--<div class="category-row">
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <//?= //$this->Html->link( 'Books', ['controller' => 'Categories', 'action' => 'view', 'books'] );?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <//?= //$this->Html->link( 'Clothings', ['controller' => 'Categories', 'action' => 'view', 'clothes'] );?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <a href="#">home & kitchen</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="category-row">
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <a href="#">electronics</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <a href="#">sports and outdoors</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <div class="card grey lighten-5">
                <div class="card-action">
                  <a href="#">other</a>
                </div>
              </div>
            </div>
          </div>
        </div>-->

        <!--<div class="category-row">-->
          <div class="row">
            <div class="col s12 m6">
              <div class="card  grey lighten-5">
                <div class="card-action">
  <?= $this->Html->link( 'All', ['controller' => 'Listings', 'action' => 'index'] );?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--<//?= //'works' ?> 
        <?php //foreach ($id as $row): ?>
          <li> <//?= $row//->category_name ?> </li>
          <li> <//?= //'works' ?> </li>
      <?php //endforeach; ?>-->
      </div>
    </div>
