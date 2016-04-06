<h1> Does this shit even work? </h1>

<?= $this->Text->toList($tags); ?>


<section>
<?php
    foreach($bookmarks as $bookmark){ ?>
    <article>
        <h4><?= $this->Html->link($bookmark->title, $bookmark->url); ?></h4>
        <small><?= h($bookmark->url) ?></small>
        <?= $this->Text->autoParagraph($bookmark->description); ?>
    </article>
    <?php } ?>
</section>