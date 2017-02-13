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
      <style>
        .topLabel {
          width: 100%;
          height: 200px;
          text-align: center;
          margin-bottom: 20px;
        }
      </style>
  </head>
  <body>
      <?php /*echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);*/
        echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/';
        if($url == 'http://sfsuse.com/~ivnyu/' || $url == 'sfsuse.com/~ivnyu/' || $url == 'http://www.sfsuse.com/~ivnyu/' || $url == 'www.sfsuse.com/~ivnyu/'){
                echo '\n'.$_SERVER['REQUEST_URI'];
        }else{
                echo "false" . $_SERVER['REQUEST_URI'];
        }
                 ?>
      <div class = "topLabel">
        <h1> Software Engineering class SFSU </h1>
        <h2> Spring 2017 </h2>
        <h2> Section 1 </h2>
        <h2> Team 2 </h2>
      </div>
      <nav class = "navbar navbar-default">
        <div class = "container-fluid">
          <ul class = "nav navbar-nav">
            <li><a href="sfsuse.com/~ivnyu">Ivan Yu</a></li>
            <li><a> member2 </a></li>
            <li><a> member3 </a></li>
            <li><a> member4 </a></li>
            <li><a> member4 </a></li>
          </ul>
        </div>
      </nav>
  </body>
</html>
