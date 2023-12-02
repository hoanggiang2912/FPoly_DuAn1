<?php

    if (isset($_SESSION['idBill'])) {
        $idBill = $_SESSION['idBill'];

        /** get bill information */
        $billInfo = getBillInfoById($idBill);
        extract($billInfo);
        print_r($billInfo);

        
        $user = getUserById($id_user);
        $username = $user['username'];
        
        if (empty($name_recipient)) {
            $name_recipient = $username;
        } else if (empty($email_recipient)) {
            $email_recipient = $email_user;
        } else if (empty($address_recipient)) {
            $address_recipient = $address_user;
        } else if (empty($address_detail_recipient)) {
            $address_detail_recipient = $address_detail_user;
        } else if (empty($phone_recipient)) {
            $phone_recipient = $phone_user;
        }

        $cart = getCartByIdBill($idBill);

        $paymentMethodName = getPaymentMethodById($id_payment)['name'];

        $shipping = getShippingMethodByPrice($id_shipping);
        print_r($shipping);
        // $shippingMethodName = getShippingMethodById($id_shipping)['name'];
        // $shippingMethodDesc = getShippingMethodById($id_shipping)['description'];
        // $shippingMethodPrice = formatVND(getShippingMethodById($id_shipping)['price']);
    } else {
        header("Location: ?mod=cart&act=viewCart");
    }

    /** render summary product and calculate */
    $summaryProductHtml = '';
    foreach ($cart as $item) {
        extract($item);
        $formatedPrice = formatVND($price);
        
        $imgPath = constant('PRODUCT_PATH') . $img;

        $categoryName = getCategoryById(getIdCategoryByIdProducts($id_product))['name'];
        
        $summaryProductHtml .=
            <<<HTML
                <div class="listProductCart_item flex">
                    <div class="col-6 width-full">
                        <div class="col-12 width-full flex">
                            <div class="col-4 width-full">
                                <img src="$imgPath" alt="">
                            </div>
                            <div class="col-8 width-full row">
                                <div class="col-12 width-full cart-item-name">$name</div>
                                <div class="col-12 width-full flex a-end">Danh mục: <span>$categoryName</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 width-full row j-end">
                        <div class="col-12 width-full flex j-end">$formatedPrice</div>
                        <div class="col-12 width-full flex j-end a-end">X $qty</div>
                    </div>
                </div>
            HTML;
    }
?>


<!-- Body Start -->
<main class="mt80 section">
    <!-- Confirm HEADING Text Start -->

    <div class="confirmHeadingText mb60">
        <div class="col-12 flex width-full d-sm-block d-md-block d-sm-block row-lg">
            <div class="col-6 col-lg-12 col-md-12 width-full confirmHeadingText_left">
                <div class="col-12 width-full mb6">
                    <h2 class="title-medium">Chúc Mừng</h2>
                </div>
                <div class="col-12 width-full">
                    <div class="lineMiniConfirm mb12"></div>
                </div>
                <div class="col-12 width-full mt6">
                    <h1 class="display-medium fw-black">ĐẶT HÀNG THÀNH CÔNG</h1>
                </div>
            </div>
            <div
                class="col-6 col-lg-12 col-md-12 width-full confirmHeadingText_right flex a-end mt-sm-12 mt-md-12 mt-lg-12">
                <P class="body-medium">
                    Email xác nhận đơn hàng đã được gửi về <?= $email_user ?>, vui lòng kiểm tra và bấm vào XÁC NHẬN để
                    hoàn tất đặt hàng
                </P>
            </div>
        </div>
    </div>

    <!-- End Confirm HEADING Text -->

    <div class="detailOrders">
        <div class="col-12 width-full detailerOrders_top mb30">
            <h2 class="title-medium mb12">Chi Tiết Đơn Hàng</h2>
            <div class="lineMiniConfirm"></div>
        </div>
        <div class="col-12 width-full d-block d-sm-block d-md-block flex detailerOrders_bottom mt30 row-lg">
            <div class="col-xxl-6 col-sm-12 col-md-12 col-lg-12 detailOrders-left width-full"
                style="padding: 30px 30px 30px 0;">
                <div class="col-12 width-full flex mb20 recipientOrderUser">
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Người Nhận</h3>
                            <h2 class="title-large"><?= $name_recipient ?></h2>
                            <h4 class="body-medium">SĐT: <span> <?= $phone_recipient ?></span></h4>
                            <h4 class="body-medium">Email: <span><?= $email_recipient ?></span></h4>
                            <h4 class="body-medium">Địa Chỉ: <span><?= $address_recipient ?></span></h4>
                            <h4 class="body-medium">Địa Chỉ Cụ Thể: <span><?= $address_detail_recipient ?></span></h4>
                        </div>
                    </div>
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Người Đặt</h3>
                            <h2 class="title-large"><?= $username ?></h2>
                            <h4 class="body-medium">SĐT: <span> <?= $phone_user ?></span></h4>
                            <h4 class="body-medium">Email: <span><?= $email_user ?></span></h4>
                            <h4 class="body-medium">Địa Chỉ: <span><?= $address_user ?></span></h4>
                            <h4 class="body-medium">Địa Chỉ Cụ Thể: <span><?= $address_detail_user ?></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 width-full flex mb20 shippingMethodUser">
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Phương thức thanh toán</h3>
                            <h4 class="body-medium"><?= $paymentMethodName ?></h4>
                        </div>
                    </div>
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Phương thức vận chuyển</h3>
                            <h4 class="body-medium"><?= $shippingMethodName ?> <?= $shippingMethodDesc ?></h4>
                            <h4 class="body-medium"><?= $shippingMethodPrice ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 width-full flex mb20 itendTimeShipUser">
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Thời gian đặt hàng</h3>
                            <h4 class="body-medium">Ngày: <span>26 / 10 / 2023</span></h4>
                            <h4 class="body-medium">Giờ: <span>15 : 29 : 30</span></h4>
                        </div>
                    </div>
                    <div class="col-6 width-full">
                        <div class="detailOrder_items">
                            <h3 class="title-medium">Thời gian giao hàng dự kiến</h3>
                            <h4 class="body-medium">Ngày: <span>30 / 10 / 2023</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-sm-12 col-md-12 col-lg-12 detailOrders-right width-full" style="padding: 30px;">
                <h2 class="title-medium mb20">Sản Phẩm</h2>
                <div class="listProductCart">
                    <?= $summaryProductHtml ?>
                </div>
                <div class="totalInfoCartConfirm">
                    <div class="col-12 totalAmountConfirm flex width-full a-center">
                        <div class="col-4 col-lg-4">
                            <p class="body-large">Tổng Tiền</p>
                        </div>
                        <div class="col-6 col-lg-4 lineAmmoutConfirm width-full"></div>
                        <div class="col-2 col-lg-4 totalAmount headline-small flex j-end">9.999.999 VNĐ</div>
                    </div>
                    <div class="col-12 width-full">
                        <p class="label-medium">Đơn hàng sẽ được giao đến tay bạn trong thời gian sớm nhất. Trong lúc
                            chờ đợi, bạn có thể khám phá thêm những sản phẩm hấp dẫn khác từ LEGOUS</p>
                    </div>
                    <div class="col-12 width-full buttonNextOrders mt12">
                        <a href="?mod=page&act=home" class="nextOrders width-full tac" style="display: block">
                            <i class="fal fa-arrow-right"></i> Tiếp Tục Mua Sắm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End Body -->