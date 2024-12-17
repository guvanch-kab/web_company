// Resimleri çek
$sql = "SELECT image, image_path FROM Products WHERE PRODUCT_CODE = '$prod_code_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$images = explode(',', $row['image']); // Resimleri diziye dönüştür
$image_path = $row['image_path']; // Resimlerin yolu


////////////

<div class="product-gallery">
    <!-- Ana resim -->
    <div class="main-image">
        <img src="<?= $image_path . $images[0]; ?>" alt="Ana Resim" id="mainImage" style="width:100%; height:auto;">
    </div>

    <!-- Küçük resimler -->
    <div class="thumbnail-images" style="display: flex; gap: 10px; margin-top: 20px;">
        <?php foreach (array_slice($images, 1) as $thumbnail): ?>
            <img  src="<?= $image_path . $thumbnail; ?>" alt="Küçük Resim"  class="thumbnail" style="width:100px; height:100px; cursor:pointer;" onclick="updateMainImage('<?= $image_path . $thumbnail; ?>')">
        <?php endforeach; ?>
    </div>
</div>

function updateMainImage(newSrc) {
document.getElementById('mainImage').src = newSrc;
}


CSS Tarafı (Opsiyonel)

.thumbnail-images img {
border: 1px solid #ccc;
border-radius: 5px;
transition: transform 0.3s;
}

.thumbnail-images img:hover {
transform: scale(1.1);
border-color: #000;
}