const previews = document.querySelectorAll('.mini_img');
previews.forEach((item) => {
    item.addEventListener('mouseenter', function () {
        const src = this.getAttribute('data-full');
        document.querySelector('.full_img').src = src;
    })
})

const el = document.querySelector('.product__count__text');
document.querySelector('.decrease__btn').onclick = function (e) {
    if (parseInt(el.textContent) > 1) {
        el.textContent = parseInt(el.textContent) - 1;
    }
}

document.querySelector('.increase__btn').onclick = function (e) {
    el.textContent = parseInt(el.textContent) + 1;
}

document.querySelector('.blue__btn').onclick = function (e) {
    const count = parseInt(el.textContent);
    if(count == 1) {
        toastr.success('В корзину добавлен '+ el.textContent + ' товар');
    }
    if((count > 1) && (count < 5)) {
        toastr.success('В корзину добавлено '+ el.textContent+ ' товара');
    } if(count > 4) {
        toastr.success('В корзину добавлено '+ el.textContent + ' товаров');
    }
}