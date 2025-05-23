<?php
require_once 'viewmodel/MakananViewModel.php';
require_once 'viewmodel/MinumanViewModel.php';
require_once 'viewmodel/RestoranViewModel.php';

$entity = $_GET['entity'] ?? 'makanan';
$action = $_GET['action'] ?? 'list';

// ==== MAKANAN ====
if ($entity == 'makanan') {
    $viewModel = new MakananViewModel();
    if ($action == 'list') {
        $makananList = $viewModel->getMakananList();
        require_once 'views/makanan_list.php';
    } elseif ($action == 'add') {
        require_once 'views/makanan_form.php';
    } elseif ($action == 'edit') {
        $makanan = $viewModel->getMakananById($_GET['id']);
        require_once 'views/makanan_form.php';
    } elseif ($action == 'save') {
        $viewModel->addMakanan($_POST['nama'], $_POST['kategori'], $_POST['harga']);
        header('Location: index.php?entity=makanan');
    } elseif ($action == 'update') {
        $viewModel->updateMakanan($_GET['id'], $_POST['nama'], $_POST['kategori'], $_POST['harga']);
        header('Location: index.php?entity=makanan');
    } elseif ($action == 'delete') {
        $viewModel->deleteMakanan($_GET['id']);
        header('Location: index.php?entity=makanan');
    }

    // ==== MINUMAN ====
} elseif ($entity == 'minuman') {
    $viewModel = new MinumanViewModel();
    if ($action == 'list') {
        $minumanList = $viewModel->getMinumanList();
        require_once 'views/minuman_list.php';
    } elseif ($action == 'add') {
        require_once 'views/minuman_form.php';
    } elseif ($action == 'edit') {
        $minuman = $viewModel->getMinumanById($_GET['id']);
        require_once 'views/minuman_form.php';
    } elseif ($action == 'save') {
        $viewModel->addMinuman($_POST['nama'], $_POST['kategori'], $_POST['harga']);
        header('Location: index.php?entity=minuman');
    } elseif ($action == 'update') {
        $viewModel->updateMinuman($_GET['id'], $_POST['nama'], $_POST['kategori'], $_POST['harga']);
        header('Location: index.php?entity=minuman');
    } elseif ($action == 'delete') {
        $viewModel->deleteMinuman($_GET['id']);
        header('Location: index.php?entity=minuman');
    }

    // ==== RESTORAN ====
} elseif ($entity == 'restoran') {
    $viewModel = new RestoranViewModel();
    if ($action == 'list') {
        $restoranList = $viewModel->getRestoranList();
        require_once 'views/restoran_list.php';
    } elseif ($action == 'add') {
        $makananList = $viewModel->getMakananList();
        $minumanList = $viewModel->getMinumanList();
        require_once 'views/restoran_form.php';
    } elseif ($action == 'edit') {
        $restoran = $viewModel->getRestoranById($_GET['id']);
        $makananList = $viewModel->getMakananList();
        $minumanList = $viewModel->getMinumanList();
        require_once 'views/restoran_form.php';
    } elseif ($action == 'save') {
        $viewModel->addRestoran($_POST['nama'], $_POST['jenis'], $_POST['idmakanan'], $_POST['idminuman']);
        header('Location: index.php?entity=restoran');
    } elseif ($action == 'update') {
        $viewModel->updateRestoran($_GET['id'], $_POST['nama'], $_POST['jenis'], $_POST['idmakanan'], $_POST['idminuman']);
        header('Location: index.php?entity=restoran');
    } elseif ($action == 'delete') {
        $viewModel->deleteRestoran($_GET['id']);
        header('Location: index.php?entity=restoran');
    }
}
