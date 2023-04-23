<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;
class Libros extends Controller{

    public function index()
    {
        $libro = new Libro();
        $datos['libros'] = $libro->orderBy('id','ASC')->findAll();
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/pie');
        return view('libros/listar',$datos);
    }

    public function crear(){

        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/pie');
        return view('libros/crear',$datos);
    }

    public function guardar(){
        $libro = new Libro();
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información');
            //return $this->response->redirect(site_url('/listar'));
            return redirect()->back()->withInput();
        }
        $nombre = $this->request->getVar('nombre');
        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre=$imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre
            ];
            $libro->insert($datos);
        }
        return $this->response->redirect(site_url('/listar'));
    }

    public function borrar($id=null){
        $libro = new Libro();
        $datosLibro=$libro->where('id',$id)->first();
        $ruta = '../public/uploads/'.$datosLibro['imagen'];
        if (file_exists($ruta)) {
            unlink($ruta);
        }
        $libro->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/listar'));
    }

    public function editar($id=null){
        $libro = new Libro();
        $datos['libro'] = $libro->where('id',$id)->first();
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/pie');
        return view('libros/editar',$datos);
    }

    public function actualizar(){
        $libro = new Libro();
        $datos=[
            'nombre'=>$this->request->getVar('nombre')
        ];
        $id = $this->request->getVar('id');
        $validacion = $this->validate(['nombre'=>'required|min_length[3]']);
        if(!$validacion){
            $session = session();
            $session->setFlashData('mensaje','Revise la información');
            //return $this->response->redirect(site_url('/listar'));
            return redirect()->back()->withInput();
        }
        $libro->update($id,$datos);
        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        if($validacion){
            if($imagen=$this->request->getFile('imagen')){
                $datosLibro = $libro->where('id',$id)->first();
                $ruta = '../public/uploads/'.$datosLibro['imagen'];
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/',$nuevoNombre);
                $datos=['imagen'=>$nuevoNombre];
                $libro->update($id,$datos);
            }
        }
        return $this->response->redirect(site_url('/listar'));
    }
}