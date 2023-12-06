<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <form style="width: 100%;display:flex; justify-content: center;" action="" method="post">
                <i class="far fa-search"></i>
                <input type="text" placeholder="Tìm kiếm...">
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
                    foreach($getCmt as $item) {

                        $getUser = getUserById($item['id_user']);
                        $getProduct = getProductById($item['id_product']);
                        ?>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <?php
                                    if($getUser[0]['img'] == NULL || empty($getUser[0]['img'])) {
                                        ?>
                                <img class="notifiAdminImg" src="./upload/users/avatar-none.png" alt="">

                                <?php
                                    } else {
                                        ?>
                                <img class="notifiAdminImg" src="./upload/users/<?php echo $getUser[0]['img'] ?>"
                                    alt="">
                                <?php
                                    }
                                    ?>
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>
                                        <?php echo $getUser[0]['fullname'] ?>
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
                    foreach($getBill as $item) {

                        $getUser = getUserById($item['id_user']);
                        ?>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <?php
                                    if($getUser[0]['img'] == NULL || empty($getUser[0]['img'])) {
                                        ?>
                                <img class="notifiAdminImg" src="./upload/users/avatar-none.png" alt="">

                                <?php
                                    } else {
                                        ?>
                                <img class="notifiAdminImg" src="./upload/users/<?php echo $getUser[0]['img'] ?>"
                                    alt="">

                                <?php
                                    }
                                    ?>
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>
                                        <?php
                                            if($getUser[0]['fullname'] == NULL && empty($getUser[0]['fullname'])) {
                                                echo "User ẩn";

                                            } else {
                                                echo $getUser[0]['fullname'];

                                            }
                                            ?>
                                    </strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong>
                                            <?php echo $item['id'] ?>
                                        </strong></span></p>
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
                if(!empty($getUser['img']) && $getUser != NULL) {
                    ?>
                <img class="btnShowFeature" src="./upload/users/<?php echo $getUser['img'] ?>" alt="">
                <?php
                } else {
                    ?>
                <img class="btnShowFeature" src="./upload/users/avatar-none.png" alt="">
                <?php
                }
                ?>
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="?mod=user&act=logOut-account">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="detail flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
        <div class="text">
            <h1 class="label-large-prominent" style="font-size: 24px;
              line-height: 32px;">Sản Phẩm</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="?mod=admin&act=products&page=1" class="label-large"
                    style="text-decoration: none;">Sản Phẩm</a>
            </div>
        </div>

    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin">
        <div class="width-full mb-3">
            <div class="content-filter dropdown-center width-full d-flex align-items-center justify-content-between">
                <button id="btn_addMore_admin" type="button"
                    style="width:130px;height:45px;background-color:#6750a4;border-radius:10px"><a
                        style="color: white; font-size: 14px; font-weight: 500; text-decoration: none; padding: 10px 5px;"
                        href="?mod=admin&act=products-add">Thêm Sản Phẩm</a></button>
                <button id="filter" class="flex-center g8" style="padding: 10px 16px;
                    border: 1px solid #79747E; border-radius: 100px;
                    margin-left: auto;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z"
                            fill="#6750A4" />
                        <span class="label-medium fw-smb" style="color: #6750a4;">Lọc</span>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach($getAllCategory as $item): ?>
                    <li><a href="?mod=admin&act=products-category-fil&id=<?= $item['id'] ?>">
                            <?= $item['name'] ?>
                        </a></li>
                    <?php endforeach; ?>
                </ul>

            </div>
            <?php if(isset($_SESSION['thongbao'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['thongbao'] ?>
            </div>
            <?php endif;
            unset($_SESSION['thongbao']) ?>

        </div>
        <div class="container-products width-full flex" style="flex-wrap: wrap; gap: 45px">
            <!--Cart-->


            <?php foreach($getproductAdmin as $item): ?>
            <div class="cart trans-bounce flex-column p20" style="
                  border-radius: 12px;
                  border: 1px #DED8E1;
                  background:  #FFF;   
                  width: calc(100% / 3 - 30px);
                  ">
                <div class="v-nav" style="gap: 22px; flex: 1;">
                    <div class="h-nav g12" style="justify-content: space-between;">
                        <div class="img-cart flex" style="width: 120px; flex-shrink: 1;">
                            <img src="./public/assets/media/images/product/<?= $item['img'] ?>"
                                style="max-width: 100%; height: 100px;object-fit: contain; border-radius: 8px; flex-shrink: 0;"
                                alt="">
                        </div>
                        <div class="text-info-cart flex-column" style="flex:1;gap: 12px;">
                            <h1 class="title-medium" style="
                           word-break: break-all;display:-webkit-box;
                          -webkit-line-clamp:3;
                          -webkit-box-orient: vertical;
                          overflow: hidden;
                          text-overflow: ellipsis;
                          word-break: break-word;">
                                <?= $item['name'] ?>
                            </h1>

                            <p class="body-medium">Danh Mục:
                                <?= $item['category_name'] ?>
                            </p>
                            <span class="title-medium">
                                <?= number_format($item['price']) ?> VNĐ
                            </span>

                        </div>
                        <div class="options">
                            <div class="flex-center dropdown" style="border-radius: 12px;background: #ECE6F0;">
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false" href=""><i
                                        class="fa-solid fa-ellipsis" style="padding: 8px; color: #6750a4;"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item label-large"
                                            href="?mod=admin&act=products-detail&id=<?= $item['id'] ?>">Xem Chi Tiết</a>
                                    </li>
                                    <li><a href="?mod=admin&act=products-delete&page=<?= $page ?>&id=<?= $item['id'] ?>"
                                            class="dropdown-item label-large" style="cursor: pointer;"
                                            onclick="deleteProduct(<?= $item['id'] ?>)">Xóa</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="description flex-column g2" style="flex: 1;">
                        <div class="flex-column" style=" margin-top: auto;">
                            <h1 class="title-medium">Tóm Tắt</h1>
                            <p class="body-small" style="word-break: break-all;display:-webkit-box;
                        -webkit-line-clamp:3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        word-break: break-word;">
                                <?= $item['description'] ?>
                            </p>
                        </div>
                    </div>
                    <!--INFO sales Qty -->
                    <div class="info-sales-qty flex-column"
                        style="padding: 14px; gap: 10px; border-radius: 4px; background: rgba(73, 69, 79, 0.08);">
                        <div class="flex-between">
                            <div class="Sales">
                                <span class="title-medium">Đã Bán</span>
                            </div>
                            <div class="index flex-center" style="gap: 4px;">
                                <i class="fa-solid fa-arrow-up" style="color: #00C58A;"></i>
                                <span class="fw-smb label-large-prominent" style="color: #00C58A;">
                                    <?= $item['purchases'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex-between">
                            <div class="Qty">
                                <span class="title-medium">Sản Phẩm Còn Lại</span>
                            </div>
                            <div class="index flex-center" style="gap: 4px;">
                                <div class="flex"
                                    style="width: 36px; height: 4px; background: black;border: none; border-radius: 8px;padding-right: 0px;">
                                    <span class="flex" style="width: 70%; background: #00C58A; border-radius: 8px; flex-shrink: 0;
                              align-self: stretch;"></span>

                                </div>
                                <span class="fw-smb label-large-prominent" style="color: #00C58A;">
                                    <?= $item['qty'] ?>
                                </span>
                            </div>
                        </div>

                    </div>
                    <!--INFO sales Qty - END -->
                    <!--Cart-END-->
                </div>
            </div>
            <?php endforeach; ?>


        </div>
        <?php if($page > $soTrang || $page < 1): ?>
        <h1 class='flex-center flex-full mt-5'>Trang này không tồn tại</h1>
        <?php elseif($totalProducts > 0 && $soTrang > 1): ?>
        <ul id="paging" class="pagination flex py-5 mt30 mb-0">
            <?php if($page > 1): ?>
            <li class="pagination__item">
                <a href="?mod=admin&act=products&page=<?= $page - 1 ?>" class="btn body-small pagination__link"><i
                        class="fal fa-arrow-left" style="margin-right: .6rem"></i>Previous</a>
            </li>
            <?php endif; ?>

            <?php for($i = $startPage; $i <= $endPage; $i++): ?>
            <li class="pagination__item <?= ($page == $i) ? 'active' : '' ?>">
                <a href="?mod=admin&act=products&page=<?= $i ?>" class="btn body-small pagination__link">
                    <?= $i ?>
                </a>
            </li>
            <?php endfor; ?>

            <?php if($page < $soTrang): ?>
            <li class="pagination__item">
                <a href="?mod=admin&act=products&page=<?= $page + 1 ?>" class="btn body-small pagination__link">Next<i
                        class="fal fa-arrow-right" style="margin-left: .6rem"></i></a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>






        <!----======== End Body DashBoard ======== -->

</section>
<script src="/public/assets/resources/js/pagination.js"></script>
<script>
function deleteProduct(id) {
    var kq = confirm("Bạn chắc là có muốn xóa sản phẩm này không ?");
    if (kq) {
        window.location = '?mod=admin&act=products-delete&id=' + id; // Sửa thành 'id=' thay vì '='
    }
}
</script>