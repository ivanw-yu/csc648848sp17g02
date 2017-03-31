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
$this->layout = false;
?>

<!DOCTYPE html>
<html>
  <head>
      <title></title>
      <meta charset = "utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
  </head>
  <body>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    
    <div class="page-content"><!-- Your content goes here -->
    <!-- Nav-bar -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <?= $this->Html->link( "GatorBay", ['controller' => 'Pages', 'action' => 'display'], ['class' => 'navbar-brand'] );?>
          </div>

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
                      <?php foreach ($courses as $row): ?>
<option value="<?= $row->course_name?>"><?= $row->course_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>

                <div class="ddl-select input-group-btn">
                  <select name='condition' id="ddlsearch" class="selectpicker form-control" data-style="btn-primary">
                    <!-- value="" makes the controller search for everything.  -->
                    <option value="">All conditions</option>
                      <?php foreach ($conditions as $row): ?>
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

          <ul class="nav navbar-nav">
            <li><a href="#">signin/register</a></li>            
          </ul>
        </div>
      </nav>

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
  </body>
</html>
