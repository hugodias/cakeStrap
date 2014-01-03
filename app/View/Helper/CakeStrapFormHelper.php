<?php 
App::uses('FormHelper', 'View/Helper');

/**
 * Extendendo as funcionalidades do FormHelper
 * 
 */
class CakeStrapFormHelper extends FormHelper {


	/**
	* Adicionado as classes do Bootstrap nos metodos do FormHelper
	*
	*/
  	public function create($model = null, $options = array())
	{
		$optionsDefault = array();
		$options = array_merge($optionsDefault, $options);
		return parent::create($model, $options);
	}
	
	public function input($fieldName, $options = array())
	{	
		$optionsDefault = array('class'=>'form-control','div'=>'form-group');
		$options = array_merge_recursive($optionsDefault, $options);
		if (sizeof($options['div']) > 1) {
			$options['div'] = join(' ',$options['div']);
		}

		if (!isset($options['placeholder'])) {
			$label = (isset($options['label'])) ? $options['label'] : Inflector::humanize($fieldName);
			$options['placeholder'] = $label;
		}

		if (isset($options['helpText'])) {
			$options['after'] ='<span class="help-block">' . $options['helpText'] . '</span>';
		}
		return parent::input($fieldName, $options);
	}

	public function textarea($fieldName, $options = array()) {
		$optionsDefault = array('class'=>'form-control');
		$options = array_merge_recursive($optionsDefault, $options);
		return parent::textarea($fieldName, $options);
	}

	public function end($string ='Salvar',$options = array()) {
		
		$optionsDefault = array('class'=>'btn btn-primary','div'=>'form-group');
		$options = array_merge_recursive($optionsDefault, $options);

		$retorno  = parent::submit($string,$options);
		$retorno .= parent::end();
		return $retorno;
	}

	
}