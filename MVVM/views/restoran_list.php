<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4" style="text-align: center;">Restoran List</h2>
<div class="flex justify-center mb-4">
<a href="index.php?entity=restoran&action=add" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Restoran</a>
</div>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama</th>
        <th class="border p-2">Jenis Kuliner</th>
        <th class="border p-2">Makanan Unggulan</th>
        <th class="border p-2">Minuman Unggulan</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($restoranList as $r): ?>
    <tr>
        <td class="border p-2"><?php echo $r['NamaRestoran']; ?></td>
        <td class="border p-2"><?php echo $r['JenisKuliner']; ?></td>
        <td class="border p-2"><?php echo $r['NamaMakanan'] ?? '-'; ?></td>
        <td class="border p-2"><?php echo $r['NamaMinuman'] ?? '-'; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=restoran&action=edit&id=<?php echo $r['RestaurantID']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=restoran&action=delete&id=<?php echo $r['RestaurantID']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
