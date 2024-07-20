<?php 
$sayfa = "Anasayfa Ayarları";    
include('inc/head.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to update the database
    $ust_baslik = $_POST['ust_baslik'];
    $alt_baslik = $_POST['alt_baslik'];
    $link = $_POST['link'];
    $link_text = $_POST['link_text'];
    
    $update_query = $baglanti->prepare("UPDATE anasayfa SET ust_baslik = ?, alt_baslik = ?, link = ?, link_text = ?");
    $update_query->execute([$ust_baslik, $alt_baslik, $link, $link_text]);

    echo "Anasayfa içeriği güncellendi.";
}

// Fetch the current homepage settings
$con = $baglanti->prepare("SELECT * FROM anasayfa");
$con->execute();
$sonuc = $con->fetch();
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Anasayfa Ayarları</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="ust_baslik">Üst Başlık</label>
                <input type="text" class="form-control" id="ust_baslik" name="ust_baslik" value="<?php echo $sonuc['ust_baslik']; ?>">
            </div>
            <div class="form-group">
                <label for="alt_baslik">Alt Başlık</label>
                <input type="text" class="form-control" id="alt_baslik" name="alt_baslik" value="<?php echo $sonuc['alt_baslik']; ?>">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="<?php echo $sonuc['link']; ?>">
            </div>
            <div class="form-group">
                <label for="link_text">Link Metni</label>
                <input type="text" class="form-control" id="link_text" name="link_text" value="<?php echo $sonuc['link_text']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</main>

<?php 
include('inc/footer.php'); 
?>
