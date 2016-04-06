<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Answeredquestion'), ['action' => 'edit', $answeredquestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Answeredquestion'), ['action' => 'delete', $answeredquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answeredquestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Answeredquestions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answeredquestion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="answeredquestions view large-9 medium-8 columns content">
    <h3><?= h($answeredquestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Question') ?></th>
            <td><?= $answeredquestion->has('question') ? $this->Html->link($answeredquestion->question->id, ['controller' => 'Questions', 'action' => 'view', $answeredquestion->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Student') ?></th>
            <td><?= h($answeredquestion->student) ?></td>
        </tr>
        <tr>
            <th><?= __('Answertoquestion') ?></th>
            <td><?= h($answeredquestion->answertoquestion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($answeredquestion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($answeredquestion->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($answeredquestion->modified) ?></td>
        </tr>
    </table>
</div>
