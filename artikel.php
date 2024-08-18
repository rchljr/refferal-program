<?php require 'layouts/header.php'; ?>

<!-- news section -->
<section class="news_section layout_padding">
    <div class="container">
        <div class="d-flex flex-column align-items-end">
            <div class="custom_heading-container">
                <hr>
                <h2>
                    Article
                </h2>
            </div>
            <p>
                Artikel yang berkaitan dengan BAMC
            </p>
        </div>
        <div class="row">
            <?php
            // Data artikel statis
            $articles = [
                [
                    'title' => 'BAMC Ulang Tahun Ke-40',
                    'content' => 'Pada kesempatan ini, puluhan klub motor turut menyemarakkan suasana mulai HOG Jakarta Chapter, ISHD (Ikatan Sport Harley-Davidson), HDCI (Harley-Davidson Club Indonesia), Bikers Brotherhood 1% MC, Eight Demon, Blind Eagle, Motor Antique Club Indonesia (MACI), Black Mamba, Chopper Baztard, Ahooy Geboy, Road Pirates MC, Piston Pirates MC, dan masih banyak lagi. Beberapa selebriti pun turut ambil bagian, seperti Ananda Omesh, Ferry Maryadi, dan Tora Sudiro yang bertugas sebagai MC Acara.',
                    'date' => '2024-01-01'
                ],
                [
                    'title' => 'Touring BAMC Se Sumatra',
                    'content' => 'Pada kesempatan ini, puluhan klub motor turut menyemarakkan suasana mulai HOG Jakarta Chapter, ISHD (Ikatan Sport Harley-Davidson), HDCI (Harley-Davidson Club Indonesia), Bikers Brotherhood 1% MC, Eight Demon, Blind Eagle, Motor Antique Club Indonesia (MACI), Black Mamba, Chopper Baztard, Ahooy Geboy, Road Pirates MC, Piston Pirates MC, dan masih banyak lagi. Beberapa selebriti pun turut ambil bagian, seperti Ananda Omesh, Ferry Maryadi, dan Tora Sudiro yang bertugas sebagai MC Acara.',
                    'date' => '2024-01-01'
                ],
                [
                    'title' => 'BAMC Goes To Korea',
                    'content' => 'Pada kesempatan ini, puluhan klub motor turut menyemarakkan suasana mulai HOG Jakarta Chapter, ISHD (Ikatan Sport Harley-Davidson), HDCI (Harley-Davidson Club Indonesia), Bikers Brotherhood 1% MC, Eight Demon, Blind Eagle, Motor Antique Club Indonesia (MACI), Black Mamba, Chopper Baztard, Ahooy Geboy, Road Pirates MC, Piston Pirates MC, dan masih banyak lagi. Beberapa selebriti pun turut ambil bagian, seperti Ananda Omesh, Ferry Maryadi, dan Tora Sudiro yang bertugas sebagai MC Acara.',
                    'date' => '2024-01-01'
                ],
                [
                    'title' => 'BAMC Goes To Korea',
                    'content' => 'Pada kesempatan ini, puluhan klub motor turut menyemarakkan suasana mulai HOG Jakarta Chapter, ISHD (Ikatan Sport Harley-Davidson), HDCI (Harley-Davidson Club Indonesia), Bikers Brotherhood 1% MC, Eight Demon, Blind Eagle, Motor Antique Club Indonesia (MACI), Black Mamba, Chopper Baztard, Ahooy Geboy, Road Pirates MC, Piston Pirates MC, dan masih banyak lagi. Beberapa selebriti pun turut ambil bagian, seperti Ananda Omesh, Ferry Maryadi, dan Tora Sudiro yang bertugas sebagai MC Acara.',
                    'date' => '2024-01-01'
                ],
            ];

            // Loop melalui setiap artikel dan tampilkan
            foreach ($articles as $article): ?>
                <div class="col-md-4">
                    <div class="box">
                        <div class="detail-box">
                            <h4>
                                <a
                                    href="https://www.bikersnote.co.id/sudah-40-tahun-black-angels-mc-lebih-dari-sekadar-klub/">
                                    <?= $article['title']; ?>
                                </a>
                            </h4>
                            <p class="text-end">
                                <?= $article['date']; ?><br class="mb-3">
                            </p>
                            <p>
                                <?= $article['content']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- end news section -->

<?php require 'layouts/footer.php'; ?>