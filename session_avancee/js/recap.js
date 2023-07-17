let selectAllProducts = document.getElementById('selectProducts')
let allProducts = document.getElementsByClassName('Product')

$(document).ready(function() {
    $('.removeQTT').click(function() {
        var clickBtnValue = $(this).val();
        var test = parseInt($(this).parent().parent()[0].children[0].innerHTML);
        var ajaxurl = 'recapTraitement.php',
            data = {
                'action': clickBtnValue,
                'index': test
            };
        $.post(ajaxurl, data, function(response) {
            $(document).ajaxStop(function() {
                window.location = window.location;
            });
        });
    });
    $('.addQTT').click(function() {
        var clickBtnValue = $(this).val();
        var test = parseInt($(this).parent().parent()[0].children[0].innerHTML);
        var ajaxurl = 'recapTraitement.php',
            data = {
                'action': clickBtnValue,
                'index': test
            };
        $.post(ajaxurl, data, function(response) {
            $(document).ajaxStop(function() {
                window.location = window.location;
            });
        });
    });
});

selectAllProducts.addEventListener('click', () => {
    Array.prototype.forEach.call(allProducts, function(el) {
        if(el.checked){
            el.removeAttribute('checked')
        }else{
            el.setAttribute('checked', '')
        }
    });
})
