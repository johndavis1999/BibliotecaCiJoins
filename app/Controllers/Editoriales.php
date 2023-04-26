<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Editorial;
use App\Models\Libro;

class Editoriales extends Controller{

    public function index()
    {
        $editorial = new editorial();
        $data['editoriales'] = $editorial->orderBy('id','ASC')->findAll();
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie');
        return view('editoriales/listar',$data);
    }

    public function guardarEdit()
    {
        $editorial = new Editorial();
        $validacion = $this->validate(['nombre'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información ingresada');
            //return $this->response->redirect(site_url('/listar'));
            return redirect()->back()->withInput();
        }
        $nombre = $this->request->getVar('nombre');
        $datos=['nombre'=>$this->request->getVar('nombre')];
        $editorial->insert($datos);
        return $this->response->redirect(site_url('/editoriales'));
    }
    
    public function borrarEdit($id = null) {
        $libros = new Libro();
        $libros_editorial = $libros->where('id_editorial', $id)->findAll();
        if(!empty($libros_editorial)){
            $session = session();
            $session->setFlashData('mensaje','No se puede eliminar la editorial porque hay libros asociados a ella.');
            return $this->response->redirect(site_url('/editoriales'));
        } else {
            $editorial = new Editorial();
            $datos = $editorial->where('id', $id)->first();
            $editorial->where('id', $id)->delete($id);
            return $this->response->redirect(site_url('/editoriales'));
        }
    }

    public function actualizarEdit($id=null){
        $editorial = new Editorial();
        $datos=['nombre'=>$this->request->getVar('nombre')];
        $id = $this->request->getVar('id');
        $validacion = $this->validate(['nombre'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información');
            return redirect()->back()->withInput();
        } else {
            $editorial->update($id,$datos);
            return $this->response->redirect(site_url('/editoriales'));
        }
    }
}