<?php
  // hàm lấy tất cả người dùng
include_once 'models/m_pdo.php';

  function getAllClient(){
    return pdo_query("SELECT * FROM user");
  }

//   
function get_Categoris($start = 0, $limit = 0, $kyw_cg = "", $sort = 0,$id = 0) {
    $sql = "SELECT * FROM category";

    if ($kyw_cg != "") {
        $sql .= " WHERE name LIKE '%$kyw_cg%'";
    }

    if($sort > 0){
        if($sort == 1){
            $sql .= " ORDER BY id DESC";
        }
        elseif($sort == 2){
            $sql .= " ORDER BY name DESC";
        }
        elseif($sort == 3){
            $sql .= " ORDER BY name ASC";
        }
    }

    if ($limit > 0) {
        $sql .= " LIMIT $start, $limit";
    }
    if ($id > 0) {
        $sql .= " WHERE id = $id";
    }

    return pdo_query($sql);
}



function count_Categoris(){
    return pdo_query_one("SELECT count(*) AS soluong FROM category");
}
function count_products_category($id) {
    $sql = "SELECT COUNT(product.id) AS SLSP 
            FROM category 
            LEFT JOIN product ON category.id = product.id_category 
            WHERE category.id = ? 
            GROUP BY category.id";
    return pdo_query($sql, $id);
}
function getidCategories($id) {
    return pdo_query_one("SELECT * FROM category WHERE id = ? ", $id);
}
function update_Category($id_category, $name_cg, $description_cg, $img_cg, $is_appear, $is_special) {
    pdo_execute("UPDATE category SET name= ?, description = ?, img = ?, is_appear = ?, is_special = ? WHERE id = ?", $name_cg, $description_cg, $img_cg, $is_appear, $is_special, $id_category);
}
function add_Category($add_name_cg, $add_img_cg, $add_description_cg, $add_color_cg) {
    pdo_execute("INSERT INTO category (name, img, description, bg_color) VALUES ('$add_name_cg', '$add_img_cg', '$add_description_cg', '$add_color_cg')");
}  
// -------------------------------- Phần orders --------------------------------
function get_Order_bill($filter = "", $status = 0){
    $sql = "SELECT bill.*, payment.name AS name_Payment, user.username AS order_user 
            FROM bill 
            INNER JOIN payment ON bill.id_payment = payment.id
            INNER JOIN user ON bill.id_user = user.id ";
    if($filter == "old"){
        $sql .= " ORDER BY id DESC";
    }
    if($filter == "status"){
            $sql .= "WHERE status = $status ORDER BY status";
    }
    return pdo_query($sql);
}
function get_One_Order_bill($id){
    $sql = "SELECT bill.*, payment.name AS name_Payment, user.username AS order_user, cart.product_name AS product_name, 
    cart.category AS category_product
    FROM bill
    INNER JOIN payment ON bill.id_payment = payment.id
    INNER JOIN cart ON bill.id = cart.id 
    INNER JOIN user ON bill.id_user = user.id WHERE bill.id = $id";
    return pdo_query_one($sql);     
    }
    function get_Cart_bill($id) {
        $sql = "SELECT cart.*, category.name AS category_name
        FROM cart
        INNER JOIN category ON cart.category = category.id
        WHERE id_bill = $id";
        return pdo_query($sql);
        }
    function shipping($id){
        return pdo_query("SELECT * FROM shipping WHERE id = $id");
    }
    function update_Change_status($change_status,$id) {
        pdo_execute("UPDATE bill SET status= ? WHERE id = ?",$change_status,$id);
    }
    
// -------------------------------- Phần orders kết thúc------------------------


  // hàm lấy tất cả bảng của category qua product để lấy tên category, mỗi trang sẽ có 9 products
  function productAdmin($page=1){
    $batdau = ($page - 1)*9;
    return pdo_query("SELECT p.*, c.name AS category_name FROM product p LEFT JOIN category c ON p.id_category = c.id LIMIT $batdau,9 ");
  }

 

  function productSearchAdmin($keyword, $page=1, $perPage){
    $batdau = ($page - 1) * $perPage;
    return pdo_query("SELECT p.*, c.name AS category_name FROM product p LEFT JOIN category c ON p.id_category = c.id WHERE p.name LIKE '%$keyword%' LIMIT $batdau, $perPage");
}

function product_searchTotal($keyword){
  $keyword = strtolower($keyword); // Chuyển đổi từ khóa tìm kiếm về chữ thường
  $query = "SELECT COUNT(*) FROM product p WHERE LOWER(p.name) LIKE '%" . $keyword . "%'";
  return pdo_query_value($query);
}

  // hàm đếm tấc cả các product trong database
  function product_CountTotal(){
    return pdo_query_value('SELECT COUNT(*) FROM product ');
  }
  
  // hàm lấy product theo id
  function product_getById($id){
      return pdo_query_one("SELECT p.*, c.name AS category_name FROM product p LEFT JOIN category c ON p.id_category = c.name WHERE p.id = ?", $id);
  }

  // xóa product theo id
  function remove_product($id){
    pdo_execute("DELETE FROM product WHERE id = ?", [$id]);
}


  // hàm thêm product bên admin
function product_add($name,$id_category,$description,$price, $img, $qty){
  pdo_execute("INSERT INTO product (`name`,`id_category`,`description`,`price`,`img`,`qty`) VALUES(?,?,?,?,?,?) ORDER BY creadt_date ASC",$name,$id_category,$description,$price, $img, $qty);
}

// hàm để kiểm tra tên sách đã có sẳn trong database hay chưa
function product_checkName($name){
  return pdo_query_one("SELECT * FROM product WHERE name = ?",$name);
}
// hàm chỉnh sửa product bên admin
function product_edit($id,$name,$id_category,$description,$price, $img, $qty){
  pdo_execute("UPDATE product SET name=?, id_category=?, description=?, price=? , img=?, qty=? WHERE id = ?",$name,$id_category,$description,$price, $img, $qty,$id);
}

// hàm cập nhật hình ảnh của trang product-details
function updateImg($img , $id){
    pdo_execute("UPDATE product SET img = ? WHERE id = ?",$img,$id);
}
?>  


