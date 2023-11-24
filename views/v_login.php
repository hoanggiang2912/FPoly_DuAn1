<main class="main__login-register">
    <section id="register-section" class="oh por section create-account__section banner-cover flex-center g60"
        style="background-image: url('./public/assets/media/images/banners/banner-login-1.svg')">
        <form action="?mod=page&act=register" method="post" id="register__form" class="form register__form flex-column g30">
            <div class="form__title">
                Chào mừng đến với LEGOUS <br>
                Tạo tài khoản ngay!
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Tên đăng nhập</label> -->
                <input type="text" name="username" id="username__input" class="form__input user__name--input" placeholder=" ">
                <label for="" class="label__place">Tên đăng nhập</label>
                <span class="form__message label-medium"></span>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="email" id="email__input" class="form__input email--input" placeholder=" ">
                <label for="" class="label__place">Email</label>
                <span class="form__message label-medium" id="email-validation-status"></span>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="password" class="form__input password--input" placeholder=" ">
                <label for="" class="label__place">Mật khẩu</label>
                <span class="form__message label-medium"></span>
            </div>
            <input class="btn form__btn" type="submit" name="register" value="TẠO TÀI KHOẢN" style="border:none; color: white">            
            <div class="label-large">Bạn đã có tài khoản? <a href="#login-section" class="click">Đăng nhập ngay!</a></div>
        </form>
        <div class="banner-contain login__banner flex-full"
            style="aspect-ratio: 1;z-index: 999;max-width: 50rem;background-image: url('./public/assets/media/images/banners/image\ 4.svg');">
        </div>
    </section>

    <!-- login -->
    <section id="login-section" class="oh section flex-center por login__section banner-cover flex g60"
        style="background-image: url('./public/assets/media/images/banners/banner-login-2.svg')"
        ;>
        <div class="banner-cover login__banner flex-full"
            style="aspect-ratio: 1;max-width: 50rem;z-index: 99;background-image: url('./public/assets/media/images/banners/image\ 5.svg');">
        </div>
        <form action="?mod=page&act=login" method="post" id="login__form" class="form flex-column g30">
            <div class="form__title">
                Chào mừng trở lại LEGOUS <br>
                Đăng nhập ngay !
            </div>
            <input type="hidden" name="login_form" value="true">
            <div class="form__group without-title">
                <!-- <label for="username">Email</label> -->
                <input type="text" name="email" class="form__input email--input" placeholder=" " value="">
                <label for="" class="label__place">Email</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group without-title">
                <!-- <label for="username">Mật khẩu</label> -->
                <input type="text" name="password" class="form__input password--input" placeholder=" " value="">
                <label for="" class="label__place">Mật khẩu</label>
                <span class="form__message"></span>
            </div>
            <input type="submit" name="login" class="btn form__btn" style="background: black; color: white; border-radius: .8rem;" value="ĐĂNG NHẬP NGAY">
            <div class="label-large">Bạn quên mật khẩu? <a href="#register-section" class="click">Nhấp vào đây!</a></div>
        </form>
    </section>
</main>
<script src="./public/assets/resources/js/validator.js"></script>
<script>
    Validator({
        formSelector: '#register__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        submitUrl: '?mod=page&act=register',
        redirectUrl: '?mod=page&act=register',

        rules: [
            Validator.isRequired('#username__input'),
            Validator.isUsername('#username__input', 'Vui lòng điền tên đăng nhập' , './views/libs/usernameValidator.php'),
            Validator.isRequired('.email--input' , 'Vui lòng nhập email của bạn.'),
            Validator.isEmail('.email--input'),
            Validator.isEmailAlreadyExist('.email--input' , 'Email này đã tồn tại trên hệ thống' , './views/libs/emailValidator.php'),
            Validator.isRequired('.password--input' , 'Vui lòng nhập mật khẩu của bạn.'),
            Validator.isPassword('.password--input'),
        ]
    })
    Validator({
        formSelector: '#login__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        submitUrl: '?mod=page&act=login',
        redirectUrl: '?mod=page&act=login',

        rules: [
            Validator.isRequired('.email--input' , 'Vui lòng nhập email của bạn.'),
            Validator.isEmail('.email--input'),
            Validator.isRequired('.password--input' , 'Vui lòng nhập mật khẩu của bạn.'),
            Validator.isPassword('.password--input'),
        ]
    })
</script>