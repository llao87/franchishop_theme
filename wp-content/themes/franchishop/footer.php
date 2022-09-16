<?php $siteData = get_field('group-company-info', 'option'); ?>
    <footer>
      <div class="container"> 
        <div class="top">
          <div class="socials"> 
            <div class="title">Наши соцсети</div>
            <div class="icons"> 
              <a class="icon icon-tg" href="<?= $siteData['socials']['tg'] ?>"></a>
              <a class="icon icon-vk" href="<?= $siteData['socials']['vk'] ?>"></a>
              <a class="icon icon-wa" href="<?= $siteData['socials']['wa'] ?>"></a>
              <a class="icon icon-fb" href="<?= $siteData['socials']['fb'] ?>"></a>
            </div>
          </div>
          <div class="info">
            <div class="links">
              <div class="title">Франшизы</div>
              <div class="fast-links"> 
                <a class="link" href="#">Франшиза кафе и ресторанов</a>, <br>
                <a class="link" href="#">Топ франшиз</a>, 
                <a class="link" href="#">Недорогие франшизы</a>, 
                <a class="link" href="#">Франшизы одежды</a>, <br>
                <a class="link" href="#">Франшизы интернет-магазины</a>, 
                <a class="link" href="#">Франшизы ресторана</a>, <br>
                <a class="link" href="#">Франшизы в сфере услуг</a>, 
                <a class="link" href="#">Франшиза по производству</a>, <br>
                <a class="link" href="#">Франшиза по авто</a></div>
            </div>
            <div class="contacts"> 
              <div class="title">Контакты</div>
              <div class="phone">Телефон: <a class="contacts-link" href="tel:<?= $siteData['phone'] ?>"><?= $siteData['phone'] ?></a></div>
              <div class="email">Почта: <a class="contacts-link" href="mailto:<?= $siteData['email'] ?>"><?= $siteData['email'] ?></a></div>
            </div>
          </div>
          <div class="menu">
            <div class="title">Меню</div>
            <?php
                wp_nav_menu([
                    'theme_location' => '',
                    'menu' => FOOTER_MENU_SLUG,
                    'container' => '<div>',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'menu-list',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                    'depth' => 0,
                    'walker' => '',
                ]);
            ?>
          </div>
        </div>
        <div class="bottom">
          <div class="logo">
            <a class="logo-link" href="/">
              <img class="logo-img" src="<?= THEME_DIR . '/img/logo-footer.svg'?>">
            </a>
            <div class="copyrights">© все права защищены</div>
          </div><a class="user-agreement" href="#">пользовательское соглашение</a>
        </div>
      </div>
      <?php wp_footer(); ?>
    </footer>
  </body>
</html>