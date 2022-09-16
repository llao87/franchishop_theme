<?php if (in_array($args['block']['link'], ['#', ''])) : ?>
    <p class="narrow-banner">
        <img class="narrow-banner-img" src="<?= $args['block']['image'] ?>" alt="narrow-banner-1">
    </p>
<?php else : ?>
    <a class="narrow-banner" href="<?= $args['block']['link'] ?>">
        <img class="narrow-banner-img" src="<?= $args['block']['image'] ?>" alt="narrow-banner-1">
    </a>
<?php endif; ?>