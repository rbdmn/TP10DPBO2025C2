<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4" style="text-align: center;" >Minuman List</h2>
<div class="flex justify-center mb-4">
<a href="index.php?entity=minuman&action=add" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Minuman</a>
</div>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama Minuman</th>
        <th class="border p-2">Tipe</th>
        <th class="border p-2">Harga Rata-Rata</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($minumanList as $m): ?>
    <tr>
        <td class="border p-2"><?php echo $m['NamaMinuman']; ?></td>
        <td class="border p-2"><?php echo $m['Tipe']; ?></td>
        <td class="border p-2">Rp. <?php echo $m['HargaRataRata']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=minuman&action=edit&id=<?php echo $m['MinumanID']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=minuman&action=delete&id=<?php echo $m['MinumanID']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
