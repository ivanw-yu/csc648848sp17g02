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

 
    <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

  <body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" >About David</a>
    </div>
  </div>
</div>

    <style>
   .jumbotron{   padding-top: 80px;
   }
    html {
      background: url(<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/david_bg.jpg);
    }
    </style>
<div class="jumbotron">
  <div align="center">
    <ul>
      <li>Student at SFSU</li>
      <li>Interested in numerical analysis and machine learning.</li>
    </ul>
  </div>
      
</div><!-- /.container -->  </body>
</html>
