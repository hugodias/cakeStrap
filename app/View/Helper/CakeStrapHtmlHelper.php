<?php 
App::uses('HtmlHelper', 'View/Helper');

/**
 * Extendendo as funcionalidades do HtmlHelper
 * 
 */
class CakeStrapHtmlHelper extends HtmlHelper {


	public $pluginPath;
	public $controller;
	public $action;
	public $constant;

	function __construct(View $View, $settings = array()) 
	{
		parent::__construct($View, $settings);
		$this->setVariables();
	}
	
	/**
	* Seta o caminho relativo do Plugin
	*
	*/
  	public function setPlPath($pluginPath)
  	{
	    return $this->pluginPath = $pluginPath;
  	}
	
	/**
	* Seta o controller da pagina
	*
	*/
  	public function setController($controller)
  	{
	    return $this->controller = $controller;
	    
  	}
	
	/**
	* Seta a action da pagina
	*
	*/
  	public function setAction($action)
  	{
	    return $this->action = $action;
  	}
	
	/**
	* Seta a variavel constant que contém as constants do sistema
	*
	*/
  	public function setConstant($constant)
  	{
	    return $this->constant = $constant;
  	}

	/**
	*	Seta as variaveis iniciais do Helper para persistirem
	*
	*/
  	public function setVariables()
  	{	
  		if (isset($this->params->plugin)) {
  			$this->setPlPath(App::pluginPath(Inflector::humanize($this->params->plugin)));
  		}
  		$this->setController($this->params->controller);
  		$this->setAction($this->params->action);
  		$this->setConstant(Configure::read('App'));
  		
  	}

	/**
	*	Adiciona automaticamente os scripts ao layout
	*	plugin/webroot/js/controller.js
	*	plugin/webroot/js/controller/action.js
	*   app/webroot/js/controller.js
	*	app/webroot/js/controller/action.js
	*
	*/
  	public function automaticScript()
  	{	
  		$scripts = array();
  		if (isset($this->pluginPath)) {
	  		# JS Plugin Path
			$js_path_plugin = $this->pluginPath . $this->constant['webroot'] . DS . $this->constant['jsBaseUrl'];

			if (is_file($js_path_plugin . $this->controller . '.js')) {
		    	$scripts[] = $this->plugin.'.'.$this->controller;
		  	}

		  	if (is_file($js_path_plugin . $this->controller . DS . $this->action . '.js')) {
		    	$scripts[] = $this->plugin . '.' . $this->controller . '/' . $this->action;
		  	}
  		}
  		
  		$js_path = $this->constant['www_root'] . $this->constant['jsBaseUrl'];
  		if (is_file($js_path . $this->controller . '.js')) {
	    	$scripts[] = $this->controller;
		}

	  	if (is_file($js_path . $this->controller . DS . $this->action . '.js')) {
	    	$scripts[] = $this->controller . DS . $this->action;
		}
		return $this->script($scripts);
  	}

	/**
	*	Adiciona automaticamente o css ao layout
	*	plugin/webroot/css/controller.css
	*	plugin/webroot/css/controller/action.css
	*   app/webroot/css/controller.css
	*	app/webroot/css/controller/action.css
	*
	*/
  	public function automaticCss()
  	{
  		$css = array();
  		if (isset($this->pluginPath)) {
	  		
	  		# CSS Plugin Path
			$css_path_plugin = $this->pluginPath . $this->constant['webroot'] . DS . $this->constant['cssBaseUrl'];
			if (is_file($css_path_plugin . $this->controller . '.css')) {
		    	$css[] = $this->plugin.'.'.$this->controller;
		  	}

		  	if (is_file($css_path_plugin . $this->controller . DS . $this->action . '.css')) {
		    	$css[] = $this->plugin.'.'.$this->controller . '/' . $this->action;
		  	}
  		}
  		
  		$css_path = $this->constant['www_root'] . $this->constant['cssBaseUrl'];
  		if (is_file($css_path . $this->controller . '.css')) {
	    	$css[] = $this->controller;
		}

	  	if (is_file($css_path . $this->controller . DS . $this->action . '.css')) {
	    	$css[] = $this->controller . DS . $this->action;
		}
		return $this->css($css);
  	}
}