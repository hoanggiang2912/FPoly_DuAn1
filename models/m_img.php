<?php 
    function getThumbnailsById($idProduct) {
        $sql = "SELECT * FROM img WHERE is_thumbnail = 1 AND id_product = $idProduct";
        return pdo_query($sql);
    }
?>