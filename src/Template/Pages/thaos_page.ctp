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
  <title>Thao's Page</title>
  <meta charset="utf-8">
  <meta htp-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:300" rel="stylesheet">

  <style type="text/css">
    html {
      background: url(<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/thaospagebg.jpg) center no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    #content {
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      top: 20px; /* Header Height */
      bottom: 20px; /* Footer Height */
      width: 99.4%;
    }
    .about-me-container {
      height: 225px;
      width: 400px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0.75;
      background-color: #333333;
    }
    .about-me-text {
      font-family: 'Comfortaa', cursive;
      font-weight: 500;
      text-align: justify;
      color: #6E94FF;
      padding: 25px;
    }
    
  </style>

</head>
<body>
  <div id="content">
    <div class="about-me-container">
      <div class="about-me-text">
        <h1 class="about-me-header">
          <center>About Thao</center>
        </h1>
        <p>Hi, I'm Thao and I'm a student at San Francisco State University. After finishing school, I want to start my career as a Front-End developer. In my leisure time, I like to go on hikes and take cool photos like the one used as the background of this page.</p>
      </div>
    </div>
  </div>
</body>
</html>
