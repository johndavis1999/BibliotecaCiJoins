<?php 
namespace App\Models;

use CodeIgniter\Model;

class Categoria extends Model{
    protected $table      = 'categorias';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion'];
}