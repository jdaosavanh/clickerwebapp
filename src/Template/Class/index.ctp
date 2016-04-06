<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clas'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="class index large-9 medium-8 columns content">
    <h3><?= __('Class') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($class as $clas): ?>
            <tr>
                <td><?= $this->Number->format($clas->id) ?></td>
                <td><?= $clas->has('user') ? $this->Html->link($clas->user->id, ['controller' => 'Users', 'action' => 'view', $clas->user->id]) : '' ?></td>
                <td><?= h($clas->created) ?></td>
                <td><?= h($clas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
