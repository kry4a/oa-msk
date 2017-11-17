<?if( !defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true ) die();?>

<?=$arResult["FORM_HEADER"]?>
		
		
	  <div class="form-group row">
			<div class="col-md-6">
			  <p class="form__text">Есть вопрос по функциям и возможностям программы? Наши специалисты с радостью помогут!</p>
			</div>
			<div class="col-sm-6 col-md-3">

			  <div class="input-group" data-sid="PHONE" style="margin-bottom: 0;">
	        <input id="PHONE" name="PHONE" class="input input--grey input--required im--phone" value="" maxlength="18" type="text"><label class="input-group__label" for="name"><label for="PHONE">Телефон: <span class="required-star">*</span></label></label>                
	      </div>
	      <input id="FIO" name="FIO" type="hidden" value="">
			</div>
			<div class="col-sm-6 col-md-3">
			  <button type="submit" href="#" class="<?=$arParams["SEND_BUTTON_CLASS"]?>">Заказать звонок</button>
			  <input type="hidden" name="form_submit" value="Отправить">
			</div>
	  </div>
	
<?=$arResult["FORM_FOOTER"]?>



