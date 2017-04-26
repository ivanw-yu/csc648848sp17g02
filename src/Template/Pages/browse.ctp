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
$title = 'GatorBay - Browse';
$this->assign('title', $title);
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
    width: 200px;
    height: 150px;
    margin: 0 auto;
    float: none;
    margin-bottom: 10px;
    margin-top: 10px;
    text-align: center;
    display: -webkit-flex;
    display: flex;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
  }
  .card-image {
    padding-bottom: 30px;
  }
  
</style>
  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

<div class="content"><!-- Your content goes here -->

  <nav style="background-color: inherit; height: 50px; line-height: 50px;">
    <div class="bread-wrapper">
      <div class="col s12 bread-content">
        <a class="breadcrumb" href="#!" onclick="window.location.href = './'">Home</a>
        <a class="breadcrumb">Categories</a>
      </div>
    </div>
  </nav>

  <div class="page-content">
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
      <div class="row">
          <div class="card grey lighten-5">
            <div class="card-action">
              <?= $this->Html->link( 'All Categories', ['controller' => 'Listings', 'action' => 'index'] );?>
            </div>
          </div>
      </div>
    </div>
</div>


