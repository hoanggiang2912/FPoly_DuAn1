<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <i class="far fa-search"></i>
            <input type="text" placeholder="Search here...">
        </div>
        <div class="info-user">
            <i class="far fa-comment-alt"></i>
            <i class="fal fa-bell"></i>
            <img src="/public/assets/media/images/users/user-1.svg" alt="">
        </div>
    </div>
    <div class="flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
        <div class="text">
            <h1 class="label-large-prominent" style="font-size: 24px;
            line-height: 32px;">Đơn Hàng</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
          align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="#" class="label-large"
                    style="text-decoration: none;">Đơn Hàng</a>
            </div>
            <div class="flex-center g8">
            </div>
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin">

        <div class="flex-column width-full">
        <div class="content-filter dropdown-center width-full d-flex align-items-center justify-content-between">
          <button id="btn_addMore_admin" type="button" style="width:130px;height:45px;background-color:#6750a4;border-radius:10px"><a style="color: white; font-size: 12px; text-decoration: none; padding: 10px 5px;" href="">Thêm Đơn Hàng</a></button>
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
                    <li><a href="?mod=admin&act=orders&filter=old">Mới Nhất</a></li>
                    <li><a href="?mod=admin&act=orders&filter">Cũ Nhất</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=1">Đang Chờ</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=2">Đang Giao</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=3">Đã Hủy</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=4">Đã Giao</a></li>  
                    <li><a href="">Đơn (1 Triệu >)</a></li>  
                </ul>
            </div>
        </div>
        <table class="content-table width-full">
            <thead>
                <tr>
                    <th style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;">
                        </input>
                    </th>
                    <th>Order ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Tổng giá</th>
                    <th>Khác</th>
                </tr>
            </thead>
            <tbody>
                <!-- Thêm các hàng dữ liệu vào đây -->
                <!-- <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #00B3FF;">Đã Giao Hàng</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr>
          <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #00C58A;">Đang Chờ</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr>
          <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #B3261E;">Đã Hủy</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr> -->
                <?php foreach ($get_Order as $value):?>
                <?php
            
            //number_format
            $formatted_number = number_format($value['total'], 0, ',', '.');
            $status_order = '';
                if($value['status'] == 0){
                  $status_order = '<td style="color:#00C58A;">Đang Chờ</td>';
                }
                elseif($value['status'] == 1){
                  $status_order = '<td style="color:#707070;">Chờ Lấy Hàng</td>';
                }
                elseif($value['status'] == 2){
                  $status_order = '<td style="color:#FF9900;">Đang Giao</td>';
                }
                elseif($value['status'] == 3){
                  $status_order = '<td style="color:#B3261E;">Đã Hủy</td>';
                }
                else{
                  $status_order = '<td style="color:#00B3FF;">Đã Giao</td>';
                }
              ?>
              <?php
              $bill_cancel = '';
                if($value['status'] == 3)
                $bill_cancel = 'style = "background-color: rgba(128, 128, 128, 0.233);"';
                elseif($value['status'] == 4)
                $bill_cancel = 'style = "background-color:rgba(34,187,51, 0.3);"';
              ?>
                <tr <?=$bill_cancel?>>
                    <td style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;">
                        </input>
                    </td>
                    <td>
                        <?=$value['id']?>
                    </td>
                    <td>
                        <?=$value['order_user']?>
                    </td>
                    <td>
                      <!-- lỗi đầy buồi -->
                    <?=$value['name_Payment']?>   
                    </td>
                    <td>
                        <?=$value['create_date']?>
                    </td>
                    <?=$status_order?>
                    <td>
                        <?=$formatted_number?> đ
                    </td>
                    <td><a href="?mod=admin&act=orders&id=<?=$value['id']?>">Xem chi tiết</a></td>
                </tr>
                <?php endforeach;?>
                <?php if(@$_GET['id']):
                  $get_Order_One = get_One_Order_bill($_GET['id'])?>
                <div style=" 
                font-size: 16px;
                display:block;
                position: fixed; /* Stay in place */
                z-index: 99; /* Sit on top */
                padding-top: 15px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" id="myModal" class="modal">
                    <!-- Modal content -->
                    <div style=" background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 50%;" class="modal-content">
                        <a href="?mod=admin&act=orders" style="width:100%;"><span style="float: inline-end;font-size:20px; cursor: pointer;"
                                class="close">&times;</span></a>
                        <form action="?mod=admin&act=orders&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
                          <div class="row d-flex">
                            <div class="col-6" style="overflow: auto; height:600px;">
                              <h1 style="margin-bottom: 20px;">Người Đặt</h1>
                              <div style="margin-bottom: 20px;">
                                <hr>
                                  <h4>Tên Người Mua</h4>
                                  <p><?=$get_Order_One['order_user']?></p>
                                </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Địa Chỉ Người Mua</h4>
                                <p><?=$get_Order_One['address_user']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Email</h4>
                                <p><?=$get_Order_One['email_user']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Số Điện Thoại</h4>
                                <p><?=$get_Order_One['phone_user']?></p>
                                <hr>
                              </div>
                              <h1 style="margin-bottom: 20px;">Người Nhận</h1>
                              <div style="margin-bottom: 20px;">
                                  <h4>Tên Người Nhận</h4>
                                  <p><?=$get_Order_One['name_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Địa Người Nhận</h4>
                                <p><?=$get_Order_One['address_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Email</h4>
                                <p><?=$get_Order_One['email_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Số Điện Thoại</h4>
                                <p><?=$get_Order_One['phone_recipient']?></p>
                              </div>
                            </div>
                            <div class="col-6"> 
                            <h1 style="margin-bottom: 20px;">Đơn Hàng</h1>
                            <div class="row d-flex">
                              <hr>
                              <div style="margin-bottom: 20px;">
                                <h4>Tên Đơn Hàng - Danh Mục:</h4>
                                <?php foreach ($get_Cart_bill as $value):?>
                                  
                                  <div class="d-flex">
                                    <p><?=$value['product_name']?></p> -
                                    <p><?=$value['category_name']?></p>
                                  </div>
                                <?php endforeach;?>
                              </div>
                              
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Cách Thức Giao Hàng:</h4>
                                <p><?=$shippingName?></p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Áp Dụng Mã Giảm Giá:</h4>
                                <p>MOMO</p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Phương thức thanh toán:</h4>
                                <p> <?=$get_Order_One['name_Payment']?></p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Ngày Đặt Hàng: </h4>
                                <p><?=$get_Order_One['create_date']?></p>
                              </div>
                              <div>
                                <h4>Địa Chỉ Nhận hàng Hàng:</h4>
                                <p><?=$get_Order_One['address_recipient']?></p>
                                <hr>
                              </div>
                              <div  class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Tổng Đơn Hàng: </h4>
                                <?php
                                  $formatted_number_id = number_format($get_Order_One['total'], 0, ',', '.');
                                ?>
                                <p><?=$formatted_number_id?>đ</p>
                              </div>
                              <div class="custom-select">
                                <hr>
                              <h4>Trạng Thái Đơn Hàng:(Hiện tại)</h4>
                                    <!-- Dropdown -->
                                    <select id="id_category" name="change_status">
                                          <?php 
                                          if($get_Order_One['status'] == 1) {
                                            echo '
                                            <option style="display:none;" value="1">Chờ Lấy Hàng</option>
                                            <option value="2">Đang Giao</option>
                                            <option value="3">Hủy Đơn</option>
                                            <option value="4">Đã Giao</option>
                                            <option value="0">Đang Chờ</option>
                                            ';
                                          }
                                          elseif($get_Order_One['status'] == 2) {
                                            echo '
                                            <option style="display:none;" value="2">Đang Giao</option>
                                            <option value="3">Hủy Đơn</option>
                                            <option value="4">Đã Giao</option>
                                            <option value="1">Chờ Lấy Hàng</option>
                                            <option value="0">Đang Chờ</option>
                                            ';
                                          }
                                          elseif($get_Order_One['status'] == 3) {
                                            echo '
                                            <option style="display:none;" value="3">Hủy Đơn</option>
                                            <option value="4">Đã Giao</option>
                                            <option value="2">Đang Giao</option>
                                            <option value="1">Chờ Lấy Hàng</option>
                                            <option value="0">Đang Chờ</option>
                                            ';
                                          }
                                          elseif($get_Order_One['status'] == 4) {
                                            echo '
                                            <option style="display:none;" value="4">Đã Giao</option>
                                            <option value="3">Hủy Đơn</option>
                                            <option value="2">Đang Giao</option>
                                            <option value="1">Chờ Lấy Hàng</option>
                                            <option value="0">Đang Chờ</option>
                                            ';
                                          }
                                          else{
                                            echo '
                                            <option style="display:none;" value="0">Đang Chờ</option>
                                            <option value="4">Đã Giao</option>
                                            <option value="3">Hủy Đơn</option>
                                            <option value="2">Đang Giao</option>
                                            <option value="1">Chờ Lấy Hàng</option>
                                            ';
                                          }
                                          ?>
                                    </select>
                            </div>
                          </div>
                            <button type="submit" name="submit" class="btn btn-primary float-end">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <?php endif;?>

            </tbody>
        </table>

    </div>
    </div>

    <!----======== End Body DashBoard ======== -->

</section>