<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 

<?if (!empty($arResult)):?> 
<ul class="nav" id="nav">
<?foreach($arResult as $arItem):?> 
  <li class="nav__item <?=($arItem["CHILD"] ? "nav__item--parent" : "")?> <?=($arItem["SELECTED"] ? "active" : "")?>">
    <a href="<?=$arItem["LINK"]?>" class="nav__link link"  title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a>
    <?if($arItem["CHILD"]):?>
      <ul class="dropdown">
        <?foreach($arItem["CHILD"] as $arSubItem):?>
          <li class="dropdown__block">
            <div class="dropdown__title">
              <?=$arSubItem["TEXT"]?>
            </div>
            <?if($arSubItem["CHILD"]):?>
              <ul class="dropdown__list">
                <?foreach($arSubItem["CHILD"] as $arSubSubItem):?>
                  <li class="dropdown__item">
                    <a href="<?=$arSubSubItem["LINK"]?>" class="dropdown__link <?=($arSubSubItem["SELECTED"] ? "dropdown__link--active" : "")?>" title="<?=$arSubSubItem["TEXT"]?>">
                      <?=$arSubSubItem["TEXT"]?>
                    </a>
                  </li>
                <?endforeach;?>
              </ul>
            <?endif;?>
          </li>
        <?endforeach;?>
      </ul>
    <?endif;?>
  </li>
<?endforeach?> 
</ul>
<?endif?>