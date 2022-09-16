<?php
get_header();
$pageData = get_field('news_item_group');
$banners  = get_field('group-banners', 'option');
$nextPost = get_next_post();
$prevPost = get_previous_post();
?>

<div class="first-section news-article">
	<div class="container">
		<ul class="breadcrubs">
			<li class="breadcrubs-item">
				<a class="breadcrubs-link" href="/news/">Новости</a>
				<span class="breadcrubs-link"><?php the_title() ?></span>
			</li>
		</ul>
		<h1 class="section-title"><?php the_title() ?></h1>
		<div class="news-page">
			<div class="aside">
				<div class="table-contents">
					<div class="title">Разделы:</div>
					<ul class="contents-list">
						<?php foreach (getArticleNav($pageData) as $navItem) : ?>
							<li class="contents-item">
								<a class="contents-link" href="<?= $navItem['link'] ?>"><?= $navItem['title'] ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php foreach ($banners['banners'] as $banner) : ?>
					<?php if ($banner['is-active']) : ?>
						<a class="banner" href="<?= $banner['link'] ?>">
							<img class="banner-img" src="<?= $banner['picture'] ?>" alt="<?= $banner['name'] ?>">
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="main">
				<div class="article-content">
					<?php
					foreach ($pageData['content'] as $block) :
						get_template_part(
							'parts/' . $block['acf_fc_layout'],
							null,
							['block' => $block]
						);
					endforeach;
					?>
				</div>
				<div class="article-controls">
					<?php if (!empty($prevPost)) : ?>
						<a class="prev-article" href="<?= get_permalink($prevPost); ?>">предыдущая статья</a>
					<?php else : ?>
						<span></span>
					<?php endif; ?>

					<?php if (!empty($nextPost)) : ?>
						<a class="next-article" href="<?= get_permalink($nextPost); ?>">следующая статья</a>
					<?php else : ?>
						<span></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="subscribe">
	<div class="container">
		<div class="title">Получайте новости</div>
		<form class="form-subscribe">
			<input class="input-text" type="text" name="email" placeholder="ваша почта">
			<input class="btn btn-blue" type="submit" value="получить">
			<div class="description">Вышлем на почту бесплатную подборку франшиз с инвестицией от 15 000 до 700 000 тыс. руб.</div>
		</form>
		<div class="mail-photo"></div>
	</div>
</div>

<?php get_footer();
