
<?php
include_once '../../../config/dbase/dbase.php';

$categ_photo = '';
$banner_title = array();
$banner_img = array();
$banner_desc = array();
$bannerphoto = '';

$check_query = "SELECT * FROM Main_carousel";
$result = mysqli_query($connect, $check_query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $banner_img[] = $row['surat'];
        $banner_desc[] = $row['description'];
        $banner_title[] = $row['title'];
    }
}

if (!empty($banner_img)) : ?>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php for ($i = 0; $i < count($banner_img); $i++) : ?>
            <div class="item">
                <img src="pages/images/banner_img/<?= htmlspecialchars($banner_img[$i]) ?>" alt="<?= htmlspecialchars($banner_title[$i]) ?>" 
                data-title="<?= htmlspecialchars($banner_title[$i]) ?>" data-description="<?= htmlspecialchars($banner_desc[$i]) ?>">
            </div>
        <?php endfor; ?>
    </div>
<?php endif; ?>