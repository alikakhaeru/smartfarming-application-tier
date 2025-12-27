<?php
require_once realpath(__DIR__ . '/../config/Database.php');

class LahanDao {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM lahan")->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO lahan (nama_lahan, lokasi, luas, tanaman_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $data['nama_lahan'], $data['lokasi'], $data['luas'], $data['tanaman_id']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE lahan SET nama_lahan=?, lokasi=?, luas=?, tanaman_id=? WHERE id=?");
        $stmt->bind_param("ssdii", $data['nama_lahan'], $data['lokasi'], $data['luas'], $data['tanaman_id'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM lahan WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}