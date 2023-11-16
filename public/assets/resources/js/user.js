let form_address = document.querySelector('.form__address--container');
let form_hidden = true;
if(form_address) {
    form_address.style.opacity = '0';
    form_address.style.visibility = 'hidden';
}

// ẩn hiện form address
function show_hidden()
{
    form_address.classList.toggle('show');
}


function button_back()
{
    window.history.back();
}

// menu slider của menu trang respon mobile
function slider_menuMobile()
{
    $(document).ready(function () {
        $(".menu__mobile--ul").slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            infinity: false,
            arrows: false,
            autoplay: false,
            // autoplaySpeed: 1000,
            // draggable: true,
            dots: true
        });
    })
}

// tạo input[checkbox] để ẩn lỗi ở trang không có input[checkbox]
function input_typeCheckbox()
{
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.setAttribute("style", "display: none;");
    document.body.appendChild(checkbox);
}

//  select check box
function select__order()
{
    const checkboxes = document.querySelectorAll("input[type='checkbox']");
    checkboxes[0].addEventListener("click", function() {
      for (const checkbox of checkboxes) {
        if(!checkbox.checked) {
            checkboxes[0].checked = true;
            checkbox.checked = true;
        }else {
            checkboxes[0].checked = false;
            checkbox.checked = false;
        }
      }
    });
}

// show - hidden switch account

const button_switchAccount = document.querySelector('.box__changeAccount svg');
// let type_switchAccount = 
if(button_switchAccount) {
    let box__changeAccount__content = document.querySelector('.box__changeAccount--content');
    button_switchAccount.addEventListener("click", () => {
        box__changeAccount__content.classList.toggle('show');
    });
}

slider_menuMobile();
input_typeCheckbox();
select__order();