<?php
/**
  * @var \App\View\AppView $this
  */
$title = 'GatorBay - Reply to Message';
$this->assign('title', $title);
?>

<div class="conversations index l9 m8 s12 columns content">
    <div class="row" style="display: flex; justify-content: center; padding: 16px;">
        <fieldset class="col s12 m8" style = "background-color:white; box-shadow: 5px 5px 10px #cecece; display: flex; justify-content: center;">
            <legend style = "font-size: 2em"><?= __('Reply to Message') ?></legend>
            <table cellpadding="0" cellspacing="0" style = "margin: auto">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('date_created', 'Date Sent') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('registered_user_id', 'Sender') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($conversations as $conversation): ?>
                    <tr>
                        <td><?= h($conversation->message) ?></td>
                        <td><?= h($conversation->date_created) ?></td>
                        <td><?= h($conversation->registered_user_id) ?></td>
                        <td><?= $conversation->has('registered_user') ? $this->Html->link($conversation->registered_user->username, ['controller' => 'RegisteredUsers', 'action' => 'view', $conversation->registered_user->username]) : '' ?></td>
                        <td class="actions">
                <!-- Viewing, editing, and deleting a single message doesn't make
                     sense right now.  Maybe in the future, but it's not first
                     priority.
                 -->
                            <!--<//?= $this->Html->link(__('View'), ['action' => 'view', $conversation->conversation_num]) ?>
                            <//?= $this->Html->link(__('Edit'), ['action' => 'edit', $conversation->conversation_num]) ?>
                            <//?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conversation->conversation_num], ['confirm' => __('Are you sure you want to delete # {0}?', $conversation->conversation_num)]) ?>-->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->Form->create(NULL, ['url' => ['controller' => 'Conversations',
                                             'action' => 'add', $sender,
                                                                $recipient,
                                                                $conversation_id
                                  ]]) ?>
                <div class="row" style="width: 100%;">
                    <div class="col m7 s7">
                        <?php echo $this->Form->input('message', ['type' =>'textarea', 'rows' => '100', 'style' => 'height: 20vh;;']); ?>
                    </div>
                    <div class="col s5" style="height: 100%; display: flex; align-items: center; padding-top: 25px;">
                        <?= $this->Form->button(__('Reply'), ['class' => 'btn grey']) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>


        </fieldset>
    </div>
<!--     <div class="paginator">
        <ul class="pagination">
            <//?= $this->Paginator->first('<< ' . __('first')) ?>
            <//?= $this->Paginator->prev('< ' . __('previous')) ?>
            <//?= $this->Paginator->numbers() ?>
            <//?= $this->Paginator->next(__('next') . ' >') ?>
            <//?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><//?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
   
  
</div>
