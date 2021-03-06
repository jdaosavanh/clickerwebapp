
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
<!--            --><?php //echo $this->Html->link('Add Class', array('controller' => 'userclasses',
//                'action'=> 'add', $user_id)) ?>

            <input type="text" placeholder="Add class here" maxlength="255" id="classname">
            <a class="button anthracite-gradient" onclick="addClass(<?php echo $user_id ?> )">Add Class </a>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="not-login-classes">
        <div class="row medium-collapse large-collapse" >
    <?php foreach ($userclasses as $userclass): ?>

            <div class="small-12 columns">
                <?php echo $this->Html->link($userclass->class, array('controller' => 'userclasses',
                    'action'=> 'classquestions', $userclass->id, $user_id)) ?>
            </div>

    <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<script>
    function addClass(user_id)
    {
        var classname =  $("#classname").val();
        $.ajax({
            type:"POST",
            data:{classname:classname, user_id:user_id},
            url:"/userclasses/add/",

            success : function(data) {
                location.reload();

            },
            error : function(data) {
                alert("Error");
            }
        });
    }</script>


