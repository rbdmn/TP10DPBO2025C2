<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($minuman) ? 'Edit Minuman' : 'Add Minuman'; ?></h2>
<form action="index.php?entity=minuman&action=<?php echo isset($minuman) ? 'update&id=' . $minuman['MinumanID'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Minuman:</label>
        <input type="text" name="nama" value="<?php echo isset($minuman) ? $minuman['NamaMinuman'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Tipe:</label>
        <input type="text" name="tipe" value="<?php echo isset($minuman) ? $minuman['Tipe'] : ''; ?>" class="border p-2 w-full">
    </div>
    <div>
        <label class="block">Harga Rata-Rata:</label>
        <input type="number" step="0.01" name="harga" value="<?php echo isset($minuman) ? $minuman['HargaRataRata'] : ''; ?>" class="border p-2 w-full">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
