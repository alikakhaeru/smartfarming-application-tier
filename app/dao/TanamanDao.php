<?php
require_once realpath(__DIR__ . '/../config/Database.php');

class TanamanDao {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM tanaman")->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO tanaman (nama, jenis) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['nama'], $data['jenis']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE tanaman SET nama=?, jenis=? WHERE id=?");
        $stmt->bind_param("ssi", $data['nama'], $data['jenis'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tanaman WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}