
<?php $i = 0 ?>
<?php if($questions): ?>
    <div class="row">
    <h1>Questions:</h1>
<?php foreach ($questions as $question): ?>

        <div class="questions-con small-5 columns"><?= $question->type ?></div>
        <div class="questions-add-answer small-2 columns"><?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
                <?php echo $this->Html->link('Add Answer', array('controller' => 'answers',
                    'action'=> 'add', $question->id, $class_id)) ?>
            <?php endif; ?></div>
    <div class="delete-question small-3 columns"><?= $this->Form->postLink(__('Delete'), ['controller'=>'questions','action' => 'delete', $question->id,$class_id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?></div>

        <div class="answers-con small-12 columns">
        <?php foreach($answers[$i++] as $answer): ?>
            <div><?php echo $answer['answer']; ?></div>
        <?php endforeach; ?>
        </div>

<?php endforeach; ?>

<?php endif; ?>
<div class="add-question small-12 columns">
    <?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
<!--        --><?php //echo $this->Html->link('Add Questions', array('controller' => 'questions',
//            'action'=> 'add', $class_id)) ?>
        <input type="text" placeholder="Add your question here" maxlength="255" id="addquestion">
        <a class="button anthracite-gradient" onclick="addQuestion(<?php echo $class_id ?> )">Add Question </a>
    <?php endif; ?>

</div>

<div class="go-back small-12 columns">
    <?php echo $this->Html->link('Go back to Classes', array('controller' => 'users',
        'action'=> $this->request->session()->read('Auth.User.id'))) ?>
</div>
</div>
<script>
    function addQuestion(class_id)
    {
        var addquestion =  $("#addquestion").val();
//        var answer = $("input[name=" + question_id + "]:checked").val();
        $.ajax({
            type:"POST",
            data:{class_id:class_id, addquestion:addquestion},
            url:"/questions/add/",

            success : function(data) {
                location.reload();

            },
            error : function(data) {
                alert("Error");
            }
        });
    }

    function addAnswer()
    {

    }
</script>