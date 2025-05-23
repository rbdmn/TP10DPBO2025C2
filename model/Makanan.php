<?php
require_once 'config/Database.php';

class Makanan
{
    private $conn;
    private $table = 'makanan';

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
        $query = "SELECT * FROM " . $this->table . " WHERE MakananID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $kategori, $harga)
    {
        $query = "INSERT INTO " . $this->table . " (NamaMakanan, Kategori, HargaRataRata) VALUES (:nama, :kategori, :harga)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        return $stmt->execute();
    }

    public function update($id, $nama, $kategori, $harga)
    {
        $query = "UPDATE " . $this->table . " SET NamaMakanan = :nama, Kategori = :kategori, HargaRataRata = :harga WHERE MakananID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE MakananID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
