<?php
get_header();
$pageData = get_field('group-about');
?>

<div class="about-section first-section">
	<div class="container">
		<div class="section-title section-title--border"></div>
		<div class="articles">
			<div class="info">
				<div class="about-company">
					<h1 class="title"><?php the_title() ?></h1>
					<div class="text"><?= $pageData['sub-title'] ?></div>
					<div class="text"><?= $pageData['description'] ?></div>
				</div>
				<?php $data = $pageData['counters'] ?>
				<div class="counters">
					<div class="counter">
						<div class="counter-inner">
							<span class="digit"><?= $data['counter-1']['digits'] ?></span>
							<span class="description"><?= $data['counter-1']['description'] ?></span>
						</div>
					</div>
					<div class="counter">
						<div class="counter-inner">
							<span class="digit"><?= $data['counter-2']['digits'] ?></span>
							<span class="description"><?= $data['counter-2']['description'] ?></span>
						</div>
					</div>
					<div class="counter counter--double">
						<div class="counter-inner">
							<span class="digit"><?= $data['counter-3']['digits'] ?>
								<span class="currency"><?= $data['counter-3']['remark'] ?></span>
							</span>
							<span class="description"><?= $data['counter-3']['description'] ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="service-description">
				<?php $data = $pageData['left-column'] ?>
				<div class="catalog">
					<div class="title"><?= $data['title'] ?></div>
					<div class="description"><?= $data['description'] ?></div>
					<a class="btn btn-blue" href="<?= $data['button']['link'] ?>"><?= $data['button']['title'] ?></a>
					<div class="photo"><img class="photo-img" src="<?= $data['picture'] ?>" alt="<?= $data['title'] ?>"></div>
				</div>
				<?php $data = $pageData['right-column'] ?>
				<div class="personal">
					<div class="photo"><img class="photo-img" src="<?= $data['picture'] ?>" alt="<?= $data['title'] ?>"></div>
					<div class="title"><?= $data['title'] ?></div>
					<div class="description"><?= $data['description'] ?></div>
					<a class="btn btn-blue" href="<?= $data['button']['link'] ?>"><?= $data['button']['title'] ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
