<h1>Hello <?= h($user_email) ?></h1>


<div class="User-classes">
    <div class="user-list-of-classes">These are the classes you created:</div>
<?php foreach ($userclasses as $userclass): ?>
    <div class="row medium-collapse large-collapse ">
        <div class="small-3 columns">
            <?php echo $this->Html->link($userclass->class, array('controller' => 'userclasses',
                'action'=> 'questions', $userclass->id)) ?></div>
        <?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
        <div class="small-3 columns"><?php echo 'Add Questions' ?></div>
        <div class="small-3 columns"><?php echo 'Delete' ?></div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>

<div class="add-class">
    <?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
    <?php echo $this->Html->link('Add Class', array('controller' => 'userclasses',
        'action'=> 'add', $user_id)) ?>
    <?php endif; ?>
</div>



