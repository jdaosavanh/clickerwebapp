<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clas'), ['action' => 'edit', $clas->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clas'), ['action' => 'delete', $clas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clas->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Class'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clas'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="class view large-9 medium-8 columns content">
    <h3><?= h($clas->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $clas->has('user') ? $this->Html->link($clas->user->id, ['controller' => 'Users', 'action' => 'view', $clas->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($clas->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($clas->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($clas->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($clas->question)); ?>
    </div>
</div>
