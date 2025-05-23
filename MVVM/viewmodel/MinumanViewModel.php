<?php
require_once 'model/Minuman.php';

class MinumanViewModel
{
    private $minuman;

    public function __construct()
    {
        $this->minuman = new Minuman();
    }

    public function getMinumanList()
    {
        return $this->minuman->getAll();
    }

    public function getMinumanById($id)
    {
        return $this->minuman->getById($id);
    }

    public function addMinuman($nama, $tipe, $harga)
    {
        return $this->minuman->create($nama, $tipe, $harga);
    }

    public function updateMinuman($id, $nama, $tipe, $harga)
    {
        return $this->minuman->update($id, $nama, $tipe, $harga);
    }

    public function deleteMinuman($id)
    {
        return $this->minuman->delete($id);
    }
}
