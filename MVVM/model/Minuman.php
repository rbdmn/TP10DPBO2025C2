<?php
require_once 'config/Database.php';

class Minuman
{
    private $conn;
    private $table = 'minuman';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE MinumanID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $tipe, $harga)
    {
        $query = "INSERT INTO " . $this->table . " (NamaMinuman, Tipe, HargaRataRata) VALUES (:nama, :tipe, :harga)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tipe', $tipe);
        $stmt->bindParam(':harga', $harga);
        return $stmt->execute();
    }

    public function update($id, $nama, $tipe, $harga)
    {
        $query = "UPDATE " . $this->table . " SET NamaMinuman = :nama, Tipe = :tipe, HargaRataRata = :harga WHERE MinumanID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tipe', $tipe);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE MinumanID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
