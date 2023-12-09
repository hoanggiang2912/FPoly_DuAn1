<?php
    session_start();
    ob_start();

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // //required files
    // require './phpmailer/src/Exception.php';
    // require './phpmailer/src/PHPMailer.php';
    // require './phpmailer/src/SMTP.php';

    // function createMail () {
    //     $mail = new PHPMailer(true);

    //     //Server settings
    //     $mail->isSMTP();                              //Send using SMTP
    //     $mail->Host = 'smtp.gmail.com';       //Set the SMTP server to send through
    //     $mail->SMTPAuth = true;             //Enable SMTP authentication
    //     $mail->Username = 'hohoanggiang@gmail.com';   //SMTP write your email
    //     $mail->Password = 'qkceernidfsjnscl';      //SMTP password
    //     $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    //     $mail->Port = 465;

    //     //Recipients
    //     $mail->setFrom($_POST["email"], $_POST["name"]); // Sender Email and name
    //     $mail->addAddress('example@gmail.com');     //Add a recipient email  
    //     $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //     //Content
    //     $mail->isHTML(true);               //Set email format to HTML
    //     $mail->Subject = $_POST["subject"];   // email subject headings
    //     $mail->Body =
    //         <<<HTML

    //         HTML; //email message

    //     // Success sent message alert
    //     $mail->send();
    //     echo
    //         " 
    //         <script> 
    //         alert('Message was sent successfully!');
    //         document.location.href = 'index.php';
    //         </script>
    //     ";
    // }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        /** bill infomation */
        $address_user = $_POST['address'];
        $address_detail_user = $_POST['address-detail'];
        $email_user = $_POST['email'];
        $phone_user = $_POST['phone'];
        $id_shipping = $_POST['shipping'];
        $id_payment = $_POST['payment'];
        $address_recipient = $_POST['recipient-address'] || $address_user;
        $address_detail_recipient = $_POST['recipient-address-detail'] || $address_detail_user;
        $name_recipient = $_POST['recipient-name'] || '';
        $phone_recipient = $_POST['recipient-phone'] || $phone_user;

        $total = 0;

        if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin']) && is_array($_SESSION['userLogin'])) {
            /** lây id user insert vào bill, trả lại Id bill */
            extract($_SESSION['userLogin']);
            $userCart = $_SESSION['cart'][$id_user]['cart'];
            $total = totalBill($userCart);

            if (empty($name_recipient)) {
                $name_recipient = getUserInfo($id_user)[0]['username'];
            }

            $idBill = insertBill($id_user, $id_shipping, $id_payment, $email_user, $phone_user, $address_user, $address_detail_user, $name_recipient, $phone_recipient, $address_recipient, $address_detail_recipient, $total, 1);
            $_SESSION['idBill'] = $idBill;
            
            /** update số lượng của sản phẩm */
            foreach ($userCart as $product) {
                extract($product);
                $totalCost = $price * $qty;
                /** update product quantity */
                $productQty = getProductQtyById($id_product);
                $newQty = $productQty - $qty;
                updateProductQty($id_product, $newQty);
                /** update product purchases */
                $purchases = rand(10, 100);
                updateProductPurchases($id_product, $purchases);
                insertCartWithIdBill($idBill, $id_user, $id_product, $name, $price, $img, $qty, $totalCost);
            }
            if (isset($_SESSION['cart'][$id_user])) {
                unset($_SESSION['cart'][$id_user]);
            }

            header("Location: ?mod=cart&act=confirm");
            exit();
        } else {
            /** tạo account cho khách hàng, generate ngẫu nhiên tên đăng nhập và mật khẩu, insert vào database */
            $randomUsername = generateRandomUsername(8);
            $randomPassword = generateRandomPassword(8);
            $id_user = insertUser($randomUsername, $email_user, $randomPassword);
            /** tạo đơn hàng -> trả về idBill */
            $cart = $_SESSION['cart']['guest'];
            $total = totalBill($cart);
            $idBill = insertBill($id_user, $id_shipping, $id_payment, $email_user, $phone_user, $address_user, $address_detail_user, $name_recipient, $phone_recipient, $address_recipient, $address_detail_recipient, $total, 1);
            $_SESSION['idBill'] = $idBill;

            /** lấy idBill insert sản phẩm trong giỏ hàng vào db */
            foreach ($cart as $product) {
                extract($product);
                $totalCost = $price * $qty;

                /** update product quantity */
                $productQty = getProductQtyById($id_product);
                $newQty = $productQty - $qty;
                updateProductQty($id_product, $newQty);

                /** update product purchases */
                $purchases = rand(10, 100);
                updateProductPurchases($id_product, $purchases);

                insertCartWithIdBill($idBill, $id_user, $id_product, $name, $price, $img, $qty, $totalCost);
            }
            unset($_SESSION['cart']['guest']);
            header("Location: ?mod=cart&act=confirm");
            exit();
        }
    }

