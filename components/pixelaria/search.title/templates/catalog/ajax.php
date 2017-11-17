<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<ul class="dropdown__list" style="margin:0">
<?if( !empty( $arResult["CATEGORIES"] ) ){?>
  
  <? foreach( $arResult["CATEGORIES"] as $category_id => $arCategory ){
		foreach( $arCategory["ITEMS"] as $i => $arItem ){?>
      <li class="dropdown__item" style="width: 100%">
        <a href="<?=$arItem["URL"]?>" class="dropdown__link"><?=$arItem["NAME"]?></a>
      </li>
    <?
		}
	}?>
<?} else { ?>
  <li class="dropdown__item" style="width: 100%"><span class="dropdown__link">Нет совпадений</span></li>
<?}?>
</ul>

