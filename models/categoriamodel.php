<?php 

class CategoriaModel extends AppModel
{
	private static $nombre = "categorias";

	public function listarTodo(){
		$categorias = $this->_db->query("SELECT * FROM categorias");

		return $categorias->fetchall();
	}
}
 ?>