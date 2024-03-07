import "./bootstrap";
import $ from 'jquery';
window.$ = $;

function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);

    if (value > 0) {
        value--;
        target.value = value;
    }
}

function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value++;
    target.value = value;
}

const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
);

const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
);

decrementButtons.forEach((btn) => {
    btn.addEventListener("click", decrement);
});

incrementButtons.forEach((btn) => {
    btn.addEventListener("click", increment);
});

// Product add to my list function
$('.favourite_btn').on('click', function (e) {
    var productId = $(this).data('favourite')
    var variantId = $('#variant_id_' + productId).val()
    var button = $(this);

    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/my-list/' + variantId + '/add',
        success: function (data) {
            setTimeout(function () {
                window.location.reload();
            }, 2000);
        },
        error: function (xhr, status, error) {
            button.prop('disabled', false).html('MY LIST');
            console.log('request failed: ' + error);
        }
    });
})
