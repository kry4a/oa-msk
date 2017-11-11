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
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/scripts.js');?>

  </head>
  <body>
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <header class="header">
      <div class="container">
        <div class="header__items">
          <div class="header__item header__item--logo">
            Профессиональная разработка и внедрение 1С в Москве
          </div>
          <div class="header__item header__item--address">
            <a href="mailto:1c@oa-msk.ru" class="link link--green">1c@oa-msk.ru</a><br>
             МСК, Орджоникидзе, д. 11
          </div>
          <div class="header__item header__item--times">
            Пн.-пт. с 9:00<br>до 18:00
          </div>
          <div class="header__item header__item--callback">
            <a class="header__phone phone" href="tel:+74952680749"><span>+7 (495)</span> 268-07-49</a>
            <a href="#" class="btn btn--inline btn--orange btn--callback"></a>
          </div>
        </div>
      </div>
    </header>
    <nav class="navbar">
      <div class="container">
        <a class="navbar__phone phone" href="tel:+74952680749" title="Оптимальные алгоритмы"><span>+7 (495)</span> 268-07-49</a>
        <div class="navbar__toggler navbar-toggler" data-target="nav">
          <span class="navbar-toggler__bar"></span>
          <span class="navbar-toggler__bar"></span>
          <span class="navbar-toggler__bar"></span>
        </div>
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
            //"COMPONENT_TEMPLATE" => "horizontal_multilevel",
            //"COMPOSITE_FRAME_MODE" => "A",
            //"COMPOSITE_FRAME_TYPE" => "AUTO",
          )
        );?>
  
      </div>
    </nav>
    <main class="main">
