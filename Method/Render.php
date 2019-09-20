<?php
namespace GDO\QRCode\Method;

use GDO\Core\Method;
use GDO\QRCode\GDT_QRCode;
use GDO\DB\GDT_UInt;

final class Render extends Method
{
	public function gdoParameters()
	{
		return array(
			GDT_QRCode::make('data')->notNull(),
			GDT_UInt::make('size')->initial('1024'),
		);
	}
	
	public function execute()
	{
		$data = $this->gdoParameterVar('data');
		$size = $this->gdoParameterVar('size');
		return $this->render($data, $size);
	}
	
	public function render($data, $size='1024')
	{
		
	}
	
}
