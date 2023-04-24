<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Categoria;
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
    
    public function borrarCat($id=null){
        $categoria = new Categoria();
        $datos=$categoria->where('id',$id)->first();
        $categoria->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/categorias'));
    }

    public function actualizarCat($id=null){
        $categoria = new Categoria();
        $datos=['descripcion'=>$this->request->getVar('descripcion')];
        $id = $this->request->getVar('id');
        $validacion = $this->validate(['descripcion'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('descripcion','Revise la información');
            return redirect()->back()->withInput();
        } else {
            $categoria->update($id,$datos);
            return $this->response->redirect(site_url('/categorias'));
        }
        
    }

}
