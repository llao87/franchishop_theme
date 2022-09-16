<div class="text-list">
    <p class="list-title"><?= $args['block']['text'] ?></p>
    <ul class="list">
        <?php foreach($args['block']['list-items'] as $li): ?>
            <li class="list-item"><?= $li['list-items'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>