document.addEventListener('DOMContentLoaded', function () {
    var cards = document.querySelectorAll('.card');

    cards.forEach(function (card, index) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(10px)';

        setTimeout(function () {
            card.style.transition = 'all 280ms ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 80 * index);
    });
});
