<?php
require_once __DIR__ . '/../service/SensorService.php';
require_once __DIR__ . '/../helper/JsonResponse.php';

class SensorController {
    private SensorService $service;

    public function __construct() {
        $this->service = new SensorService();
    }

    public function handle() {
        $method = $_SERVER['REQUEST_METHOD'];
        
        // --- BAGIAN PALING PENTING ---
        // Baca data JSON yang dikirim Java
        $json = file_get_contents('php://input');
        $data = json_decode($json, true); 
        // -----------------------------

        if ($method === 'GET') {
            JsonResponse::send($this->service->getAll());
        } 
        elseif ($method === 'POST') {
            // Gunakan $data, jangan $_POST
            $this->service->insert($data);
            JsonResponse::send(["status" => "ok"]);
        } 
        elseif ($method === 'DELETE') {
            // Ambil ID dari URL (?id=1)
            $id = $_GET['id'] ?? null;
            $this->service->delete($id);
            JsonResponse::send(["status" => "deleted"]);
        }
    }
}