<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($makanan) ? 'Edit Makanan' : 'Add Makanan'; ?></h2>
<form action="index.php?entity=makanan&action=<?php echo isset($makanan) ? 'update&id=' . $makanan['MakananID'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Makanan:</label>
        <input type="text" name="nama" value="<?php echo isset($makanan) ? $makanan['NamaMakanan'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Kategori:</label>
        <input type="text" name="kategori" value="<?php echo isset($makanan) ? $makanan['Kategori'] : ''; ?>" class="border p-2 w-full">
    </div>
    <div>
        <label class="block">Harga Rata-Rata:</label>
        <input type="number" step="0.01" name="harga" value="<?php echo isset($makanan) ? $makanan['HargaRataRata'] : ''; ?>" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
