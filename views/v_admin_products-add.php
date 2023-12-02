<?php 

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $id_category = $_POST['id_category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_FILES["file"]["name"];
    $qty = $_POST['qty'];

    if (empty($name) || empty($id_category) || empty($price) || empty($img) || empty($qty)) {
        $_SESSION['loi'] = '<strong>Bạn cần điền đủ thông tin để tạo sản phẩm</strong>';
    } else {
        $kq = product_checkName($name);
        if ($kq) {
            $_SESSION['loi'] = 'Không thể tạo trùng tên của sản phẩm <strong>' . $name . '</strong>';
        } else {
            product_add($name, $id_category, $description, $price, $img, $qty);
            $_SESSION['thongbao'] = 'Đã tạo thành công <strong>' . $name . '</strong>';
        }
    }

    if (isset($_FILES['file'])) {   
        $upload_dir = './public/assets/media/images/product/';
        $upload_file = $upload_dir . $_FILES['file']['name'];
        $type_allow = array('png', 'jpg', 'jpeg', 'gif');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($type), $type_allow)) {
            $error['type'] = "Chỉ được upload file có đuôi PNG, JPG, GIF, JPEG";
        } else if ($_FILES['file']['size'] > 29000000) {
            $error['file_size'] = "Chỉ được upload file bé hơn 20MB";
        } else {
            if(file_exists($upload_file)) {
                $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                $new_filename = $filename.'- Copy.';
                $new_upload_file = $upload_dir.$new_filename.$type;
                $k=1;
                while(file_exists($new_upload_file)) {
                    $new_filename = $filename." - Copy({$k}).";
                    $k++;
                    $new_upload_file = $upload_dir.$new_filename.$type;
                }
                $upload_file = $new_upload_file;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $image = $new_filename.$type;
                } 
            } else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                    $image = $filename.$type;
                } 
            }
        }
    }
    header("Location: ?mod=admin&act=products-add");
    exit;
}

?>
<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <i class="far fa-search"></i>
            <input type="text" placeholder="Tìm kiếm...">
        </div>
        <div class="info-user">
            <div class="notifiComment">
                <i class="far fa-comment-alt btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <?php
                    $getCmt = getAllComment();
                    arsort($getCmt);
                    $getCmt = array_slice($getCmt, 0, 6, true);
                    foreach ($getCmt as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        $getProduct = getProductById($item['id_product']);
                        ?>
                        <li>
                            <div class="col-12 d-flex">
                                <div class="col-2">
                                    <img class="notifiAdminImg"
                                        src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                                </div>
                                <div class="col-10">
                                    <p class="notifiAdminText body-small"><strong>
                                            <?php echo $getUser['fullname'] ?>
                                        </strong><span> đã bình luận ở sản phẩm <strong><a href="">
                                                    <?php echo $getProduct['name'] ?>
                                                </a></strong></span></p>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="notifiBell">
                <i class="fal fa-bell btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                <?php
                    $getBill = getBill();
                    arsort($getBill);
                    $getBill = array_slice($getBill, 0, 6, true);
                    foreach ($getBill as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        ?>
                        <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="./public/assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong><?php echo $getUser['fullname']?></strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong><?php echo $item['id']?></strong></span></p>
                            </div>
                        </div>
                    </li>
                        <?php
                    }
                    ?>
                    
                </ul>
            </div>
            <div class="imgUserAdmin">
                <?php
                $getID = $_SESSION['admin']['id_user'];
                $getUser = getUserById($getID);
                ?>
                <img style="" class="btnShowFeature"
                    src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="?mod=user&act=logOut-account">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin_order-detail p30">
        <div class="localDashboard">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="col-12">
                        <h2>Thêm Sản Phẩm</h2>
                    </div>
                    <div class="col-12">
                        <span class="label-large">Admin /</span><a href="?mod=admin&act=products&page=1" class="label-large" style="text-decoration: none;"> Sản Phẩm</a> / <a href="#!" class="label-large" style="text-decoration: none;"> Thêm Sản Phẩm</a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>

        <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
            
                <?php if (isset($_SESSION['thongbao'])) : ?>
                    <div class="alert alert-success" role="alert"><?= $_SESSION['thongbao'] ?></div>
                <?php endif;
                unset($_SESSION['thongbao']) ?>
            <?php if (isset($_SESSION['loi'])) : ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['loi'] ?></div>
            <?php endif;
            unset($_SESSION['loi']) ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div class="left-order-add-create">
                            <label class="title-medium">Tên Sản Phẩm</label>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm" aria-label="default input example">
                        </div>
                        <div class="describe-order_detail">
                            <label class="title-medium">Mô Tả</label>
                            <textarea name="description" id="tiny" cols="30" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
                            
                        </div>
                        <div class="Dropdowns_categogy">
                            <label class="title-medium">Danh mục</label>
                            <div class="custom-select">
                                <!-- Dropdown -->
                                <select id="id_category" name="id_category">
                                    <?php foreach($getAllCategory as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="margin-bottom: 30px;">
                                <label class="title-medium">Sản phẩm còn lại</label>
                                <input  type="text" name="qty" placeholder="1000" aria-label="default input example">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="title-medium">Giá</label>
                                <input  type="text" id="price" name="price" placeholder="Nhập giá tiền" aria-label="default input example">
                            </div>
                            <div class="col-6">
                                <label class="title-medium">Giá khuyến mãi</label>
                                <input type="text" placeholder="Nhập giá khuyến mãi" aria-label="default input example">
                            </div>
                        </div>
                        <div class="row">
                            <div class="rol-6 mt-3">
                                <input style="background-color:#6750a4;color: #fff ;padding: 10px 15px; font-size: 14px; font-weight: 500;" class="btn btn-primary" type="submit" name="submit" value="Tạo Sản Phẩm">

                            </div>

                        </div>
                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <img id="previewImage" src="">
                            </div>
                            <hr>
                            <div style="width: 100%;" id="drop-area">
                                <label class="title-medium">Kéo thả ảnh ở đây</label>
                                <br>
                                <input type="file" id="fileInput" name="file">
                            </div>

                            <div style="width: 100%;" id="demo" class="demo .box-shadow1">

                            </div>
                            <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                            <div class="col-8"></div>
                                    <div class="col-4 d-flex justify-content-between g12">
                                        <button type="button " class="btn p12" style="background-color:#6750a4; color:#fff;">Cập nhật</button>
                                        <button type="button" id="deleteButtonAll p12" class="btn btn-danger">Xóa</button>
                                        <button type="button" class="btn box-shadow1 p12">Hủy</button>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

        </div>

    </div>

    <!----======== End Body DashBoard ======== -->

</section>
<script>
  document.getElementById('fileInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImage').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
  tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  menubar: 'file edit view'
});
</script>
