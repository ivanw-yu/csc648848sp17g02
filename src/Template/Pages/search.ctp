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
//$this->layout = true;
?>

<div class="content">
  <nav style="background-color: inherit; height: 50px; line-height: 50px;">
    <div class="bread-wrapper">
      <div class="col s12 bread-content">
        <a href="#!" class="breadcrumb">Home</a>
        <a href="#!" class="breadcrumb">Search</a>
        <a href="#!" class="breadcrumb">"calculus 4th edition book"</a>
      </div>
    </div>
  </nav>
  <div class="search-content">
    <div class="row">
      <div class="search-details" style="width: 100%; padding-right: 4rem; padding-left: 4rem; padding-top: 1rem; padding-bottom: 1rem;">
        <div class="left col m7 s12"> Showing 1-9 of 19 results of "calculus 4th edition book"</div>
        <div class="right col m4 s12 sorting"> 
          <span class="right"> here</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col m3 s12">
        <form action="#">
          <ul class="collapsible" data-collapsible="expandable" style="line-height: normal; min-width: 90%">
            <li>
              <div class="collapsible-header active" style="padding-left: 2rem;">CATEGORIES</div>
              <div class="collapsible-body" style="padding-top: 10px; padding-bottom: 10px;">
                <p>
                  <input type="checkbox" id="test1" />
                  <label for="test1">Books</label>
                </p>
                <p>
                  <input type="checkbox" id="test2" />
                  <label for="test2">Clothing</label>
                </p>
                <p>
                  <input type="checkbox" id="test3" />
                  <label for="test3">Books</label>
                </p>
                <p>
                  <input type="checkbox" id="test4" />
                  <label for="test4">Outdoors</label>
                </p>
              </div>
            </li>
            <li>
              <div class="collapsible-header active" style="padding-left: 2rem;">CONDITIONS</div>
              <div class="collapsible-body" style="padding-top: 10px; padding-bottom: 10px;"">
                <p>
                  <input type="checkbox" id="test5" />
                  <label for="test5">New</label>
                </p>
                <p>
                  <input type="checkbox" id="test6" />
                  <label for="test6">Like New</label>
                </p>
                <p>
                  <input type="checkbox" id="test7" />
                  <label for="test7">Good</label>
                </p>
                <p>
                  <input type="checkbox" id="test8" />
                  <label for="test8">Fair</label>
                </p>
                <p>
                  <input type="checkbox" id="test9" />
                  <label for="test9">Poor</label>
                </p>

               
              </div>
            </li>
          </ul>
        </form>
      </div>
      <div class="col m9 s 12">

      </div>
    </div>
    
  </div>


</div>




<script>
   $(document).ready(function(){
    $('.collapsible').collapsible();
  });
        
</script>

