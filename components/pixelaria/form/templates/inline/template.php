<?if( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true ) die();?>

<?if( $arResult["isFormNote"] == "Y" ){?>
	<p class="section__subtitle"><?=$arResult["FORM_NOTE"]?></p>
<?}else{?>
	<?=$arResult["FORM_HEADER"]?>
		<?
			foreach ($arResult["FORM_ERRORS"] as $error) {
				echo '<p class="popup__error">'.$error.'</p>';
			}
		?>
		<div class="form-group row">
	  	<? if ($arParams['FORM_TEXT']) { ?>
	  		<div class="<?=$arParams['CLASSES'][0]?>">
			  	<p class="<?=$arParams['FORM_TEXT_CLASS'];?>"><?=$arParams['FORM_TEXT'];?></p>
				</div>
			<? } ?>
			<div class="<?=$arParams['CLASSES'][1]?>">
				<?
					foreach ($arResult["QUESTIONS"] as $question) {

						if($question["ERROR"]) $error="input--error";
						else $error='';
						
						if ($question['CODE']!=$arParams['SINGLE_FIELD']) {
							echo '<input class="'.$error.'" type="hidden" id="'.$question['CODE'].'" name="'.$question['CODE'].'" value="">';
						} else { ?>
							
							<div class="input-group" data-sid="<?=$question['CODE']?>" style="margin-bottom: 0;">
				        <input id="<?=$question['CODE']?>" name="<?=$question['CODE']?>" class="input <?=$arParams['FIELD_CLASS']?> <?=$error?>" value="" type="text">
				        <label class="input-group__label" for="<?=$question['CODE']?>"><?=$question['NAME']?></label>                
				      </div>
						<?}
					}
				?>
			</div>
			<div class="<?=$arParams['CLASSES'][2]?>">
			  <button type="submit" class="<?=$arParams["SEND_BUTTON_CLASS"]?>"><?=$arParams["SEND_BUTTON_NAME"]?></button>
			  <input type="hidden" name="form_submit" value="<?=$arParams["SEND_BUTTON_NAME"]?>">
			</div>
	  </div>
	<?=$arResult["FORM_FOOTER"]?>
<?}?>


