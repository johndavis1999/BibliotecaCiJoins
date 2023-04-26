<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categoria;
use App\Models\Libro;
class Categorias extends Controller{

    public function index()
    {
        $categoria = new Categoria();
        $data['categorias'] = $categoria->orderBy('id','ASC')->findAll();
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie');
        return view('categorias/listar',$data);
    }

    public function guardarCat()
    {
        $categoria = new Categoria();
        $validacion = $this->validate(['descripcion'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información ingresada');
            //return $this->response->redirect(site_url('/listar'));
            return redirect()->back()->withInput();
        }
        $descripcion = $this->request->getVar('descripcion');
        $datos=['descripcion'=>$this->request->getVar('descripcion')];
        $categoria->insert($datos);
        return $this->response->redirect(site_url('/categorias'));
    }
    
    public function borrarCat($id = null) {
        // Validar si hay libros asociados a la categoría que se quiere eliminar
        $libros = new Libro();
        $libros_categoria = $libros->where('id_categoria', $id)->findAll();
        if (!empty($libros_categoria)) {
            // Si existen libros asociados, no se puede eliminar la categoría
            $session = session();
            $session->setFlashData('mensaje', 'No se puede eliminar la categoría porque hay libros asociados a ella.');
            return $this->response->redirect(site_url('/categorias'));
        } else {
            // Si no existen libros asociados, se puede eliminar la categoría
            $categoria = new Categoria();
            $datos = $categoria->where('id', $id)->first();
            $categoria->where('id', $id)->delete($id);
            return $this->response->redirect(site_url('/categorias'));
        }
    }

    public function actualizarCat($id=null){
        $categoria = new Categoria();
        $datos=['descripcion'=>$this->request->getVar('descripcion')];
        $id = $this->request->getVar('id');
        $validacion = $this->validate(['descripcion'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información');
            return redirect()->back()->withInput();
        } else {
            $categoria->update($id,$datos);
            return $this->response->redirect(site_url('/categorias'));
        }
    }
}
