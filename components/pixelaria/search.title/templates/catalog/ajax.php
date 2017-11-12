<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?if( !empty( $arResult["CATEGORIES"] ) ){?>
  <ul class="dropdown__list">
  <? foreach( $arResult["CATEGORIES"] as $category_id => $arCategory ){
		foreach( $arCategory["ITEMS"] as $i => $arItem ){?>
      <li class="dropdown__item" style="width: 100%">
        <a href="<?=$arItem["URL"]?>" class="dropdown__link"><?=$arItem["NAME"]?></a>
      </li>
    <?
		}
	}?>
  </ul>
  <?}?>

