<?php

namespace App\Models;

use CodeIgniter\Model;

class AplicacionModel extends Model
{
    protected $table = 'aplicaciones';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'vacante_id',
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'correo',
        'estudio',
        'profesion',
        'anio_inicio',
        'anio_final',
        'fecha_nacimiento',
        'ciudad',
        'otros_estudios',
        'idiomas',
        'curriculum',
        'estado'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}