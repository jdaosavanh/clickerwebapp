
<?php $i = 0 ?>
<?php if($questions): ?>
<div class="row center">
    <h1>Derpa:</h1>
   <div class="large-12 columns">
       <div class="large-5 columns">
           <input type="text" placeholder="Please enter your Student ID" name="studentID" maxlength="255" id="studentid">
       </div>
   </div>
    <?php foreach ($questions as $question): ?>

        <div class="questions-con small-12 columns"><?= $question->type ?></div>
<!--        <div class="questions-add-answer small-2 columns">--><?php //if($user_id == $this->request->session()->read('Auth.User.id')):?>
<!--                --><?php //echo $this->Html->link('Answer question', array('controller' => 'answeredquestions',
//                    'action'=> 'add', $question->id, $class_id)) ?>
<!--            --><?php //endif; ?><!--</div>-->

        <div class="answers-con small-12 columns">
            <form for=<?php echo $question->id ?> >
                <?php $answercount= 1 ?>
            <?php foreach($answers[$i++] as $answer): ?>

                <div> <input type="radio" id=<?php echo $answercount++ ?> name=<?php echo $question->id ?> value="<?php echo $answer['answer'];  ?>" /> <?php echo $answer['answer']; ?></div>

            <?php endforeach; ?>
            </form>
            <a class="button anthracite-gradient" onclick="sendAnswer(<?php echo $question->id ?> )">submit </a>
        </div>

    <?php endforeach; ?>

    <?php endif; ?>

    <div class="go-back small-12 columns">
        <?php echo $this->Html->link('Go back to Classes', array('controller' => 'users',
            'action'=> $return_id)) ?>
    </div>
</div>
<script>
    function sendAnswer(question_id)
    {
        var student =  $("#studentid").val();
        var answer = $("input[name=" + question_id + "]:checked").val();

            $.ajax({
                type:"POST",
                data:{student:student, question_id:question_id,answertoquestion:answer},
                url:"/answeredquestions/add/",

                success : function(data) {
                    console.log('submit');
                    alert("Submitted");

                },
                error : function(data) {
                    alert("Error");
                }
            });



    }
</script>
