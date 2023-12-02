<?php
$idProduct = $_GET['id'];
$idProduct = $_GET['id'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $id_category = $_POST['id_category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    // Kiểm tra xem người dùng đã chọn file ảnh mới hay chưa
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $img = $_FILES["file"]["name"];

        // Thực hiện việc upload file ảnh
        $upload_dir = './public/assets/media/images/product/';
        $upload_file = $upload_dir . $_FILES['file']['name'];

        // Xử lý upload đúng file ảnh
        $type_allow = array('png', 'jpg', 'jpeg', 'gif');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if (!in_array(strtolower($type), $type_allow)) {
            $error['type'] = "Chỉ được upload file có đuôi PNG, JPG, GIF, JPEG";
        } else if ($_FILES['file']['size'] > 29000000) {
            $error['file_size'] = "Chỉ được upload file bé hơn 20MB";
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $image = $_FILES['file']['name'];
            }
        }
    }

    // Tiến hành cập nhật sản phẩm
    $kq = product_checkName($name);
    if ($kq) {
        $_SESSION['loi'] = 'Đã có tên sản phẩm này <strong>' . $name . '</strong>';
    } else {
        product_edit($idProduct, $name, $id_category, $description, $price, $img, $qty);
        $_SESSION['thongbao'] = 'Đã Chỉnh sửa thành công <strong>' . $name . '</strong>';
    }

    // Tải lại trang cập nhật sản phẩm
    header("Location: ?mod=admin&act=products-detail&id=$idProduct");
    exit;
}

