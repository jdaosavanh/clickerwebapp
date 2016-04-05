<div class="answers form large-9 medium-8 columns content">
    <?= $this->Form->create($answer) ?>
    <fieldset>
        <legend><?= __('Add Answer') ?></legend>
        <div class="question-hide-type-text">
        <?php
//            echo $this->Form->input('question_id', ['options' => $questions]);
            echo $this->Form->input('answer');
        ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
