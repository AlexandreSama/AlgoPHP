let selectAllProducts = document.getElementById('selectProducts')
let allProducts = document.getElementsByClassName('Product')

selectAllProducts.addEventListener('click', () => {
    Array.prototype.forEach.call(allProducts, function(el) {
        if(el.checked){
            el.removeAttribute('checked')
        }else{
            el.setAttribute('checked', '')
        }
    });
})