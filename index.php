<?php require 'layouts/header.php';
?>

<!-- slider section -->
<section class=" slider_section position-relative">

    <div class="slider_bg-container">

    </div>
    <div class="slider-container ">

        <div class="detail-box">

            <h1>
                WELCOME TO <br>
                BLACK ANGELS <br>
                MOTORCYCLE CLUB
            </h1>
            <p>
                Berdiri sejak 2 Januari 1979, Black Angels Motorcycle Club (BAMC) menjadi komunitas motor tertua di
                Indonesia. Tahun ini merupakan tahun ke-43 berdirinya BAMC. Komunitas ini diprakarsai oleh Indrodjojo
                Kusumonegoro (Indro Warkop), Tony Dhono, dan Rafiadjie Rafioen.


            </p>

        </div>
        <div class="img-box">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/Black Angels Motorcycle Club (BAMC).jpg" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="images/Black Angels Motorcycle Club (BAMC).jpg" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="images/Black Angels Motorcycle Club (BAMC).jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev mt-5 " href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next mt-5 me-10" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>
<!-- end slider section -->

<!-- gallery section -->

<section class="portfolio_section layout_padding">
    <div class="container">
        <div class="d-flex flex-column align-items-end">
            <div class="custom_heading-container">
                <hr>
                <h2>
                    Gallery Club
                </h2>
            </div>
        </div>
        <div class="layout_padding-top layout_padding2-bottom">
            <div class="row">
                <div class="col-md-4">
                    <div class="img-box">
                        <img src="images/gallery/1.jpg" alt="Description 1" height="200px">
                        <a href="#" class="text-center">
                            Markas Utama
                        </a>
                        <p>
                            Markas Utama BAMC
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-box">
                        <img src="images/gallery/2.jpg" alt="Description 2" height="200px">
                        <a href="#" class="text-center">
                            Pengurus
                        </a>
                        <p>
                            Pengurus BAMC
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="img-box">
                        <img src="images/gallery/3.jpg" alt="Description 3" height="200px">
                        <a href="#" class="text-center">
                            Anggota
                        </a>
                        <p>
                            Anggota Anggota BAMC
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end gallery section -->

<?php require 'layouts/footer.php' ?>