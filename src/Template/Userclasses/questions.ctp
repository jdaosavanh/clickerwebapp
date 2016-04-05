
<?php $i = 0 ?>
<?php if($questions): ?>
    <div class="row">
    <h1>Questions</h1>
<?php foreach ($questions as $question): ?>

        <div class="questions-con small-5 columns"><?= $question->type ?></div>
        <div class="questions-add-answer small-2 columns"><?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
                <?php echo $this->Html->link('Add Answer', array('controller' => 'answers',
                    'action'=> 'add', $question->id, $class_id)) ?>
            <?php endif; ?></div>

        <div class="answers-con small-12 columns">
        <?php foreach($answers[$i++] as $answer): ?>
            <div><?php echo $answer['answer']; ?></div>
        <?php endforeach; ?>
        </div>

<?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="add-question">
    <?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
        <?php echo $this->Html->link('Add Questions', array('controller' => 'questions',
            'action'=> 'add', $class_id)) ?>
    <?php endif; ?>
</div>

<div class="go-back">
    <?php echo $this->Html->link('Go back to Classes', array('controller' => 'users',
        'action'=> $this->request->session()->read('Auth.User.id'))) ?>
</div>

<?php foreach ($questions as $question): ?>
    <!--
    <tr>
        <td><?= $this->Number->format($question->id) ?></td>
        <td><?= $question->has('userclass') ? $this->Html->link($question->userclass->id, ['controller' => 'Userclasses', 'action' => 'view', $question->userclass->id]) : '' ?></td>


        <td><?= h($question->created) ?></td>
        <td><?= h($question->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
        </td>
    </tr>
    -->
<?php endforeach; ?>