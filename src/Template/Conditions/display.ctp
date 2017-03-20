<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> <?= $row->condition_name ?> </li>
<?php endforeach; ?>
</ul>
