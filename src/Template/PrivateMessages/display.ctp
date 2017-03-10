<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> <?= $row->subject ?> </li>
<?php endforeach; ?>
</ul>
