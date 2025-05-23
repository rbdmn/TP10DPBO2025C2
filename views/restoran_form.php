<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($restoran) ? 'Edit Restoran' : 'Add Restoran'; ?></h2>
<form action="index.php?entity=restoran&action=<?php echo isset($restoran) ? 'update&id=' . $restoran['RestaurantID'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Restoran:</label>
        <input type="text" name="nama" value="<?php echo isset($restoran) ? $restoran['NamaRestoran'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Jenis Kuliner:</label>
        <input type="text" name="jenis" value="<?php echo isset($restoran) ? $restoran['JenisKuliner'] : ''; ?>" class="border p-2 w-full">
    </div>
    <div>
        <label class="block">Makanan Unggulan:</label>
        <select name="idmakanan" class="border p-2 w-full">
            <option value="">-- Pilih Makanan --</option>
            <?php foreach ($makananList as $m): ?>
            <option value="<?php echo $m['MakananID']; ?>" <?php echo isset($restoran) && $restoran['IDMakananUnggulan'] == $m['MakananID'] ? 'selected' : ''; ?>>
                <?php echo $m['NamaMakanan']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Minuman Unggulan:</label>
        <select name="idminuman" class="border p-2 w-full">
            <option value="">-- Pilih Minuman --</option>
            <?php foreach ($minumanList as $m): ?>
            <option value="<?php echo $m['MinumanID']; ?>" <?php echo isset($restoran) && $restoran['IDMinumanUnggulan'] == $m['MinumanID'] ? 'selected' : ''; ?>>
                <?php echo $m['NamaMinuman']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
