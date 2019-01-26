const dataComponentPrice = 'componentPrice';

const init = () => {
    showFinalPrice();
};

const showFinalPrice = () => {
    $('select').on('change', () => {
        $('#components-price').html(getComponentsPrice);
    });
};

const getComponentsPrice = () => {
    let price = 0;
    $('select option:selected').each(function () {
        price = price + $(this).data(dataComponentPrice);
    });
    return price;
};

$(document).ready(() => {
    init();
});