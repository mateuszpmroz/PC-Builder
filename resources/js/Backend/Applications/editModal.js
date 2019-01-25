const $editModal = $('#edit-modal');
const $applicationNameModal = $('#application-name');
const $button = $('button[data-target]');
const formAction = '/backend/application/update/';

const init = () => {
    bindEditButton();
};

const bindEditButton = () => {
    $button.click(function () {
        updateEditModalApplicationName(this);
        updateEditModalInputs(this);
    });
};

const updateEditModalApplicationName = (editButton) => {
    const applicationName = $(editButton).closest('tr').find('.name').html();
    $applicationNameModal.html(applicationName);
};

const updateEditModalInputs = (editButton) => {
    const $tableRow = $(editButton).closest('tr');
    const applicationId = $tableRow.find('.id').html();
    const applicationName = $tableRow.find('.name').html();
    const applicationIsProgram = $tableRow.find('.is_program').html();
    const applicationGraphicPoints = $tableRow.find('.graphic_points').html();
    const applicationRamPoints = $tableRow.find('.processor_points').html();
    const applicationProcessorPoints = $tableRow.find('.ram_points').html();
    const applicationPowerSuppliesPoints = $tableRow.find('.power_supplies_points').html();
    const applicationImageUrl = $tableRow.find('.image_url img').attr('src');

    $editModal.find('input.name').val(applicationName);
    $editModal.find('checkbox.is_program').prop('checked', applicationIsProgram);
    $editModal.find('input.graphic_points').val(applicationGraphicPoints);
    $editModal.find('input.processor_points').val(applicationProcessorPoints);
    $editModal.find('input.ram_points').val(applicationRamPoints);
    $editModal.find('input.image_url').val(applicationImageUrl);
    $editModal.find('input.power_supplies_points').val(applicationPowerSuppliesPoints);
    $editModal.find('form').attr('action', formAction + applicationId);
};

$(document).ready(() => {
    init();
});