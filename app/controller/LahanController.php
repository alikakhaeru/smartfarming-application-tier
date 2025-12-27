<?php
require_once __DIR__ . '/../service/LahanService.php';
require_once __DIR__ . '/../helper/JsonResponse.php';

class LahanController {
    private LahanService $service;

    public function __construct() {
        $this->service = new LahanService();
    }

    public function handle() {
        $method = $_SERVER['REQUEST_METHOD'];
        $id = $_GET['id'] ?? null;

        // BONGKAR JSON DARI JAVA
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($method === 'GET') {
            JsonResponse::send($this->service->getAll());
        } 
        elseif ($method === 'POST') {
            $this->service->insert($data);
            JsonResponse::send(["status" => "success"]);
        } 
        elseif ($method === 'PUT') {
            if ($id && $data) {
                $this->service->update($id, $data);
                JsonResponse::send(["status" => "updated"]);
            } else {
                JsonResponse::send(["status" => "error", "message" => "ID atau Data hilang"], 400);
            }
        } 
        elseif ($method === 'DELETE') {
            if ($id) {
                $this->service->delete($id);
                JsonResponse::send(["status" => "deleted"]);
            }
        }
    }
}