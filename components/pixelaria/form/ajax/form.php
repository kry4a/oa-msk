<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?

$id = (isset($_REQUEST["id"]) ? $_REQUEST["id"] : false);

$isCallBack = $id == 26;

$successMessage = ($isCallBack ? "<p class='popup__subtitle'>Наш менеджер перезвонит вам в ближайшее время.</p><p class='popup__subtitle'>Спасибо за ваше обращение!</p>" : "<p class='popup__subtitle'>Спасибо! Ваше сообщение отправлено!</p>");
?>
<span class="jqmClose top-close icon icon-times"></span>
<?$APPLICATION->IncludeComponent(
	"pixelaria:form",
	$isCallBack ? "callback" : "popup",
	
	Array(
		"IBLOCK_TYPE" => "aspro_allcorp_form",
		"IBLOCK_ID" => $id,
		"USE_CAPTCHA" => false,
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "100000",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SUCCESS_MESSAGE" => $successMessage,
		"SEND_BUTTON_NAME" => "Отправить",
		"SEND_BUTTON_CLASS" => "btn btn-primary",
		"DISPLAY_CLOSE_BUTTON" => "Y",
		"POPUP" => "Y",
		"CLOSE_BUTTON_NAME" => "Закрыть",
		"CLOSE_BUTTON_CLASS" => "jqmClose btn btn-primary bottom-close"
	)
);?>