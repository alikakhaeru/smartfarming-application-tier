<?php
class Database {
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $db   = "smart_farming"; // Sesuaikan dengan gambar HeidiSQL kamu
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            self::$conn = new mysqli(self::$host, self::$user, self::$pass, self::$db);
            if (self::$conn->connect_error) {
                die("Koneksi Database Gagal!");
            }
        }
        return self::$conn;
    }
}