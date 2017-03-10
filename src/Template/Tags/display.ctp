<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> <?= $row->tag_name ?> </li>
<?php endforeach; ?>
</ul>
