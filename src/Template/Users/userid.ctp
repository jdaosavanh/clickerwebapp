
<?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
    <h1>Hello <?= h($user_email) ?></h1>
    <div class="User-classes">
        <div class="user-list-of-classes">These are the classes you created:</div>
    <?php foreach ($userclasses as $userclass): ?>
        <div class="row medium-collapse large-collapse ">
            <div class="small-3 columns">
                <?php echo $this->Html->link($userclass->class, array('controller' => 'userclasses',
                    'action'=> 'questions', $userclass->id)) ?></div>
                <div class="small-3 columns"><?php echo $this->Html->link('Add Questions', array('controller' => 'userclasses',
                'action'=> 'questions', $userclass->id)) ?></div>
            <div class="small-3 columns"><?= $this->Form->postLink(__('Delete'), ['controller'=>'userclasses','action' => 'delete', $userclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userclass->id)]) ?></div>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="add-class">
        <?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
            <?php echo $this->Html->link('Add Class', array('controller' => 'userclasses',
                'action'=> 'add', $user_id)) ?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php foreach ($userclasses as $userclass): ?>
        <div class="row medium-collapse large-collapse ">
            <div class="small-3 columns">
                <?php echo $this->Html->link($userclass->class, array('controller' => 'userclasses',
                    'action'=> 'classquestions', $userclass->id)) ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

