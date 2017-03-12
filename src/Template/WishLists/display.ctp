<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> <?= $row->listing_id ?> </li>
<?php endforeach; ?>
</ul>
