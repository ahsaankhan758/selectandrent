$(document).ready(function () {
    $('#getUserName').on('change', function () {
        var selectedUserId = $(this).val();

        $.ajax({
            url: window.baseUrl + '/getUserPermissions',
            type: "GET",
            data: { selectedUserId: selectedUserId },
            success: function (response) {
                $('#permissionsTable').removeClass('d-none').html(response.html);

                bindMasterCheckbox();
                bindVehicleSubmenuEvents();
                bindSettingsSubmenuEvents();

                // Toggle for Vehicle
                $('.vehicle-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.vehicle-submodule');
                    const isCollapsed = subRows.hasClass('d-none');
                    subRows.toggleClass('d-none');
                    $arrow.text(isCollapsed ? '▼' : '►');
                });

                // Toggle for Settings
                $('.settings-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.settings-submodule');
                    const isCollapsed = subRows.hasClass('d-none');
                    subRows.toggleClass('d-none');
                    $arrow.text(isCollapsed ? '▼' : '►');
                });

                $('#savePermissionsBtn').removeClass('d-none');
                $('#checkAll').removeClass('d-none');

                updateMasterCheckboxState();
                updateRowCheckboxes();
                updateVehicleSubmodulesVisibility();

                $(`input[name="permissions[vehicle][view]"],
                   input[name="permissions[vehicle][edit]"],
                   .row-checkbox[data-row="vehicle"]`).on('change', function () {
                    updateVehicleSubmodulesVisibility();
                });

                $(`input[name="permissions[settings][view]"],
                   input[name="permissions[settings][edit]"],
                   .row-checkbox[data-row="settings"]`).on('change', function () {
                    $('.settings-submodule').removeClass('d-none');
                });
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });
    });

    $('#company').on('change', function () {
        var selectedCompany = $(this).val();

        $.ajax({
            url: window.baseUrl + '/getUsersList',
            type: "GET",
            data: { selectedCompany: selectedCompany },
            success: function (response) {
                $('#employeeList').removeClass('d-none').html(response.html);
            }
        });
    });

    // On page load
    bindVehicleSubmenuEvents();
    bindSettingsSubmenuEvents();
    updateVehicleSubmodulesVisibility();

    $(`input[name="permissions[vehicle][view]"],
       input[name="permissions[vehicle][edit]"],
       .row-checkbox[data-row="vehicle"]`).on('change', function () {
        updateVehicleSubmodulesVisibility();
    });

    $(`input[name="permissions[settings][view]"],
       input[name="permissions[settings][edit]"],
       .row-checkbox[data-row="settings"]`).on('change', function () {
        $('.settings-submodule').removeClass('d-none');
    });
});

function bindMasterCheckbox() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    if (!masterCheckbox) return;

    const newMasterCheckbox = masterCheckbox.cloneNode(true);
    masterCheckbox.parentNode.replaceChild(newMasterCheckbox, masterCheckbox);

    newMasterCheckbox.addEventListener('change', function () {
        permissionCheckboxes.forEach(cb => cb.checked = newMasterCheckbox.checked);
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    permissionCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            updateRowCheckboxes();
            updateMasterCheckboxState();
        });
    });

    rowCheckboxes.forEach(rowCb => {
        rowCb.addEventListener('change', function () {
            const rowKey = this.dataset.row;
            const rowChecks = document.querySelectorAll(`.permission-checkbox[data-row="${rowKey}"]`);
            rowChecks.forEach(cb => cb.checked = rowCb.checked);
            updateMasterCheckboxState();
        });
    });

    updateRowCheckboxes();
    updateMasterCheckboxState();
}

function updateMasterCheckboxState() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const checkboxes = document.querySelectorAll('.permission-checkbox');
    const total = checkboxes.length;
    const checked = Array.from(checkboxes).filter(cb => cb.checked).length;

    masterCheckbox.checked = checked === total;
    masterCheckbox.indeterminate = checked > 0 && checked < total;
}

function updateRowCheckboxes() {
    document.querySelectorAll('.row-checkbox').forEach(rowCb => {
        const rowKey = rowCb.dataset.row;
        const rowChecks = document.querySelectorAll(`.permission-checkbox[data-row="${rowKey}"]`);
        const total = rowChecks.length;
        const checked = Array.from(rowChecks).filter(cb => cb.checked).length;

        rowCb.checked = checked === total;
        rowCb.indeterminate = checked > 0 && checked < total;
    });
}

function updateVehicleSubmodulesVisibility() {
    const viewChecked = $(`input[name="permissions[vehicle][view]"]`).is(':checked');
    const editChecked = $(`input[name="permissions[vehicle][edit]"]`).is(':checked');
    const rowChecked = $(`.row-checkbox[data-row="vehicle"]`).is(':checked');
    const submodulesChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;

    if (viewChecked || editChecked || rowChecked || submodulesChecked) {
        $('.vehicle-submodule').removeClass('d-none');
        $('.vehicle-parent-row .toggle-arrow').text('▼');
    } else {
        $('.vehicle-submodule').removeClass('d-none');
        $('.vehicle-parent-row .toggle-arrow').text('►');
    }
}

function bindVehicleSubmenuEvents() {
    $('.vehicle-submodule').removeClass('d-none');
    $('.vehicle-parent-row .toggle-arrow').text('▼');

    $(`input[name="permissions[vehicle][view]"]`).off('change').on('change', function () {
        if (!$(this).is(':checked')) {
            $('.vehicle-submodule input[type="checkbox"]').prop('checked', false);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });

    $('.vehicle-submodule input[type="checkbox"]').off('change').on('change', function () {
        const anyChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;
        if (anyChecked) {
            $(`input[name="permissions[vehicle][view]"]`).prop('checked', true);
        }
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    $('.row-checkbox[data-row="vehicle"]').off('change').on('change', function () {
        const checked = $(this).is(':checked');

        $(`input[name^="permissions[vehicle]"]`).prop('checked', checked);
        $('.vehicle-submodule input[type="checkbox"]').prop('checked', checked);

        if (checked) {
            $('.vehicle-parent-row .toggle-arrow').text('▼');
        }

        updateRowCheckboxes();
        updateMasterCheckboxState();
    });
}

function bindSettingsSubmenuEvents() {
    $('.settings-submodule').removeClass('d-none');
    $('.settings-parent-row .toggle-arrow').text('▼');

    $(`input[name="permissions[settings][view]"]`).off('change').on('change', function () {
        if (!$(this).is(':checked')) {
            $('.settings-submodule input[type="checkbox"]').prop('checked', false);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });

    $('.settings-submodule input[type="checkbox"]').off('change').on('change', function () {
        const anyChecked = $('.settings-submodule input[type="checkbox"]:checked').length > 0;
        if (anyChecked) {
            $(`input[name="permissions[settings][view]"]`).prop('checked', true);
        }
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    $('.row-checkbox[data-row="settings"]').off('change').on('change', function () {
        const checked = $(this).is(':checked');

        $(`input[name^="permissions[settings]"]`).prop('checked', checked);
        $('.settings-submodule input[type="checkbox"]').prop('checked', checked);

        if (checked) {
            $('.settings-parent-row .toggle-arrow').text('▼');
        }

        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

}
