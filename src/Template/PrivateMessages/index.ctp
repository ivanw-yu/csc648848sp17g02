<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - Messages';
$this->assign('title', $title);
?>

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><//?= __('Actions') ?></li>
        <li><//?= $this->Html->link(__('New Private Message'), ['action' => 'add']) ?></li>
        <li><//?= $this->Html->link(__('List Registered Users'), ['controller' => 'RegisteredUsers', 'action' => 'index']) ?></li>
        <li><//?= $this->Html->link(__('New Registered User'), ['controller' => 'RegisteredUsers', 'action' => 'add']) ?></li>-->
        <!-- Conversations can only be seen by clicking on one in the table.
             They can only be added by creating a new private message or by
             clicking on a conversation and replying. -->
        <!--<li><//?= //$this->Html->link(__('List Conversations'), ['controller' => 'Conversations', 'action' => 'index']) ?></li>
        <li><//?= //$this->Html->link(__('New Conversation'), ['controller' => 'Conversations', 'action' => 'add']) ?></li>
    </ul>
</nav>-->

<div class="privateMessages index l9 m8 s12 columns content">
    <!-- <h2> Welcome <//?= $currentUser ?>, here are your messages</h2> -->
    
    <div class="row" style="display: flex; justify-content: center; padding: 20px;">
        <fieldset class="col s12 m8" style = "background-color:white; font-size: 1.05em; box-shadow: 5px 5px 10px #cecece; display: flex; justify-content: center;">

            <?php if($message_id === null): ?>
                 <legend style = "font-size: 2em"><?= __('Messages') ?></legend>
            <?php else: ?>
                 <legend style = "font-size: 2em"><?= __('Messages for ' . $item->title) ?></legend>
            <?php endif; ?>
           
            <div cellpadding="0" cellspacing="0" style="width: 100%;">
                    <?php foreach ($privateMessages as $privateMessage): ?>
                    <div class="row">
                       
                        <?php if($message_id === null): ?>
                            <div class="col s4" style="padding-top: 20px; padding-bottom: 15px;">
                                <div class="row">
                                    <?= h($items->find()->where(['listing_num' => $privateMessage->listing_id])->first()->title) ?>
                                    <?php $blobimg = stream_get_contents($items->find()->where(['listing_num' => $privateMessage->listing_id])->first()->image); ?>
                                </div>
                                <div class="row">

                                    <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                                        <?= $blobimg!== null ? '<img src = "' . $blobimg . '" style = "width: 15vw; height: 15vw;"  alt = "no image"/>' : 'Item has been removed'?>
                                    </a>
                                </div>                            
                            </div>
                        <?php endif; ?>

                        <?php if($message_id !== null): ?>
                            <div class="col s4" style="padding-top: 20px; padding-bottom: 15px;">
                                <div class="row">
                                    <?php $blobimg = stream_get_contents($items->find()->where(['listing_num' => $privateMessage->listing_id])->first()->image); ?>
                                </div>
                                <div class="row">
                                    <a class = "aclass" onclick = "displaythumbnail('<?php echo $blobimg; ?>');" >
                                            <?= $item->has('image') ? '<img src = "' . $blobimg . '" style = "width: 15vw; height: 15vw;" />' : '' ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class=" col s8 actions">
                            
                                <table cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('registered_user_id', 'Buyer') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('recipient_id', 'Seller') ?></th>
                                            <!--<th scope="col"><//?= $this->Paginator->sort('conversation_id') ?></th>-->
                                            <!--<th scope="col"><//?= $this->Paginator->sort('is_read') ?></th>-->
                                        </tr>
                                    </thead>

                                    <tbody class="row">
                                        <td><?= $this->Html->link(__($privateMessage->subject),
                                                [
                                                 'controller' => 'Conversations',
                                                 'action' => 'index', $privateMessage
                                                                          ->conversation_id
                                                ]) ?>
                                        </td>
                                        <td><?= h($privateMessage->registered_user_id) ?></td>
                                        <td><?= h($privateMessage->recipient_id) ?></td>
                                    </tbody>
                                </table>
                        <!--<td><//?= $privateMessage->has('registered_user') ? $this->Html->link($privateMessage->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $privateMessage->registered_user->username]) : '' ?></td>-->
                        <!--<td><//?= $privateMessage->has('conversation') ? $this->Html->link($privateMessage->conversation->conversation_num, ['controller' => 'Conversations', 'action' => 'view', $privateMessage->conversation->conversation_num]) : '' ?></td>
                        <td><//?= h($privateMessage->is_read) ?></td>-->
                        
                            <!--<//?= $this->Html->link(__('Edit'), ['action' => 'edit', $privateMessage->registered_user_id]) ?>-->
                            <!--<//?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $privateMessage->registered_user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $privateMessage->registered_user_id)]) ?>-->
                        </div>
                    </div>
                    <div class="divider"></div>
                    <?php endforeach; ?>
            </div>
        </fieldset>
    </div>
    <div class="paginator row" style = "display: flex; justify-content: center;">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<a id = 'thumbnailImg' onclick = 'hide();'>

        </a>
        <script>
                                    var displayed = false;
                                    // the parameter is the data url of the blob image.
                                    function displaythumbnail(theimg) {
                                        var thumbnailView = document.getElementById('thumbnailImg');
                                            thumbnailView.style.display = "";
                                            thumbnailView.style.backgroundColor = "rgba(0, 0, 0, 0.5)"; //makes transparent background.
                                            thumbnailView.style.position = "fixed";
                                            thumbnailView.style.top = "0%";
                                            thumbnailView.style.left = "0%";
                                            thumbnailView.zIndex = "100";
                                            thumbnailView.style.width = "100%";
                                            thumbnailView.style.height = "100%";
                                            thumbnailView.style.textAlign = "center";
                                            thumbnailView.style.cursor = "zoom-out";
                                             thumbnailView.innerHTML = '<img src = "' + theimg + '" style = "position: relative; top: 15%; width: 60%; height: 70%" />';
                                            displayed = true;
                                    }
                                    function hide(){
                                        // removes the image after it's clicked again in the enlarged view.
                                        if(displayed){
                                            document.getElementById('thumbnailImg').style.display = "none";
                                            displayed = false;
                                        }
                                    }
        </script>

