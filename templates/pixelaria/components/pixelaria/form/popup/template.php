<?if( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true ) die();?>
<div class="popup">
	<?if( $arParams["DISPLAY_CLOSE_BUTTON"] == "Y" ){?>
		<?=$arResult["CLOSE_BUTTON"]?>
	<?} ?>
	
	<?if( $arResult["isFormNote"] == "Y" ){?>
		<div class="popup__header">
			<p class="popup__title"><?=$arResult["FORM_NOTE"]?></p>
		</div>
	<?}else{?>
		<?=$arResult["FORM_HEADER"]?>
			<div class="popup__header">
			<?if( $arResult["isIblockTitle"] ){?>
					<p class="popup__title">Заказать <span class="title"></span></p>
				<?}?>
				<?if( $arResult["isIblockDescription"] && $arResult['IBLOCK_DESCRIPTION']){
					if( $arResult["IBLOCK_DESCRIPTION_TYPE"] == "text" ){?>
						<p class="popup__subtitle"><?=$arResult["IBLOCK_DESCRIPTION"]?></p>
					<?}else{?>
						<p class="popup__subtitle"><?=$arResult["IBLOCK_DESCRIPTION"]?></p>
					<?}
				}?>
			</div>
			<div class="popup__body">
				<hr>
				<div class="popup__form"></div>
				<?if(is_array($arResult["QUESTIONS"])):?>
					<?foreach( $arResult["QUESTIONS"] as $FIELD_SID => $arQuestion ){
						if( $arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden' ){
							echo $arQuestion["HTML_CODE"];
						}else{?>
							<div class="input-group" data-SID="<?=$FIELD_SID?>">
          			<?=$arQuestion["HTML_CODE"]?>
				        
				      </div>
						<?}
					}?>
				<?endif;?>
				<?
				$frame = $this->createFrame()->begin('');
				$frame->setBrowserStorage(true);
				?>
				<?if( $arResult["isUseCaptcha"] == "Y" ){?>
					<div class="row captcha-row">
						<div class="col-md-12">
							<div class="form-group">
								<?=$arResult["CAPTCHA_CAPTION"]?>
							</div>
						</div>
					</div>
					<div class="row captcha-row">
						<div class="col-md-12">
							<div class="form-group margin-bottom-30">
								<?=$arResult["CAPTCHA_IMAGE"]?>
								<span class="refresh"><span><?=GetMessage("REFRESH")?></span></span>
							</div>
						</div>
					</div>
					<div class="row captcha-row">
						<div class="col-md-12">
							<div class="form-group">
								<div class="input <?=$arResult["CAPTCHA_ERROR"] == "Y" ? "error" : ""?>">
									<?=$arResult["CAPTCHA_FIELD"]?>
								</div>
							</div>
						</div>
					</div>
				<?}else{?>
					<div style="display:none;"></div>
				<?}?>
				<?$frame->end();?>
				<div class="popup__buttons">
					<?=$arResult["SUBMIT_BUTTON"]?>
				</div>
			</div>
		<?=$arResult["FORM_FOOTER"]?>
	<?}?>
</div>

<script>
	$(function (){
		
		$('.closer').closest('.jqmWindow').jqmAddClose('.closer');
		
		/*$('.closer').click(function(e) {
			console.log('closer clicked');
			$(this).closest('.jqmWindow').jqmHide();
	  });*/

		$('.input').change(function(e){
			$(this).toggleClass('used',$(this).val()!='');
		});1

		$('.im--phone').mask('+7 (000) 000-00-00');
		$('.jqmWindow').scrollTop();
	});
</script>