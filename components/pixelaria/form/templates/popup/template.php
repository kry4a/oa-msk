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
				<?
					foreach ($arResult["FORM_ERRORS"] as $error) {
						echo '<p class="popup__error">'.$error.'</p>';
					}
				?>
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

		

		
		
		$('form[name="<?=$arResult["IBLOCK_CODE"]?>"]').validate({
			highlight: function( element ){
				$(element).addClass('input--error');
			},
			unhighlight: function( element ){
				$(element).removeClass('input--error');
			},
			submitHandler: function( form ){
				var bxajaxid=$('input[name="bxajaxid"]').val();
		console.log('#wait_comp_'+bxajaxid);
		$('#wait_comp_'+bxajaxid).hide();
		
				if( $('form[name="<?=$arResult["IBLOCK_CODE"]?>"]').valid() ){
					$(form).find('button[type="submit"]').attr("disabled", "disabled");
					form.submit();
				}
			},
			errorPlacement: function( error, element ){
				//error.insertBefore(element);
			}
		});

		
		$('input[name="PRODUCT"]').parent().hide();
		
		$('.closer').closest('.jqmWindow').jqmAddClose('.closer');
		
		

		$('.input').change(function(e){
			$(this).toggleClass('used',$(this).val()!='');
		});1

		$('.im--phone').mask('+7 (000) 000-00-00');
		$('.jqmWindow').scrollTop();
	});
</script>