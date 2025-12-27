<?php
require_once __DIR__ . '/../dao/TanamanDao.php';
require_once __DIR__ . '/../helper/WebSocketNotifier.php';

class TanamanService {
    private TanamanDao $dao;

    public function __construct() {
        $this->dao = new TanamanDao();
    }

    public function getAll() {
        return $this->dao->getAll();
    }

    public function insert($data) {
        $this->dao->insert($data);
        WebSocketNotifier::notify("tanaman");
    }

    // TAMBAHKAN INI:
    public function update($id, $data) {
        $this->dao->update($id, $data);
        WebSocketNotifier::notify("tanaman");
    }

    public function delete($id) {
        $this->dao->delete($id);
        WebSocketNotifier::notify("tanaman");
    }
}