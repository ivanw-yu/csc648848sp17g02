<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');" style = "text-align: center; opacity: 0.5; height: 30%;  background: red; font-weight: bold"><?= $message ?></div>
