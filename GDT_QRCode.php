<?php
namespace GDO\QRCode;

use GDO\DB\GDT_String;
use GDO\Core\GDT_Template;

/**
 * A QR Code is a string that renders a qrcode as cell.
 * @author gizmore
 * @since 6.10
 * @version 6.10
 */
final class GDT_QRCode extends GDT_String
{
	public function defaultLabel() { return $this->label('qrcode'); }
	
	public function __construct()
	{
		$this->utf8();
		$this->max(2048);
	}

	#########################
	### Widget image size ###
	#########################
	public $size = '128';
	public function size($size)
	{
		$this->size = $size;
		return $this;
	}

	##############
	### Render ###
	##############
	public function renderCell()
	{
		return GDT_Template::php('QRCode', 'cell/qrcode.php', ['field'=>$this]);
	}
	
	#############
	### HREFs ###
	#############
	public function hrefCode()
	{
		$args = '&data='.urlencode($this->getVar());
		$args .= '&size='.$this->size;
		return href('QRCode', 'Render', $args);
	}
	
	public function hrefCodeFullscreen()
	{
		$args = '&data='.urlencode($this->getVar());
		return href('QRCode', 'Render', $args);
	}
	
}
