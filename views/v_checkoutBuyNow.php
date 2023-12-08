<?php
/** render summary */
$summaryHtml = '';
$total = 0;
$totalFormated = 0;
$subTotal = 0;

extract($checkoutProduct);

$subTotal += $price * $qty;
$tax = $subTotal * 0.1;
$total = $subTotal + $tax;
$totalFormated = formatVND($subTotal + $tax);

$priceFormated = formatVND($price);
$summaryHtml =
    <<<HTML
        <!-- single summary product start -->
        <div class="summary__product flex v-center">
            <div class="title-medium fw-smb summary__product__name">$name</div>
            <span style="margin-left: .1rem; width: max-content">x $qty</span>
            <div class="light-devider flex-full" style="margin-inline: 1rem; height: .1rem;"></div>
            <div class="summary__product__price" style="width: max-content;">$priceFormated</div>
        </div>
        <!-- single summary product end -->
    HTML;

$disable = '';
$total < 2100000 ? $disable = 'disabled' : '';

/** render shipping methods */
$shippingMethods = getShippingMethods();
function renderShippingMethods($shippingMethods, $disable)
{
    $html = '';
    if (isset($shippingMethods) && is_array($shippingMethods)) {
        foreach ($shippingMethods as $shippingMethod) {
            extract($shippingMethod);
            $priceFormated = formatVND($price);

            // Check if the shipping method is free and disable it if the total is less than 2100000
            if ($price == 0 && $disable) {
                $html .= <<<HTML
                    <!-- single shipping method start -->
                    <label class="addon-method shipping-method pi20 pb12 flex-between box-shadow1 rounded-8 disabled">
                        <div class="flex g12">
                            <input type="radio" disabled>
                            <div class="shipping-method__info flex-column flex-between">
                                <div class="title-medium fw-smb">$name</div>
                                <div class="title-small">$description</div>
                            </div>
                        </div>
                        <span class="label-large fw-smb">$priceFormated</span>
                    </label>
                    <!-- single shipping method end -->
                HTML;
            } else {
                $html .= <<<HTML
                    <!-- single shipping method start -->
                    <label for="shipping-$id" class="addon-method shipping-method pi20 pb12 flex-between box-shadow1 rounded-8">
                        <div class="flex g12">
                            <input type="radio" required name="shipping" value="$price" id="shipping-$id">
                            <div class="shipping-method__info flex-column flex-between">
                                <div class="title-medium fw-smb">$name</div>
                                <div class="title-small">$description</div>
                            </div>
                        </div>
                        <span class="label-large fw-smb">$priceFormated</span>
                    </label>
                    <!-- single shipping method end -->
                HTML;
            }
        }
    }
    return $html;
}

/** render payment method */
$paymentMethods = getPaymentMethods();
function renderPaymentMethods($paymentMethods)
{
    $html = '';
    if (isset($paymentMethods) && is_array($paymentMethods)) {
        foreach ($paymentMethods as $paymentMethod) {
            extract($paymentMethod);
            $html .=
                <<<HTML
                    <!-- single payment method start -->
                    <label for="payment-$id" class="addon-method payment-method pi20 pb12 flex-between box-shadow1 rounded-8">
                        <div class="flex g12">
                            <input type="radio" required value="$id" id="payment-$id" name="payment">
                            <div class="payment-method__info flex-column flex-between">
                                <div class="title-medium fw-smb">$name</div>
                                <div class="title-small">$description</div>
                            </div>
                        </div>
                    </label>
                    <!-- single payment method end -->
                HTML;
        }
    }
    return $html;
}

/** render user address */
$addressView = $addressDetailView = $emailView = $phoneView = "";
if (isset($_SESSION['userLogin']) && is_array($_SESSION['userLogin'])) {
    /** get user information */
    $userLogin = $_SESSION['userLogin'];
    extract($userLogin);
    /** get user address */
    $userAddress = getDefaultAddressByIdUser($id_user);
    // print_r($userAddress);

    if (isset($userAddress) && is_array($userAddress) && !empty($userAddress)) {
        $addressView = $userAddress['address'];
        $addressDetailView = $userAddress['address_detail'];
        $emailView = $email;
        $phoneView = $userAddress['phone'];
    }
}
?>

