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
<html lang="en">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <head>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">About Me</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

  </head>
  <body>
    <style>
   h1{   padding-top: 50px;
   }
    </style>
<div class="container">
  <div align="center">
    <h1>Bradley Ng's user page</h1>
    <p class="lead">Bradley Ng is a student at SFSU. Majored in Computer Science. Graduating this May probably.<br> Student ID:912454236</p>
    
  </div>
  <div align="center">
        <p>
          <img src="https://static.pexels.com/photos/230338/pexels-photo-230338.jpeg" height="100" width="100" >
    </p>
  </div>
      
</div><!-- /.container -->  </body>
</html>