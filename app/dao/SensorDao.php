<?php
require_once realpath(__DIR__ . '/../config/Database.php');

class SensorDao {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM sensor_data")->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->prepare("INSERT INTO sensor_data (lahan_id, suhu, kelembapan_tanah, intensitas_cahaya) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iddd", $data['lahan_id'], $data['suhu'], $data['kelembapan_tanah'], $data['intensitas_cahaya']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE sensor_data SET lahan_id=?, suhu=?, kelembapan_tanah=?, intensitas_cahaya=? WHERE id=?");
        $stmt->bind_param("idddi", $data['lahan_id'], $data['suhu'], $data['kelembapan_tanah'], $data['intensitas_cahaya'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM sensor_data WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}