?>
<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
        <form action="?mod=admin&act=products-search" method="post" style="width: 100%;display:flex; justify-content: center;">
    <div class="search-box">
            <input type="submit" value=""><i class="far fa-search"></i>
            <input name="keyword" value="" type="text" placeholder="Search here...">
          </div>
    </form> 
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
                                    <img class="notifiAdminImg" src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
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
                                    <p class="notifiAdminText body-small"><strong><?php echo $getUser['fullname'] ?></strong><span> vừa mua
                                            một mô hình với mã đơn hàng <strong><?php echo $item['id'] ?></strong></span></p>
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
                <img style="" class="btnShowFeature" src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
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
                        <h2>Chi tiết sản phẩm</h2>
                    </div>
                    <div class="col-12">
                        <span class="label-large">Admin /</span><a href="#" class="label-large" style="text-decoration: none;">Sản Phẩm</a>
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

            <?php if( isset($productdetail) && !empty($productdetail)):?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div class="left-order-add-create">
                            <h2>Tên Sản Phẩm</h2>
                            <input class="" type="text" name="name" value="<?= $productdetail['name'] ?>" placeholder="<?= $productdetail['name'] ?>" aria-label="default input example">
                        </div>
                        <div class="describe-order_detail">
                            <h2>Mô Tả</h2>
                            <textarea name="description" id="tiny" cols="30" rows="10" placeholder="<?= $productdetail['description'] ?>"><?= $productdetail['description'] ?></textarea>
                        </div>
                        <div class="Dropdowns_categogy">
                            <h2>Danh mục</h2>
                            <div class="custom-select">
                                <!-- Dropdown -->
                                <select id="dropdown" onchange="updateInput()" name="id_category">
                                    <<?php foreach ($getAllCategory as $item) : ?> <option value="<?= $item['id'] ?>" <?= ($productdetail['id_category'] == $item['id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="margin-bottom: 30px;">
                                <h2>Sản phẩm còn lại</h2>
                                <input style="" class="" name="qty" type="text" value="<?= $productdetail['qty'] ?>" placeholder="1000" aria-label="default input example">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h2>Giá</h2>
                                <input class="" name="price" value="<?= $productdetail['price'] ?>" type="text" placeholder="<?= number_format($productdetail['price']) ?> VNĐ" aria-label="default input example">
                            </div>
                            <div class="col-6">
                                <h2>Giá khuyến mãi</h2>
                                <input class="" type="text" placeholder="1.000.000" aria-label="default input example">
                            </div>
                        </div>
                        <div class="row">
                            <div class="rol-6 mt-3">
                                <input style="background-color:#6750a4;color: #fff ;padding: 10px 15px; font-size: 14px; font-weight: 500;" class="btn btn-primary" type="submit" name="submit" value="Sửa Sản Phẩm">
                            </div>
                        </div>
                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <img id="previewImage" src="./public/assets/media/images/product/<?= $productdetail['img'] ?>">
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
                                    <form action="">
                                        
                                        <button type="button" style="background-color:#6750a4; color:#fff;" class="btn p12">Cập nhật</button>
                                    </form>
                                        <button type="button" id="deleteButtonAll p12" class="btn btn-danger">Xóa</button>
                                        <button type="button" class="btn box-shadow1 p12">Hủy</button>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <span class="flex"></span>
                        </div>
                    </div>
                </div>
            </form>
            <?php else:?>
            <h1 class="flex-center">Sản phẩm này chưa tồn tại</h1>
            <?php endif;?>
        </div>

    </div>

    <!----======== End Body DashBoard ======== -->

</section>
<script>
    // const dropArea = document.getElementById('drop-area');
    // const fileInput = document.getElementById('fileInput');
    // const demoDiv = document.getElementById('demo');
    // var count = 0;
    // var idValue = '';
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
        selector: 'textarea', // change this value according to your HTML
        menubar: 'file edit view'
    });
   

    // ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    //     dropArea.addEventListener(eventName, preventDefaults, false);
    //     document.body.addEventListener(eventName, preventDefaults, false);
    // });

    // ['dragenter', 'dragover'].forEach(eventName => {
    //     dropArea.addEventListener(eventName, highlight, false);

    // });

    // ['dragleave', 'drop'].forEach(eventName => {
    //     dropArea.addEventListener(eventName, unhighlight, false);
    // });

    // dropArea.addEventListener('drop', handleDrop, false);
    // fileInput.addEventListener('change', handleFiles, false);

    // function preventDefaults(e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    // }

    // function highlight() {
    //     dropArea.classList.add('highlight');

    // }

    // function unhighlight() {
    //     dropArea.classList.remove('highlight');
    // }

    // function handleDrop(e) {
    //     const dt = e.dataTransfer;
    //     const files = dt.files;
    //     handleFiles(files);
    // }

    // function handleFiles(files) {
    //     files = [...files];
    //     files.forEach(uploadFile);
    // }

    // function createImageContainer() {
    //     count++;
    //     const newChuahinhDiv = document.createElement('div');
    //     newChuahinhDiv.className = 'chuahinh';
    //     const tenchuahinh1 = 'chuahinh'
    //     const tenchuahinh2 = tenchuahinh1.concat("", count);
    //     newChuahinhDiv.id = tenchuahinh2;

    //     const newImageContainer = document.createElement('div');
    //     newImageContainer.id = 'image-container';

    //     newChuahinhDiv.appendChild(newImageContainer);
    //     demoDiv.appendChild(newChuahinhDiv);

    // }

    // function uploadFile(file) {
    //     createImageContainer(); // Tạo phần tử <div> chứa ảnh

    //     const url = URL.createObjectURL(file);
    //     const img = new Image();
    //     img.src = url;

    //     const newChuahinhDiv = document.querySelector('.chuahinh:last-child'); // Chọn phần tử "chuahinh" cuối cùng

    //     // Tạo các phần tử div bên trong "chuahinh" và cấu trúc HTML tương ứng
    //     const div1 = document.createElement('div');
    //     const div2 = document.createElement('div');
    //     div2.className = 'nameimg';
    //     const div3 = document.createElement('div');

    //     const h3 = document.createElement('h3');
    //     h3.textContent = 'ảnh ở đây nè';

    //     const thanhnangluong = document.createElement('div');
    //     thanhnangluong.className = 'flex thanhnangluong';
    //     const loithanhnangluong = document.createElement('span');
    //     // loithanhnangluong.classList = '':  
    //     thanhnangluong.appendChild(loithanhnangluong);

    //     loithanhnangluong.classList = 'flex ';

    //     // const deleteButton = document.createElement('i');
    //     // deleteButton.classList = 'fa-regular fa-circle-xmark';
    //     // const tenxoahinh1 = 'deleteButtonSingle'
    //     // const tenxoahinh2 = tenxoahinh1.concat("", count);
    //     // deleteButton.id = tenxoahinh2;

    //     // Tạo một nút xóa riêng lẻ cho phần tử này
    //     const deleteButton = document.createElement('i');
    //     deleteButton.classList = 'fa-regular fa-circle-xmark';
    //     const tenxoahinh1 = 'deleteButtonSingle'
    //     const tenxoahinh2 = tenxoahinh1.concat("", count);
    //     deleteButton.id = tenxoahinh2;

    //     // Gắn sự kiện xóa cho nút xóa này
    //     deleteButton.addEventListener('click', function() {
    //         newChuahinhDiv.remove();
    //         console.log(countdetele);
    //     });

    //     // Thêm nút xóa vào phần tử newChuahinhDiv
    //     newChuahinhDiv.appendChild(deleteButton);

    //     div1.appendChild(img);
    //     div2.appendChild(h3);
    //     div2.appendChild(thanhnangluong);
    //     div3.appendChild(deleteButton);

    //     newChuahinhDiv.appendChild(div1);
    //     newChuahinhDiv.appendChild(div2);
    //     newChuahinhDiv.appendChild(div3);

    //     document.getElementById('deleteButtonImg').style.display = 'flex';
    // }

    // function removeAllImageContainers() {
    //     const deleteButtonAll = document.getElementById('deleteButtonAll');
    //     deleteButtonAll.addEventListener('click', function() {
    //         const imageContainers = document.querySelectorAll('.chuahinh');
    //         imageContainers.forEach(function(container) {
    //             container.remove();
    //         });
    //         // Sau khi xóa tất cả phần tử, bạn có thể ẩn nút xóa (nếu cần)
    //         const deleteButtonImg = document.getElementById('deleteButtonImg');
    //         deleteButtonImg.style.display = 'none';
    //     });
    // }
    // removeAllImageContainers();
</script>