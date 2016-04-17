
<?php $i = 0 ?>
<?php if($questions): ?>
<div class="row">
    <h1>You should answer these:</h1>
    <?php foreach ($questions as $question): ?>

        <div class="questions-con small-5 columns"><?= $question->type ?></div>
        <div class="questions-add-answer small-2 columns"><?php if($user_id == $this->request->session()->read('Auth.User.id')):?>
                <?php echo $this->Html->link('Answer question', array('controller' => 'answeredquestions',
                    'action'=> 'add', $question->id, $class_id)) ?>
            <?php endif; ?></div>

        <div class="answers-con small-12 columns">
            <?php foreach($answers[$i++] as $answer): ?>
                <div><?php echo $answer['answer']; ?></div>
            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>

    <?php endif; ?>

    <div class="go-back small-12 columns">
        <?php echo $this->Html->link('Go back to Classes', array('controller' => 'users',
            'action'=> $class_id)) ?>
    </div>
</div>
<a  class="button anthracite-gradient" onclick="sendAnswer('11111','4','a')">submit </a>
<script>
    function sendAnswer(studentid,question_id,answer)
    {


            $.ajax({
                type:"POST",
                data:{student:studentid, question_id:question_id,answertoquestion:answer},
                url:"/answeredquestions/add/",

                success : function(data) {
                    console.log(data);
//                    console.log(studentid);
//                    console.log(question_id);
//                    console.log(answer);


                },
                error : function(data) {
                    console.log(data);
                    alert("false");
                }
            });



    }
</script>