<!-- cart top bar start -->
<div class="mobile-top__bar mobile-top__bar--shop p12 flex-center">
    <div class="mobile-top__inner flex-full flex-between v-center g12">
        <button class="icon-btn back-btn"><i class="fal fa-chevron-left"></i></button>
        <!-- <form action="#" class="form mobile__search-form flex-full">
            <div class="form__group width-full por">
                <button class="icon-btn poa" style="top: 50%; transform: translateY(-50%)">
                    <i class="fal fa-search"></i>
                </button>
                <input type="text" class="form__input rounded-100 width-full" style="padding-left: 4rem">
            </div>
        </form> -->
        <!-- <button class="icon-btn trash-btn"><i class="fal fa-trash-alt"></i></button> -->

        <!-- guest widget -->
        <!-- <button class="icon-btn user-btn"><i class="fal fa-user"></i></button> -->

        <!-- member widget -->
        <div class="por member-widget">
            <button class="icon-btn more-btn"><i class="far fa-ellipsis-h"></i></button>
            <ul class="poa option__list oh p10 box-shadow1 rounded-8">
                <li class="option__item">
                    <a href="#" class="option__link ttc">trang chủ</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">chia sẻ</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">tìm kiếm</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">tin nhắn</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">tài khoản của tôi</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">báo cáo</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">trợ giúp</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">phản hồi</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- cart top bar end -->

<script src="./public/assets/resources/js/validator.js"></script>
<script>
    function toggleRecipientForm() {
        const recipientCheckbox = document.getElementById('openRecipientForm');

        if (recipientCheckbox.checked) {
            // Checkbox is checked, send a request to retrieve and render the form
            const xhr = new XMLHttpRequest();
            xhr.open('GET', './views/libs/renderRecipientForm.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request was successful, render the form
                        const recipientFormContainer = document.getElementById('recipient__form');
                        recipientFormContainer.innerHTML = xhr.responseText;
                    } else {
                        // Request encountered an error
                        console.error('Request error:', xhr.status);
                    }
                }
            };
            xhr.send();
        } else {
            // Checkbox is unchecked, hide the form
            const recipientFormContainer = document.getElementById('recipient__form');
            recipientFormContainer.innerHTML = '';
        }
    }
</script>
<script>
    Validator({
        formSelector: '.checkout__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        submitUrl: './views/libs/checkoutBuyNowHandler.php',
        // redirectUrl: './views/libs/checkoutBuyNowHandler.php',
        redirectUrl: '?mod=cart&act=confirm',

        rules: [
            /** user info validation */
            Validator.isRequired('.address__input', 'Vui lòng điền địa chỉ của bạn'),
            Validator.isRequired('.address-detail__input', 'Bạn có thể điền số nhà cụ thể hoặc mô tả địa chỉ của mình!'),
            Validator.isRequired('.email__input', 'Vui lòng điền email của bạn'),
            Validator.isEmail('.email__input'),
            Validator.isRequired('.phone__input', 'Vui lòng điền số điện thoại của bạn'),
            Validator.isPhone('.phone__input'),

            /** recipient info validation */
            Validator.isRequired('.recipient-name__input'),
            Validator.isUsername('.recipient-name__input', 30),
            Validator.isRequired('.recipient-phone__input'),
            Validator.isPhone('.recipient-phone__input'),
            Validator.isRequired('.recipient-address__input'),
            Validator.isRequired('.recipient-address-detail__input'),
        ]
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the shipping method radio buttons
        var shippingRadios = document.querySelectorAll('input[name="shipping"]');

        // Add event listener to each shipping method radio button
        shippingRadios.forEach(function (radio) {
            radio.addEventListener("change", function () {
                // Get the selected shipping price
                var shippingPrice = this.value;

                // Send an AJAX request to update the summary
                updateSummary(shippingPrice);
            });
        });
    });

    function updateSummary(shippingPrice) {
        // Send an AJAX request to update the summary
        $.ajax({
            url: "./views/libs/updateBuyNowSummary.php",
            method: "POST",
            data: { shippingPrice: shippingPrice },
            success: function (response) {
                console.log(response.total);
                // Parse the response and update the summary elements
                document.querySelectorAll('.summary__total').forEach(item => {
                    item.textContent = response.total;
                });
                document.querySelectorAll('.shipping-fee').forEach(item => {
                    item.textContent = response.shippingFee;
                });

            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>