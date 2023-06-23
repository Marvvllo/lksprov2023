<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="calendar.css">
</head>

<body>
    <?php
    // Menghitung kalender dari tanggal
    if (!empty($_GET['bulan'])) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        switch ($_GET['button']) {
            case 'sebelumnya':
                $bulan--;
                break;
            case 'berikutnya':
                $bulan++;
                break;
        }
    } else {
        $bulan = date('m');
        $tahun = date('Y');
    }

    // Mencari variabel yang akan digunakan berdasarkan tanggal yang dipilih
    $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
    $jd = gregoriantojd($bulan, 1, $tahun);
    $namaBulan = jdmonthname($jd, 1);
    $namaHari = jddayofweek($jd, 1);
    $hariKosong = jddayofweek($jd, 0);
    $arrayHari = [];

    // Isi Array dengan hari kosong dari bulan sebelumnya
    for ($j = 0; $j < $hariKosong; $j++) {
        array_push($arrayHari, "&nbsp");
    }

    // Isi kalender dengan hari
    for ($i = 1; $i < $jumlahHari + 1; $i++) {
        array_push($arrayHari, $i);
    }

    // Pisah array hari menjadi 7 hari
    $arrayMinggu = array_chunk($arrayHari, 7, true);

    ?>

    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <form action="index.php" method="get">
                    <nav>
                        <input type="hidden" min="1" name="tahun" value="<?= $tahun ?>"><br>
                        <input type="hidden" min="1" name="bulan" value="<?= $bulan ?>"><br>
                        <input type="submit" name="button" value="sebelumnya" href="#" class="custom-btn custom-prev"></input>
                        <input type="submit" name="button" value="berikutnya" href="#" class="custom-btn custom-next"></input>
                    </nav>
                </form>
                <h2 id="custom-month" class="custom-month"><?= $namaBulan ?></h2>
                <h3 id="custom-year" class="custom-year"><?= $tahun ?></h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="fc-body">
                        <?php foreach ($arrayMinggu as $minggu) : ?>
                            <div class="fc-row">
                                <?php foreach ($minggu as $nomorHari) : ?>
                                    <?php if (date('Y') == $tahun  && date('m') == $bulan && date('d') == $nomorHari) : ?>
                                        <div class="fc-today"><span class="fc-date"><?= $nomorHari ?></span></div>
                                    <?php else : ?>
                                        <div><span class="fc-date"><?= $nomorHari ?></span></div>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>