<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> <?= $row->item_desc ?> </li>
<?php endforeach; ?>
</ul>
