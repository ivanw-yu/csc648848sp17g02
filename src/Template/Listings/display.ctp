<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($listings as $row): ?>
   <li> <?= $row->item_desc ?> </li>
   <img src="data:image;base64, <?= $row->image ?>" />
<?php endforeach; ?>
</ul>
