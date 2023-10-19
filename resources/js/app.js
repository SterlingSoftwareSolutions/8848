import "./bootstrap";
import $ from 'jquery';
window.$ = $;
import 'slick-carousel'

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
    var button = $(this);

    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/my-list/' + productId + '/add',
        success: function (data) {
            setTimeout(function () {
                window.location.reload();
            }, 2000);
        },
        error: function (xhr, status, error) {
            button.prop('disabled', false).html(' Favorite');
            console.log('request failed: ' + error);
        }
    });
})

$('.category-slider').slick({
    autoplay: true,
    infinite: true,
    autoplaySpeed: 0,
    slidesToScroll: 1,
    slidesToShow: 4,
    arrows: false,
    cssEase: 'linear',
    speed: 4000,
    initialSlide: 1,
    draggable: true,
    pauseOnHover: true,
    pauseOnFocus: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
