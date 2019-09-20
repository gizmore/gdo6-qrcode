<?php
namespace GDO\QRCode;

use GDO\Core\GDO_Module;
use GDO\Util\Strings;

final class Module_QRCode extends GDO_Module
{
	public function onLoadLanguage() { return $this->loadLanguage('lang/qrcode'); }
	
	public function onInit()
	{
		spl_autoload_register([$this, 'autoload']);
	}
	
	#####################################
	### Autoload PSR vendor emulation ###
	#####################################
	public function autoload($className)
	{
		if (Strings::startsWith($className, 'chillerlan\\QRCode'))
		{
			$path = str_replace('chillerlan\\QRCode', $this->filePath('php-qrcode/src'), $className);
			$path .= '.php';
			require_once $path;
		}
		
		elseif (Strings::startsWith($className, 'chillerlan\\Settings'))
		{
			$path = str_replace('chillerlan\\Settings', $this->filePath('php-settings-container/src'), $className);
			$path .= '.php';
			require_once $path;
		}
	}

}
