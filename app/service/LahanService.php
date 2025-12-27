<?php
require_once __DIR__ . '/../dao/LahanDao.php';
require_once __DIR__ . '/../helper/WebSocketNotifier.php';

class LahanService {
    private LahanDao $dao;

    public function __construct() {
        $this->dao = new LahanDao();
    }

    public function getAll() {
        return $this->dao->getAll();
    }

    public function insert($data) {
        $this->dao->insert($data);
        WebSocketNotifier::notify("lahan");
    }

    // TAMBAHKAN INI:
    public function update($id, $data) {
        $this->dao->update($id, $data);
        WebSocketNotifier::notify("lahan");
    }

    public function delete($id) {
        $this->dao->delete($id);
        WebSocketNotifier::notify("lahan");
    }
}