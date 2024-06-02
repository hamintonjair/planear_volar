<?php
namespace App\Models;

use CodeIgniter\Model;

class ReservaTuristicaModel extends Model
{
    protected $table = 'reservas_turistica';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'cliente_id', 'paquete_id', 'guia_id', 'fecha_reserva', 'costo','estado'
    ];

    // Relación con el cliente
    public function getCliente()
    {
        return $this->hasOne('App\Models\ClienteModel', 'id', 'cliente_id');
    }

    // Relación con el paquete
    public function getPaquete()
    {
        return $this->hasOne('App\Models\PaqueteModel', 'id', 'paquete_id');
    }

    // Relación con el guía
    public function getGuia()
    {
        return $this->hasOne('App\Models\GuiaModel', 'id', 'guia_id');
    }
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