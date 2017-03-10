<?php
/**
  * @var \App\View\AppView $this
  */
?>
<ul>
<?php foreach ($id as $row): ?>
   <li> From: <?= $row->registered_user_id ?> </li>
   <li> To: <?= $row->recipient_id ?> </li>
<?php endforeach; ?>
</ul>
