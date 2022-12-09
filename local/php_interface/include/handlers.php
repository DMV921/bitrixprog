<?
use \Bitrix\Main\Localization\Loc;
Loc::LoadMessages(__FILE__);

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("ExamHandlers", "OnBeforeIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("ExamHandlers", "OnBeforeIBlockElementAddHandler"));
AddEventHandler("main", "OnBeforeEventAdd", array("ExamHandlers", "OnBeforeEventAddHandler"));
//AddEventHandler('main', 'OnEpilog', array("ExamHandlers", "_Check404Error"));
AddEventHandler("main", "OnBuildGlobalMenu", array("ExamHandlers", "OnBuildGlobalMenuHandler"));
AddEventHandler("main", "OnBeforeProlog", array("ExamHandlers", "MyOnBeforePrologHandler"), 50);
AddEventHandler("search", "BeforeIndex", array("ExamHandlers", "myBeforeIndexHandler"));

class ExamHandlers
{
   
    



  
    

    

 
    function OnBeforeEventAddHandler(&$event, &$lid, &$arFields){
        if($event == 'FEEDBACK_FORM'){
            global $USER;
            if($USER->isAuthorized()){
                $arFields['AUTHOR'] = Loc::getMessage('AUTHORIZE_USER_1')."[".$USER->GetID()."] (".$USER->GetLogin().") ".$USER->GetFullName().
                Loc::getMessage('FORM_DATA').$arFields['AUTHOR'];
            }
            else{
                $arFields['AUTHOR'] = Loc::getMessage('NO_AUTHORIZE').$arFields['AUTHOR'];
            }
            CEventLog::Add(array(
                "SEVERITY" => "SECURITY",
                "AUDIT_TYPE_ID" => Loc::getMessage('ZAMENA'),
                "MODULE_ID" => "main",
                "ITEM_ID" => $event,
                "DESCRIPTION" => Loc::getMessage('ZAMENA').$arFields['AUTHOR'] ,
                )
            );
        }
    }
    
   


}