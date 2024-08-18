<?php
require 'layouts/header.php';
require 'koneksi.php'; // import koneksi.php untuk menghubungkan ke database

// Query untuk mengambil data dari tabel product
$sql = "SELECT id, nama, gambar, detail FROM product";
$result = $koneksi->query($sql);
$tblProduct = $result->fetch_all(MYSQLI_ASSOC); //ambil semua baris sbg array assosiatif
?>

<!-- product section -->
<section class="service_section layout_padding">
    <div class="container">
        <div class="service_container layout_padding2">
            <!-- memulai loop untuk iterasi pengambilan data product -->
            <?php foreach ($tblProduct as $product): ?>
                <a href="#product<?= $product['id']; ?>">
                    <div class="box" id="product<?= $product['id']; ?>">
                        <div class="img-box">
                            <img src="images/product/<?= $product['gambar']; ?>" alt="<?= $product['nama']; ?>"
                                style="width: 100%; height: auto;">
                        </div>
                        <div class="name">
                            <h6>
                                <?= $product['nama']; ?>
                            </h6>
                            <br>
                            <h6>
                                <?= $product['detail']; ?>
                            </h6>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- end product section -->

<?php require 'layouts/footer.php'; ?>