function getProductQtyById($idProduct) {
    $sql = "SELECT qty FROM product WHERE id = $idProduct";
    return pdo_query_value($sql);   
}

function updateProductQty($idProduct, $newQty)
{
    $sql = "UPDATE product SET qty = $newQty WHERE id = $idProduct";
    pdo_execute($sql);
}
function updateProductPurchases($idProduct, $purchases)
{
    $sql = "UPDATE product SET purchases = $purchases WHERE id = $idProduct";
    pdo_execute($sql);
}
    
function getUserInfo($id)
{
    return pdo_query("SELECT * FROM user WHERE id = {$id}");
}

function insertCartWithIdBill($idBill, $idUser, $id_product, $name, $price, $img, $qty, $totalCost)
{
    $sql = "INSERT INTO 
                cart (id_bill, id_user, id_product, name, price, img, qty, total_cost) 
            VALUES 
                ('$idBill', '$idUser', '$id_product', '$name', '$price', '$img', '$qty', '$totalCost') ";
    pdo_execute($sql);
}

function insertUser($username, $email, $password)
{
    $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)"; // Use parameterized query
    $userId = pdo_execute($sql, $username, $email, $password);
    return $userId; // Return the last inserted ID
}
    
function generateRandomUsername($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $username = '';

    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $username .= $characters[rand(0, $charactersLength - 1)];
    }

    return $username;
}

function generateRandomPassword($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';

    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}
    
function getCartByUserId($idUser)
{
    $sql = "SELECT * FROM cart WHERE id_user = $idUser";
    return pdo_query($sql);
}

function totalBill($cart)
{
    $total = $subTotal = 0;

    foreach ($cart as $item) {
        extract($item);
        $subTotal += $price * $qty;
    }

    $tax = $subTotal * 0.1;

    $total = $subTotal + $tax;

    return $total;
}

function insertBill($id_user, $id_shipping, $id_payment, $email_user, $phone_user, $address_user, $address_detail_user, $name_recipient, $phone_recipient, $address_recipient, $address_detail_recipient, $total, $status)
{
    $sql = "INSERT INTO bill (id_user, id_shipping, id_payment, email_user, phone_user, address_user, address_detail_user, name_recipient, phone_recipient, address_recipient, address_detail_recipient  , total, status) 
                VALUES ('$id_user', '$id_shipping', '$id_payment', '$email_user', '$phone_user', '$address_user', '$address_detail_user', '$name_recipient', '$phone_recipient', '$address_recipient', '$address_detail_recipient', '$total', '1')";
    $billId = pdo_execute($sql);
    return $billId;
}

function updateIdBillInCart($id_user, $id_bill, $id_product)
{
    $sql = "UPDATE cart
            SET id_bill = $id_bill 
            WHERE id_user = $id_user
            AND id_product = $id_product";
    pdo_execute($sql);
}

function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=legous_db;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId(); // Return the last inserted ID
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */

//Đếm số lượng của product
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $amount số tiền
 * @return giá trị tiền đã format
 */

function formatVND($amount)
{
    $formattedAmount = number_format($amount, 0, ',', '.');
    $formattedAmount .= ' đ';

    return $formattedAmount;
}

function get_current_url()
{
    $current_url = 'http';
    // if ($_SERVER["HTTPS"] == "on") {
    //     $current_url .= "s";
    // }
    $current_url .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $current_url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $current_url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $current_url;
}

?>