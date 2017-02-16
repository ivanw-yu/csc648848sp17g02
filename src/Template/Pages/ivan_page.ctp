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
        <title> Ivan Yu Page </title>
      <meta charset = "utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
                .jumbotron {
                        position: relative;
                        height:50%;
                        width: 50%;
                        margin: auto;
                        border-radius: 3px;
                        background-color: black;
                        color: white;
                        text-align:left;
                        padding: 5em;
                }
                .jumbotron>div {
                        width: 100%;
                        text-align: left;
                }
		.aboutbox {
			vertical-align: center;
		}
                .inner-header {
                  text-decoration: underline;
                  color: white;
                }
                .header {
                  border: 1px solid white;
                  position: relative;
                  padding: 5%;
                  margin: auto;
                  width: 75%;
                  height: 30%;
                  color: white;
		  top: 40%;
                  text-align: center;
                }
                body {
                  background-image: url(<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/ivanpagebackground.jpeg);
                  background-attachment: fixed;
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: 100% 100%;
                  font-family: Calibre, Georgia, sans-serif;
                }
        </style>
</head>
<body>
	<nav class = "navbar navbar-inverse">
        	<div class = "container-fluid">
          		<div class = "navbar-header">
                		<a class = "navbar-brand"> Ivan's Page </a>
          		</div>
        	</div>
        </nav>
	<br><br><br><br><br>
        <div class = "jumbotron aboutbox">
                      <h1 class="header"> Ivan Yu </h1>
                      <div>
                      <h2 class="inner-header"> About Me </h2>
                      <p> </p>
                      <ul>
                        <li> San Francisco State University, Computer Science Major (GPA: 3.86) </li>
                        <li> Known Programming Languages: Java, C++, C, PHP, Ruby, Javascript, HTML, CSS, SQL</li>
                      </ul>
                    </div>
        </div>
	<br><br><br>
</body>
</html>
