<?

IncludeModuleLangFile(__FILE__);

use \Bitrix\Main\ModuleManager;
use Texterra\Minify\MinifyService;
use Bitrix\Main\EventManager;

class Texterra_Minify extends CModule
{

    var $MODULE_ID = "texterra.minify";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;
    var $errors;

    function __construct()
    { 
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "11.03.2022";
        $this->MODULE_NAME = "TexTerra Minify HTML";
        $this->MODULE_DESCRIPTION = "";
        $this->PARTNER_NAME = "TexTerra.ru";
        $this->PARTNER_URI = "https://texterra.ru/";
    }

    function DoInstall()
    {
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule("texterra.minify");
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule("texterra.minify");
        return true;
    }

    function InstallDB()
    {
    }

    function UnInstallDB()
    {
    }

    function InstallEvents()
    { 
        RegisterModuleDependences("main", "OnEndBufferContent", "texterra.minify", MinifyService::class, "handle"); 
        return true;
    }

    function UnInstallEvents()
    {  
        UnRegisterModuleDependences("main", "OnEndBufferContent", "texterra.minify", MinifyService::class, "handle"); 

        return true;
    }

    function InstallFiles()
    { 
        return true;
    }

    function UnInstallFiles()
    { 
        return true;
    }
}
