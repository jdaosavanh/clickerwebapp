<h1>Hello</h1>
<div class="user-email"><?= h($user_email) ?></div>
<div class="user-email"><?= h($user_id) ?></div>

<div class="User-classes">
<?php foreach ($userclasses as $userclass): ?>
    <div class="row medium-collapse large-collapse ">
        <div class="small-3 columns"><?= h($userclass->class) ?></div>
        <div class="small-3 columns"><?php echo 'Add Questions' ?></div>
        <div class="small-3 columns"><?php echo 'Delete' ?></div>
    </div>
<?php endforeach; ?>
</div>

<div class="add-class">
    <?php echo $this->Html->link('Add Class', array('controller' => 'userclasses',
        'action'=> 'add', $user_id)) ?>
</div>

<?php foreach ($userclasses as $userclass): ?>
    <div>
       <!-- <div><?= $this->Number->format($userclass->id) ?></div> -->
        <!--  <td><?= $userclass->has('user') ? $this->Html->link($userclass->user->id, ['controller' => 'Users', 'action' => 'view', $userclass->user->id]) : '' ?></td> -->
        <!-- <td><?= h($userclass->class) ?></td> -->
       <!-- <td><?= h($userclass->modified) ?></td> -->
    </div>
<?php endforeach; ?>


<!-- <?php //foreach ($userclasses as $userclass): ?>
    <tr>
        <td><?= $this->Number->format($userclass->id) ?></td>
        <td><?= $userclass->has('user') ? $this->Html->link($userclass->user->id, ['controller' => 'Users', 'action' => 'view', $userclass->user->id]) : '' ?></td>
        <td><?= h($userclass->class) ?></td>
        <td><?= h($userclass->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $userclass->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userclass->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userclass->id)]) ?>
        </td>
    </tr>
<?php //endforeach; ?> -->