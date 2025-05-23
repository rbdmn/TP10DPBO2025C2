<?php
require_once 'model/Makanan.php';

class MakananViewModel
{
    private $makanan;

    public function __construct()
    {
        $this->makanan = new Makanan();
    }

    public function getMakananList()
    {
        return $this->makanan->getAll();
    }

    public function getMakananById($id)
    {
        return $this->makanan->getById($id);
    }

    public function addMakanan($nama, $kategori, $harga)
    {
        return $this->makanan->create($nama, $kategori, $harga);
    }

    public function updateMakanan($id, $nama, $kategori, $harga)
    {
        return $this->makanan->update($id, $nama, $kategori, $harga);
    }

    public function deleteMakanan($id)
    {
        return $this->makanan->delete($id);
    }
}
