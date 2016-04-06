<div class="answeredquestions form large-9 medium-8 columns content">
    <?= $this->Form->create($answeredquestion) ?>
    <fieldset>
        <legend><?= __('Answer question') ?></legend>
        <?php
            echo $this->Form->input('student');
            echo $this->Form->input('answertoquestion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
