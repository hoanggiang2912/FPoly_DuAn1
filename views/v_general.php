<?php
    // xử lí khi người dùng nhập form
    if(isset($_POST['button__submit'])) {
        $id_user = $_POST['id_user'];
        if(is_array($checkUses)) {
            extract($checkUses);
        }
        if($_POST['new_username'] != "") {
            $new_username = $_POST['new_username'];
        }else {
            $new_username = $username;
        }
        if($_POST['new_email'] != "") {
            $new_email = $_POST['new_email'];
        }else {
            $new_email = $email;
        }
        update_userName_email($new_username, $new_email, $id_user);
        header('location: ?mod=user&act=general');
    }
?>
<main class="main__user">
    <div class="main__inner">
        <div class="main__inner--top">
            <div class="avatar__image">
                <img srcset="upload/users/<?=$avatarImage_user?> 2x" alt="" class="avatar__image--user">
            </div>
            <div class="info__user">
                <div class="info__user--top">
                    <span class="user__name"><?=$username?></span>
                    <span>/</span>
                    <span>Tổng quan</span>
                </div>
                <div class="info__user--bottom">
                    <span class="info__user--desc">
                        Cập nhật và quản lý tài khoản của bạn
                    </span>
                </div>
            </div>
            <div class="box__changeAccount">
                <svg viewBox="0 0 20 20" fill="currentColor" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xfuq9xy x10w6t97 x1td3qas"><g fill-rule="evenodd" transform="translate(-446 -398)"><g fill-rule="nonzero"><path d="M96.628 206.613A7.97 7.97 0 0 1 96 203.5a7.967 7.967 0 0 1 2.343-5.657A7.978 7.978 0 0 1 104 195.5a7.978 7.978 0 0 1 5.129 1.86.75.75 0 0 0 .962-1.15A9.479 9.479 0 0 0 104 194a9.478 9.478 0 0 0-6.717 2.783A9.467 9.467 0 0 0 94.5 203.5a9.47 9.47 0 0 0 .747 3.698.75.75 0 1 0 1.381-.585zm14.744-6.226A7.97 7.97 0 0 1 112 203.5a7.967 7.967 0 0 1-2.343 5.657A7.978 7.978 0 0 1 104 211.5a7.978 7.978 0 0 1-5.128-1.86.75.75 0 0 0-.962 1.152A9.479 9.479 0 0 0 104 213a9.478 9.478 0 0 0 6.717-2.783 9.467 9.467 0 0 0 2.783-6.717 9.47 9.47 0 0 0-.747-3.698.75.75 0 1 0-1.381.585z" transform="translate(352 204.5)"></path><path d="M109.5 197h-2.25a.75.75 0 1 0 0 1.5h3a.75.75 0 0 0 .75-.75v-3a.75.75 0 1 0-1.5 0V197zm-11 13h2.25a.75.75 0 1 0 0-1.5h-3a.75.75 0 0 0-.75.75v3a.75.75 0 1 0 1.5 0V210z" transform="translate(352 204.5)"></path></g></g></svg>

                <div class="box__changeAccount--content box-shadow4">
                    <div class="box__listAccount">
                        <div class="box__listAccount--item">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen ThanhNguyen ThanhNguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                        <hr class="hr__account">
                        <div class="box__listAccount--item account__notActive">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                        <div class="box__listAccount--item account__notActive">
                            <div class="box__avatar--account">
                                <img src="/public/assets/media/images/users/user-2.svg" alt="">
                            </div>
                            <div class="box__info--account">
                                <span class="info--account_name">Nguyen Thanh</span>
                                <span class="info--account_email">quocthanhn87@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="box__changeAccount--logOut">
                        <a hred="#" class="box__changeAccount--logOut__button">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__inner--bottom">
            <!-- user side bar start -->
            <?php require_once 'views/userSiderbar.php' ?>
            <!-- user side bar end -->

            <div class="main__inner--bottom-right">
                <form action="" method="POST">
                    <input type="hidden" name="id_user" value="<?=$id_user?>">
                    <!-- normal form group -->
                    <div class="form__group">
                        <span class="form__label">Tên đăng nhập</span>
                        <input type="text" name="new_username" class="form__input" placeholder="<?=$username?>">
                        <!-- <label for="" class="label__place">Tên đăng nhập</label> -->
                        <span class="form__message"></span>
                    </div>
                    <div class="form__group">
                        <span class="form__label">Email</span>
                        <input type="email" name="new_email" class="form__input" placeholder="<?=$email?>">
                        <!-- <label for="" class="label__place">Email</label> -->
                        <span class="form__message"></span>
                    </div>
                    <div class="form__group--submit">
                        <input type="submit" name="button__submit" value="Lưu thay đổi" class="btn__submit primary-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="form__address--container" style="display: none;"></div>
</main>