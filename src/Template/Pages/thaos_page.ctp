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
  <title>{{ title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <style type="text/css">
    .about-me-container {
      display: flex;
      margin-right: -50px;
      opacity: 0.5;
    }
    
  </style>

</head>
<body>
  <div class="about-me-container">
    <div class="about-me-text"> Hi, I'm Thao and I'm a student at San Francisco State University. After finishing school, I want to start my career as a Front-End developer.</div>
  </div>
</body>
</html>
