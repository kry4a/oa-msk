<?if( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true ) die();?>

<div class="section section--green section--page-sm">
	<div class="parallax parallax--1"></div>
	<div class="parallax parallax--2"></div>
  <div class="container">
	
		<div class="page__info page__info--promo">
		  <h1 class="page__title">Поиск по сайту</h1>
		  <p class="page__subtitle">Введите слово или фразу, чтобы найти нужную страницу. Например «Сопровождение 1С»</p>
		  
		  <form action="" method="get" class="form--news">
	    	<div class="form-group row">
					<div class="col-sm-8 col-lg-8">
					<?if( $arParams["USE_SUGGEST"] === "Y" ){
						if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
						{
							$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
							$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
							$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
						}
						?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.suggest.input",
							"",
							array(
								"NAME" => "q",
								"VALUE" => $arResult["REQUEST"]["~QUERY"],
								"INPUT_SIZE" => 40,
								"DROPDOWN_SIZE" => 10,
								"FILTER_MD5" => $arResult["FILTER_MD5"],
							),
							$component, array("HIDE_ICONS" => "Y")
						);?>
					<?}else{?>
						<input class="input" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
					<?}?>
					<?if( $arParams["SHOW_WHERE"] ){?>
						&nbsp;<select name="where">
							<option value=""><?=GetMessage("SEARCH_ALL")?></option>
							<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
								<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
							<?endforeach?>
						</select>
					<?}?>
				</div>
				<div class="col-sm-4 col-lg-4">
					<button class="btn btn--full btn--orange" type="submit" name="s" value="<?=GetMessage("SEARCH_GO")?>">Найти</button>
				</div>
			</div>
			<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
			<?if( $arParams["SHOW_WHEN"] ){?>
				<script>
					var switch_search_params = function()
					{
						var sp = document.getElementById('search_params');
						var flag;

						if(sp.style.display == 'none')
						{
							flag = false;
							sp.style.display = 'block'
						}
						else
						{
							flag = true;
							sp.style.display = 'none';
						}

						var from = document.getElementsByName('from');
						for(var i = 0; i < from.length; i++)
							if(from[i].type.toLowerCase() == 'text')
								from[i].disabled = flag

						var to = document.getElementsByName('to');
						for(var i = 0; i < to.length; i++)
							if(to[i].type.toLowerCase() == 'text')
								to[i].disabled = flag

						return false;
					}
				</script>
				<br /><a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
				<div id="search_params" class="search-page-params" style="display:<?echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"]? 'block': 'none'?>">
					<?$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'Y',
							'INPUT_NAME' => 'from',
							'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
							'INPUT_NAME_FINISH' => 'to',
							'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
							'INPUT_ADDITIONAL_ATTR' => 'size="10"',
						),
						null,
						array('HIDE_ICONS' => 'Y')
					);?>
				</div>
			<?}?>
			</form>
		</div>
  </div>
</div>
<div class="section section">
	<div class="container">
		<h1 class="section__title">Результаты поиска:</h1>


	
	<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
	<?elseif($arResult["ERROR_CODE"]!=0):?>
		<p><?=GetMessage("SEARCH_ERROR")?></p>
		<?ShowError($arResult["ERROR_TEXT"]);?>
		<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
		<br /><br />
		<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
		<table border="0" cellpadding="5">
			<tr>
				<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
				<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
				<td><?=GetMessage("SEARCH_AND_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
				<td><?=GetMessage("SEARCH_OR_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
				<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top">( )</td>
				<td valign="top">&nbsp;</td>
				<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
			</tr>
		</table>
	<?elseif(count($arResult["SEARCH"])>0):?>
		
		<div class="results">
		<?foreach($arResult["SEARCH"] as $arItem):?>
			<a class="results__item" href="<?echo $arItem["URL"]?>">
				<p class="results__title" ><?echo $arItem["TITLE_FORMATED"]?></p>
				<p class="results__text"><?echo $arItem["BODY_FORMATED"]?></p>
			</a>
		<?endforeach;?>
		</div>

	<?else:?>
		<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
	<?endif;?>
	</div>
</div>
