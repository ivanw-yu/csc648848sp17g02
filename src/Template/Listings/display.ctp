<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($listings as $row): ?>
   <li> <?= $row->item_desc ?> </li>
   <img src="data:image;base64, <?= $row->image ?>" style = "width: 50px; height: 50px" />
<?php endforeach; ?>
</ul>
     <?= $this->Html->link('Sell an item',
     ['controller' => 'Listings',
     'action' => 'sell']);?>
