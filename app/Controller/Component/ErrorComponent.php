<?php
# Component to handle errros
class ErrorComponent extends Component
{
	public $components = array('Session');

	public function set( $erros)
	{
		if ( !empty($erros) )
		{	
			$html = '<ul>';
			foreach ( $erros as $e )
			{
				$html .= '<li>'.$e[0].'</li>';
			}
			$html .= '</ul>';

			$this->Session->setFlash($html, 'flash_fail');
		}
	}
}
?>