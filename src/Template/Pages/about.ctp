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
<style>
	ul.about{
   		 margin: 0px 150px 0px 150px;
	}
</style>
<div align = "center">

  <p>
    GatorBay is a small startup website created for San Francisco State University Students that caters to the need for buying and selling items.
  </p>
</div>
 <div>
        <ul class="about">
        <h2> Members: </h2>
	<ul class="about">
          <li><?= $this->Html->link( 'Ivan Yu', ['controller' => 'Pages', 'action' => 'display', 'ivan_page' ] );?></li>
          <li><?= $this->Html->link( 'Ajinkya Chalke', ['controller' => 'Pages', 'action' => 'display', 'ajinkya_page' ] );?></li>
          <li><?= $this->Html->link( 'Bradley Ng', ['controller' => 'Pages', 'action' => 'display', 'brad_page' ] );?></li>
          <li><?= $this->Html->link( 'Thao Luu', ['controller' => 'Pages', 'action' => 'display', 'thaos_page' ] );?></li>
          <li><?= $this->Html->link( 'Jerry Auyeung', ['controller' => 'Pages', 'action' => 'display', 'jerry_page' ] );?></li>
          <li><?= $this->Html->link( 'David Rodriguez', ['controller' => 'Pages', 'action' => 'display', 'david_page' ] );?></li>
        </ul>
	</ul>
      </div>


    </body>
</html>
