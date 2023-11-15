<?php 
    function getProducts ($limit = 0) {
        $sql = "SELECT * FROM product";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }
    
    function getProductsByCategoryId ($id_category ,$limit = 0) {
        $sql = "SELECT * FROM product WHERE id_category = $id_category";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }
    function getProductsByLove ($limit = 0) {
        $sql = "SELECT * FROM product ORDER BY love DESC";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }

    function getFeatureProduct () {
        $sql = "SELECT * FROM product WHERE is_upcomming = 1 LIMIT 1";
        return pdo_query_one($sql);
    }
    
    function getSpecialProduct() {
        $sql = "SELECT * FROM product WHERE is_special = 1 LIMIT 1";
        return pdo_query_one($sql);
    }
?>