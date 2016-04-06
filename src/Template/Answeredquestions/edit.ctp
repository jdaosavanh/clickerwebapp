<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $answeredquestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $answeredquestion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Answeredquestions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answeredquestions form large-9 medium-8 columns content">
    <?= $this->Form->create($answeredquestion) ?>
    <fieldset>
        <legend><?= __('Edit Answeredquestion') ?></legend>
        <?php
            echo $this->Form->input('question_id', ['options' => $questions]);
            echo $this->Form->input('student');
            echo $this->Form->input('answertoquestion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
