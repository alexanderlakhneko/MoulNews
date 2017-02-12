<div class="starter-template">
    <?php foreach ($data['comment'] as $key => $value): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Написал: <a><?= $value['name'] ?></a>
                    Дата\Время:<?= $value['date_time'] ?>
                </h3>
            </div>
            <div class="panel-body"><?= $value['comment'] ?></div>
            <div class="panel-footer" style="padding: 4px 15px; overflow: hidden;">Заголовок
                новости: <?= $value['title'] ?></div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo $pagination->get(); ?>

