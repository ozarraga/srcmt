<?php

/* Clase que ayuda a configurar casillas de verificación como objetos 
 * y facilitar construir arreglos de etiquetas checkbox.
 * 
 * 
 */

class checkBoxClass {

	private $_id;
	private $_class;
	private $_name;
	private $_value;
	private $_contenido;
	private $type_input = 'checkbox';

	function __construct($contenido, $id, $name, $value, $class=null) {
		$this->setId($id);
		$this->setClass($class);
		$this->setName($name);
		$this->setValue($value);
		$this->setContenido($contenido);
	}

	public function checkbox_tag() {
		$opciones = Array();

		$opciones['id'] = $this->getId();
		
		if (!$this->getClass()==null){
			$opciones['class'] = $this->getClass();
		}
		
		$opciones['name'] = $this->getName();
		$opciones['value'] = $this->getValue();
		$opciones['type'] = $this->getTypeInput();


		echo tag('input', $opciones, false).$this->getContenidoLabelTag();
	}

	public function getId() {
		return $this->_id;
	}

	public function getClass() {
		return $this->_class;
	}

	public function getName() {
		return $this->_name;
	}

	public function getValue() {
		return $this->_value;
	}

	public function getContenido() {


		return $this->_contenido;
	}

	public function getContenidoLabelTag() {


		return '<label for="' . $this->_contenido . '">'.$this->_contenido.'</label>';
	}

	public function getTypeInput() {
		return $this->type_input;
	}

	public function setId($_id) {
		$this->_id = $_id;
	}

	public function setClass($_class) {
		$this->_class = $_class;
	}

	public function setName($_name) {
		$this->_name = $_name;
	}

	public function setValue($_value) {
		$this->_value = $_value;
	}

	public function setContenido($_contenido) {
		$this->_contenido = $_contenido;
	}

}

?>
