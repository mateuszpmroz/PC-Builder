const $editModal = $('#edit-modal');
const $componentNameModal = $('#component-name');
const $button = $('button[data-target]');
const formAction = '/backend/component/update/';

const init = () => {
    bindEditButton();
};

const bindEditButton = () => {
    $button.click(function () {
        updateEditModalComponentName(this);
        updateEditModalInputs(this);
    });
};

const updateEditModalComponentName = (editButton) => {
    const componentName = $(editButton).closest('tr').find('.name').html();
    $componentNameModal.html(componentName);
};

const updateEditModalInputs = (editButton) => {
    const $tableRow = $(editButton).closest('tr');
    const componentName = $tableRow.find('.name').html();
    const componentType = $tableRow.find('.type').html();
    const componentPoints = $tableRow.find('.points').html();
    const componentPrice = $tableRow.find('.price').html();
    const componentId = $tableRow.find('.id').html();

    $editModal.find('input.name').val(componentName);
    $editModal.find('select.type').val(componentType);
    $editModal.find('input.points').val(componentPoints);
    $editModal.find('input.price').val(componentPrice);
    $editModal.find('form').attr('action', formAction + componentId);
};

$(document).ready(() => {
    init();
});