<?php
# Compoente para formatação dos erros em uma estrutura html.
class ErrorComponent extends Component
{
	public $components = array('Session');
	
	public function set( $erros)
	{

		if ( !empty($erros) )
		{	
			$htmlErro = '<ul>';
			foreach ( $erros as $e )
			{
				$htmlErro .= '<li>'.$e[0].'</li>';
			}
			$htmlErro .= '</ul>';
			
			$this->Session->setFlash($htmlErro, 'flash_fail');
		}
	}
}
?>