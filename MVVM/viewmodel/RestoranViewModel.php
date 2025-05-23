<?php
require_once 'model/Restoran.php';
require_once 'model/Makanan.php';
require_once 'model/Minuman.php';

class RestoranViewModel
{
    private $restoran;
    private $makanan;
    private $minuman;

    public function __construct()
    {
        $this->restoran = new Restoran();
        $this->makanan = new Makanan();
        $this->minuman = new Minuman();
    }

    public function getRestoranList()
    {
        return $this->restoran->getAll();
    }

    public function getRestoranById($id)
    {
        return $this->restoran->getById($id);
    }

    public function getMakananList()
    {
        return $this->makanan->getAll();
    }

    public function getMinumanList()
    {
        return $this->minuman->getAll();
    }

    public function addRestoran($nama, $jenisKuliner, $idMakanan, $idMinuman)
    {
        return $this->restoran->create($nama, $jenisKuliner, $idMakanan, $idMinuman);
    }

    public function updateRestoran($id, $nama, $jenisKuliner, $idMakanan, $idMinuman)
    {
        return $this->restoran->update($id, $nama, $jenisKuliner, $idMakanan, $idMinuman);
    }

    public function deleteRestoran($id)
    {
        return $this->restoran->delete($id);
    }
}
