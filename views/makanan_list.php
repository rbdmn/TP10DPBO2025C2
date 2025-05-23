<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4" style="text-align: center;">Makanan List</h2>
<div class="flex justify-center mb-4">
    <a href="index.php?entity=makanan&action=add" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Makanan</a>
</div>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama Makanan</th>
        <th class="border p-2">Kategori</th>
        <th class="border p-2">Harga Rata-Rata</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($makananList as $m): ?>
    <tr>
        <td class="border p-2"><?php echo $m['NamaMakanan']; ?></td>
        <td class="border p-2"><?php echo $m['Kategori']; ?></td>
        <td class="border p-2">Rp. <?php echo $m['HargaRataRata']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=makanan&action=edit&id=<?php echo $m['MakananID']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=makanan&action=delete&id=<?php echo $m['MakananID']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
