<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomponent:ex2-71",
	"",
	Array(
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"FIRMS_IBLOCK_ID" => "",
		"PRODUCT_IBLOCK_ID" => "",
		"PROPERTY_FIRMS_CODE" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>