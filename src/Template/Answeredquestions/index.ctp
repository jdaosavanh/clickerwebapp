<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Answeredquestion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answeredquestions index large-9 medium-8 columns content">
    <h3><?= __('Answeredquestions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('question_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answeredquestions as $answeredquestion): ?>
            <tr>
                <td><?= $this->Number->format($answeredquestion->id) ?></td>
                <td><?= $answeredquestion->has('question') ? $this->Html->link($answeredquestion->question->id, ['controller' => 'Questions', 'action' => 'view', $answeredquestion->question->id]) : '' ?></td>
                <td><?= h($answeredquestion->created) ?></td>
                <td><?= h($answeredquestion->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $answeredquestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $answeredquestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answeredquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answeredquestion->id)]) ?>
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
