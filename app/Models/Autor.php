<?php 
namespace App\Models;

use CodeIgniter\Model;

class Autor extends Model{
    protected $table      = 'autores';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombres'];
}