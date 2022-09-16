<?php
get_header();
$siteData = get_field('group-company-info', 'option');
$tehpodData = get_field('group-teh-podderjka', 'option');
?>

<div class="contacts-section first-section"> 
      <div class="container"> 
        <div class="section-title">Контактная информация</div>
        <div class="map-row">
          <div class="company-data"> 
            <div class="requisites-wrap"> 
              <div class="title">Реквизиты компании:</div>
              <div class="requisites">
                <div class="name"><?= $siteData['informacziya_o_kompanii']['name'] ?></div>
                <div class="ogrn">ОГРНИП <?= $siteData['informacziya_o_kompanii']['ogrnip'] ?></div>
                <div class="inn">ИНН <?= $siteData['informacziya_o_kompanii']['inn'] ?></div>
                <a class="file-link" href="<?= $siteData['rekvizity_pdf'] ?>">скачать в PDF</a>
              </div>
            </div>
            <div class="address-wrap"> 
              <div class="title">Адрес компании:</div>
              <div class="work-data">
                <div class="address"><?= $siteData['informacziya_o_kompanii']['address'] ?></div>
                <div class="worktime"><?= $siteData['informacziya_o_kompanii']['worktime'] ?></div>
                <a class="route-link" href="https://yandex.ru/maps/-/CCURy8SPCD">Как добраться </a>
              </div>
            </div>
          </div>
          <div class="map-wrap"> 
            <div class="map-inner">
              <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A73a46084300f121e440fc2bfaecb1be39f3e7bab6d028f7d03a459ca91638a7c&amp;amp;source=constructor" width="740" height="630" frameborder="0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tech-support"> 
      <div class="container"> 
        <div class="title">Служба поддержки</div>
        <div class="description"><?= $tehpodData['description'] ?></div>
        <div class="buttons"> <a class="btn btn-blue" href="tel:<?= $siteData['phone'] ?>"><?= $siteData['phone'] ?></a><span class="btn btn-white js-btn-callback"><?= $tehpodData['btn-caption'] ?></span></div>
      </div>
    </div>

<?php get_footer();