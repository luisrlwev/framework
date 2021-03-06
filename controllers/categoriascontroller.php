<?php
/**
 * Clase de categorias 
 */
class categoriasController extends AppController
{
	/**
	 * [__construct Constructor de controlador de categorias]
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Función de index
	 * index Index de controlador categorias
	 * @return void No retorna algo
	 */
	public function index(){
		$categorias = $this->loadModel("categoria");
		$this->_view->categorias = $categorias->listarTodo();
		
		$this->_view->titulo = "Categorias";
		$this->_view->renderizar("index");
	}

	/**
	 * Función de agregar
	 * @return void No retorna algo
	 */
	public function agregar(){
		
		if ($_POST) {
			$categorias = $this->loadmodel("categoria");
			if ($categorias->guardar($_POST)) {
				$this->_messages->success('Categoria agregada', $this->redirect(array("controller"=>"categorias")));
			}
		}
		$categorias = $this->loadModel("categoria");
		$this->_view->categorias = $categorias->listarTodo();

		$this->_view->titulo = "Agregar categoria";
		$this->_view->renderizar("agregar");
	}

    /**
     * Función de editar
     * @param int $id id de la categoria
     * @return void No retorna nada
     */
	public function editar($id=null){
		if ($_POST) {
			$categorias = $this->loadmodel("categoria");
			if ($categorias->actualizar($_POST)) {
			$this->_messages->success('Categoria editada correctamente', $this->redirect(array("controller"=>"categorias")));
			}
			else{
			$this->_messages->error('Error al editar categoria', $this->redirect(array("controller"=>"categorias")));
			}
		}
		$categorias = $this->loadmodel("categoria");
		$this->_view->categorias = $categorias->buscarPorId($id);

		$this->_view->titulo = "Editar categoria";
		$this->_view->renderizar("editar");
	}

	/**
	 * Función de eliminar
	 * @param  int $id id de la descripción
	 * @return void No retorna algo
	 */
	public function eliminar($id){
		$categorias = $this->loadModel("categoria");
		$registro = $categorias->buscarPorId($id);

		if (!empty($registro)) {
			$categorias->eliminarPorId($id);
			if ($categorias->actualizar($_POST)) {
			$this->_messages->success('Categoria eliminada correctamente', $this->redirect(array("controller"=>"categorias")));
			}
		}
	}
}