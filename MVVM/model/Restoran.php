<?php
require_once 'config/Database.php';

class Restoran
{
    private $conn;
    private $table = 'restoran';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("
            SELECT 
                r.RestaurantID,
                r.NamaRestoran,
                r.JenisKuliner,
                m.NamaMakanan,
                d.NamaMinuman
            FROM restoran r
            LEFT JOIN makanan m ON r.IDMakananUnggulan = m.MakananID
            LEFT JOIN minuman d ON r.IDMinumanUnggulan = d.MinumanID
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE RestaurantID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $jenisKuliner, $idMakanan, $idMinuman)
    {
        $query = "INSERT INTO " . $this->table . " (NamaRestoran, JenisKuliner, IDMakananUnggulan, IDMinumanUnggulan)
                  VALUES (:nama, :jenisKuliner, :idMakanan, :idMinuman)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jenisKuliner', $jenisKuliner);
        $stmt->bindParam(':idMakanan', $idMakanan);
        $stmt->bindParam(':idMinuman', $idMinuman);
        return $stmt->execute();
    }

    public function update($id, $nama, $jenisKuliner, $idMakanan, $idMinuman)
    {
        $query = "UPDATE " . $this->table . "
                  SET NamaRestoran = :nama, JenisKuliner = :jenisKuliner,
                      IDMakananUnggulan = :idMakanan, IDMinumanUnggulan = :idMinuman
                  WHERE RestaurantID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jenisKuliner', $jenisKuliner);
        $stmt->bindParam(':idMakanan', $idMakanan);
        $stmt->bindParam(':idMinuman', $idMinuman);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE RestaurantID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
