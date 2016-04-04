<h1>Questions</h1>

<?php foreach ($questions as $question): ?>
  <div><?= $question->type ?></div>
<?php endforeach; ?>

<?php foreach ($questions as $question): ?>
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
<?php endforeach; ?>