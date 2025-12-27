<?php
require_once __DIR__ . '/../dao/SensorDao.php';
require_once __DIR__ . '/../helper/WebSocketNotifier.php';

class SensorService {

    private SensorDao $dao;

    public function __construct() {
        $this->dao = new SensorDao();
    }

    public function getAll() {
        return $this->dao->getAll();
    }

    public function insert($data) {
        $this->dao->insert($data);
        WebSocketNotifier::notify("sensor");
    }

    public function delete($id) {
        $this->dao->delete($id);
        WebSocketNotifier::notify("sensor");
    }
}
