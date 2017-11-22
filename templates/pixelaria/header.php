<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<!DOCTYPE html>
<html class="<?=($_SESSION['SESS_INCLUDE_AREAS'] ? 'bx_editmode ' : '')?><?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie7' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0' ) ? 'ie ie8' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie9' : ''?>">
  
  <head>
    <?global $APPLICATION;?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bundle.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/libs.min.css');?>
    
    <?$APPLICATION->ShowHead()?>
    
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/libs.min.js');?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.validate.min.js');?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/scripts.js');?>

  </head>
  <body>
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <header class="header">
      <div class="container">
        <div class="header__items">
          <a class="header__item header__item--logo" title="Оптимальные алгоритмы Разработка и внедрение 1С" href="/new/">
            ООО «Оптимальные алгоритмы»<br>Разработка и внедрение 1С
          </a>
          <div class="header__item header__item--address">
            <a href="mailto:1c@oa-msk.ru" class="link link--green">1c@oa-msk.ru</a><br>
             МСК, Орджоникидзе, д. 11
          </div>
          <div class="header__item header__item--times">
            Пн.-пт. с 9:00<br>до 19:00
          </div>
          <div class="header__item header__item--callback">
            <a class="header__phone phone" href="tel:+74952680749"><span>+7 (495)</span> 268-07-49</a>
            <span class="btn btn--inline btn--orange btn--callback" data-param-id="26" data-event="jqm" data-name="callback"></span>
          </div>
        </div>
      </div>
    </header>
    <nav class="navbar">
      <div class="container">
        <a href="/new/" class="navbar__logo" title="Опитимальные алгоритмы"></a>
        <a class="navbar__phone phone" href="tel:+74952680749" title="Оптимальные алгоритмы"><span>+7 (495)</span> 268-07-49</a>
        <div class="navbar__toggler navbar-toggler" data-target="nav">
          <span class="navbar-toggler__bar"></span>
          <span class="navbar-toggler__bar"></span>
          <span class="navbar-toggler__bar"></span>
        </div>
        <ul id="nav" class="nav">
          <?$APPLICATION->IncludeComponent(
            "bitrix:menu", 
            "top", 
            array(
              "ROOT_MENU_TYPE" => "top",
              "MENU_CACHE_TYPE" => "A", //"Y"
              "MENU_CACHE_TIME" => "3600000",
              "MENU_CACHE_USE_GROUPS" => "N", //"Y"
              "MENU_CACHE_GET_VARS" => array(),
              "MAX_LEVEL" => "4",
              "CHILD_MENU_TYPE" => "left",
              "USE_EXT" => "Y",
              "DELAY" => "N",
              "ALLOW_MULTI_SELECT" => "N",
              "COUNT_ITEM" => "6"
            )
          );?>

          <li class="nav__item nav__item--right">
            <ul class="sub-nav">
              <li class="nav__item nav__item--parent">
                <a href="/new/company/" class="nav__link link" style="margin:0">О компании</a>
                <ul class="dropdown">
                  <li class="dropdown__block">
                    <a href="/new/company/contacts/" class="dropdown__title " title="Автоматизация бухгалтерского учета">
                      Контакты
                    </a>
                  </li>
                  <li class="dropdown__block">
                    <a href="/new/company/contacts/#requisites" class="dropdown__title " title="Автоматизация бухгалтерского учета">
                      Реквизиты
                    </a>
                  </li>
                </ul>
                <div class="dropdown__toggler navbar-toggler"></div>
              </li>
              <li class="nav__item">
                
                <a href="/new/reviews/" class="nav__link link">Отзывы</a>
                <?$APPLICATION->IncludeComponent("pixelaria:search.title", "catalog", array(
                  "NUM_CATEGORIES" => "1",
                  "TOP_COUNT" => "5",
                  "ORDER" => "date",
                  "USE_LANGUAGE_GUESS" => "Y",
                  "CHECK_DATES" => "N",
                  "SHOW_OTHERS" => "N",
                  "PAGE" => SITE_DIR."search/",
                  "CATEGORY_0_TITLE" => "",
                  "CATEGORY_0" => array(
                    0 => "main",
                    1 => "iblock_aspro_allcorp_catalog",
                    2 => "iblock_aspro_allcorp_content",
                  ),
                  "CATEGORY_0_main" => array(
                  ),
                  "CATEGORY_0_iblock_aspro_allcorp_catalog" => array(
                    0 => "all",
                  ),
                  "CATEGORY_0_iblock_aspro_allcorp_content" => array(
                    0 => "all",
                  ),
                  "SHOW_INPUT" => "Y",
                  "INPUT_ID" => "title-search-input",
                  "CONTAINER_ID" => "title-search"
                  ),
                  false
                );?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <main class="main">
