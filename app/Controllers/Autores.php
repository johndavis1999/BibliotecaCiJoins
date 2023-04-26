<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Autor;
use App\Models\Libro;

class Autores extends Controller{

    public function index(){
        $autor = new Autor();
        $data['autores'] = $autor->orderBy('id','ASC')->findAll();
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie');
        return view('autores/listar',$data);
    }

    public function guardarAut(){
        $autor = new Autor();
        $validacion = $this->validate(['nombres'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la informacion ingresada');
            return redirect()->back()->withInput();
        }
        $nombres = $this->request->getvar('nombres');
        $datos=['nombres'=>$nombres];
        $autor->insert($datos);
        return $this->response->redirect(site_url('/autores'));
    }

    public function borrarAut($id = null){
        // Validar si hay libros asociados al autor que se quiere eliminar
        $libros = new Libro();
        $libros_autor = $libros->where('id_autor', $id)->findAll();
        if(!empty($libros_autor)){
            $session = session();
            $session->setFlashData('mensaje','No se puede eliminar al autor porque hay libros asociados a el.');
            return $this->response->redirect(site_url('/autores'));
        } else{
            $autor = new Autor();
            $datos = $autor->where('id',$id)->first();
            $autor->where('id',$id)->delete($id);
            return $this->response->redirect(site_url('/autores'));
        }
    }

    public function actualizarAut($id = null){
        $autor = new Autor();
        $datos = ['nombres'=>$this->request->getvar('nombres')];
        $id = $this->request->getVar('id');
        $validacion = $this->validate(['nombres'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información ingresada');
            return redirect()->back()->withInput();
        } else {
            $autor->update($id,$datos);
            return $this->response->redirect(site_url('/autores'));
        }
    }

}