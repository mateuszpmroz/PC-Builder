const $editModal = $('#edit-modal');
const $userNameModal = $('#user-name');
const $button = $('button[data-target]');
const formAction = '/backend/user/update/';

const init = () => {
    bindEditButton();
};

const bindEditButton = () => {
    $button.click(function () {
        updateEditModalUserName(this);
        updateEditModalInputs(this);
    });
};

const updateEditModalUserName = (editButton) => {
    const userLogin = $(editButton).closest('tr').find('.login').html();
    $userNameModal.html(userLogin);
};

const updateEditModalInputs = (editButton) => {
    const $tableRow = $(editButton).closest('tr');
    const userLogin = $tableRow.find('.login').html();
    const userEmail = $tableRow.find('.email').html();
    const userId = $tableRow.find('.id').html();
    $editModal.find('input.login').val(userLogin);
    $editModal.find('input.email').val(userEmail);
    $editModal.find('form').attr('action', formAction + userId);
};

$(document).ready(() => {
    init();
});