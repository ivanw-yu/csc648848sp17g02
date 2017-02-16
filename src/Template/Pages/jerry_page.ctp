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
    <meta charset = "utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
            
	   h1, h2, h3, h4, h5, h6 {
           	 font-family: 'Corben', Georgia, Times, serif;
            }
            p, div {
              font-family: 'Nobile', Helvetica, Arial, sans-serif;
            }

                .inner-header {
                  text-decoration: underline;
                  color: white;
                }
                .header {
                  border: 2px solid white;
                  position: relative;
                  padding: .3em;
                  margin: auto;
		  width: center;
                  height: center;
                  color: black;
                  text-align: center;
                }
     		 body {
         	 background-image: url(<?php if(strpos(dirname($_SERVER['PHP_SELF']), 'sp17g02') !== false){echo '..';}else{ echo 'webroot';} ?>/img/jerrybg.jpeg);
                  background-attachment: fixed;
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: 100% 100%;
                  font-family: Calibre, Georgia, sans-serif;
      		}
      </style>
	<link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
 	<link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">
 </head>

      
<body>
    <title> About Jerry</title>
    <nav class = "navbar navbar-inverse">
          <div class = "container-fluid">
              <div class = "navbar-header">
              </div>
          </div>
        </nav>
    
    
    
    
  <div>
  <br/>
  <br/>
      <h1 class= "header"> About Jerry Auyeung </h1>
      <div class = "container">
            <div class= "row">
  <br/>
  <br/> 
  <br/>
  <br/>
  <br/>
  <br/>
                  <div class ="col-sm-6">
                  Student at San Francisco State
                  </div>
                  <div>
                  Random facts:
                  I am still learning.
                  I like screaming.
                  </div>
     	    </div>
      </div>
</body>      
</html>`
