<div class="row student-question">
    <div class="student-id small-3 columns"><?php echo 'Student ID' ?></div>
    <div class="answertoquestion-con small-3 columns"><?php echo 'Answer to Question' ?></div>
</div>
<?php foreach ($answers as $answer): ?>
    <?php if($answer['student'] == '')continue ?>
    <div class="row answeredquestions-block">
        <div class="answeredquestions-con small-3 columns"><?= $answer['student'] ?></div>
        <div class="answeredquestions-con small-3 columns"><?= $answer['answertoquestion'] ?></div>
    </div>
<?php endforeach; ?>

