$(document).ready(function() {

    $('#getUserName').on('change', function () {
        var selectedUserId = $(this).val();
        console.log('Selected User ID:', selectedUserId);
        $.ajax({
            url: window.baseUrl+ '/getUserPermissions',
            type: "GET",
            data: { selectedUserId: selectedUserId },
            success: function (response) {
                console.log('Response:', response);
                $('#permissionsTable').removeClass('d-none').html(response.html);

                bindMasterCheckbox();
                handleFinancialParentAutoCheck();
                bindVehicleSubmenuEvents();
                bindFinancialSubmenuEvents();

                // Toggle for Vehicle
                $('.vehicle-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.vehicle-submodule');

                    const isCollapsed = subRows.hasClass('d-none');

                    if (isCollapsed) {
                        subRows.removeClass('d-none');
                        $arrow.text('▼');
                    } else {
                        subRows.addClass('d-none');
                        $arrow.text('►');
                    }
                });

                // Toggle for Financial
                $('.financial-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.financial-submodule');

                    const isCollapsed = subRows.hasClass('d-none');

                    if (isCollapsed) {
                        subRows.removeClass('d-none');
                        $arrow.text('▼');
                    } else {
                        subRows.addClass('d-none');
                        $arrow.text('►');
                    }
                });


                $('#savePermissionsBtn').removeClass('d-none');
                $('#checkAll').removeClass('d-none');

                updateMasterCheckboxState();
                updateRowCheckboxes();
                updateVehicleSubmodulesVisibility();
                updateFinancialSubmodulesVisibility();
                handleVehicleParentAutoCheck();
                handleFinancialParentAutoCheck();

                $(`input[name="permissions[vehicle][view]"],
                   input[name="permissions[vehicle][edit]"],
                   .row-checkbox[data-row="vehicle"]`).on('change', function () {
                    updateVehicleSubmodulesVisibility();
                });

                $(`input[name="permissions[financial][view]"],
                   input[name="permissions[financial][edit]"],
                   .row-checkbox[data-row="financial"]`).on('change', function () {
                    updateFinancialSubmodulesVisibility();
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });
    });

    updateVehicleSubmodulesVisibility();
    updateFinancialSubmodulesVisibility();

    $(`input[name="permissions[vehicle][view]"],
       input[name="permissions[vehicle][edit]"],
       .row-checkbox[data-row="vehicle"]`).on('change', function () {
        updateVehicleSubmodulesVisibility();
    });

    $(`input[name="permissions[financial][view]"],
       input[name="permissions[financial][edit]"],
       .row-checkbox[data-row="financial"]`).on('change', function () {
        updateFinancialSubmodulesVisibility();
    });

    $('#company').on('change', function() {
        var selectedCompany = $(this).val();
        console.log('Selected User ID:', selectedCompany);
        $.ajax({
            url: window.baseUrl+ '/getUsersList',
            type: "GET",
            data: { selectedCompany: selectedCompany },
            success: function (response){
                $('#employeeList').removeClass('d-none').html(response.html);
            },
        });
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
            updateMasterCheckboxState();
            updateRowCheckboxes();
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

    if (checked === total) {
        masterCheckbox.checked = true;
        masterCheckbox.indeterminate = false;
    } else if (checked === 0) {
        masterCheckbox.checked = false;
        masterCheckbox.indeterminate = false;
    } else {
        masterCheckbox.checked = false;
        masterCheckbox.indeterminate = true;
    }
}

function updateRowCheckboxes() {
    document.querySelectorAll('.row-checkbox').forEach(rowCb => {
        const rowKey = rowCb.dataset.row;
        const rowChecks = document.querySelectorAll(`.permission-checkbox[data-row="${rowKey}"]`);
        const total = rowChecks.length;
        const checked = Array.from(rowChecks).filter(cb => cb.checked).length;

        if (checked === total) {
            rowCb.checked = true;
            rowCb.indeterminate = false;
        } else if (checked === 0) {
            rowCb.checked = false;
            rowCb.indeterminate = false;
        } else {
            rowCb.checked = false;
            rowCb.indeterminate = true;
        }
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

function updateFinancialSubmodulesVisibility() {
    const viewChecked = $(`input[name="permissions[financial][view]"]`).is(':checked');

    // ✅ Always show submenu
    $('.financial-submodule').removeClass('d-none');

    // ✅ If view is unchecked, uncheck all submodule checkboxes
    if (!viewChecked) {
        $('.financial-submodule input[type="checkbox"]').prop('checked', false);
    }

    updateRowCheckboxes();
    updateMasterCheckboxState();
}


function handleVehicleParentAutoCheck() {
    $('.vehicle-submodule input[type="checkbox"]').on('change', function () {
        const anyChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;

        if (anyChecked) {
            $(`input[name="permissions[vehicle][view]"]`).prop('checked', true);
        }

        updateRowCheckboxes();
        updateMasterCheckboxState();
        updateVehicleSubmodulesVisibility();
    });
}

function handleFinancialParentAutoCheck() {
    $('.financial-submodule input[type="checkbox"]').on('change', function () {
        const anyChecked = $('.financial-submodule input[type="checkbox"]:checked').length > 0;

        // If any submodule is checked, check financial[view]
        if (anyChecked) {
            $(`input[name="permissions[financial][view]"]`).prop('checked', true);
        }

        updateRowCheckboxes();
        updateMasterCheckboxState();
        updateFinancialSubmodulesVisibility();
    });
}

function bindVehicleSubmenuEvents() {
    // Always keep vehicle submenu visible
    $('.vehicle-submodule').removeClass('d-none');
    $('.vehicle-parent-row .toggle-arrow').text('▼'); // arrow down

    // When Vehicle 'view' checkbox is unchecked, uncheck all submodules (but keep visible)
    $(`input[name="permissions[vehicle][view]"]`).off('change').on('change', function () {
        const isChecked = $(this).is(':checked');
        if (!isChecked) {
            $('.vehicle-submodule input[type="checkbox"]').prop('checked', false);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });

    // If any submodule is checked, ensure 'view' is checked
    $('.vehicle-submodule input[type="checkbox"]').off('change').on('change', function () {
        const anyChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;
        if (anyChecked) {
            $(`input[name="permissions[vehicle][view]"]`).prop('checked', true);
        }
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    // When Vehicle main row checkbox is unchecked → uncheck all vehicle-related checkboxes
    $('.row-checkbox[data-row="vehicle"]').off('change').on('change', function () {
        const checked = $(this).is(':checked');
        if (!checked) {
            $(`input[name^="permissions[vehicle]"]`).prop('checked', false);
            $('.vehicle-submodule input[type="checkbox"]').prop('checked', false);
            $('.vehicle-submodule').removeClass('d-none');
            $('.vehicle-parent-row .toggle-arrow').text('▼');
            updateRowCheckboxes();
            updateMasterCheckboxState();
        } else {
            // Optional: when main row is checked, auto-check view?
            $(`input[name="permissions[vehicle][view]"]`).prop('checked', true);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });
}

function bindFinancialSubmenuEvents() {
    // Always keep financial submenu visible
    $('.financial-submodule').removeClass('d-none');

    // When financial view checkbox changes
    $(`input[name="permissions[financial][view]"]`).off('change').on('change', function () {
        const isChecked = $(this).is(':checked');
        if (!isChecked) {
            // Uncheck all financial submenu checkboxes, but keep submenu visible
            $('.financial-submodule input[type="checkbox"]').prop('checked', false);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });

    // When any financial submenu checkbox changes
    $('.financial-submodule input[type="checkbox"]').off('change').on('change', function () {
        const anyChecked = $('.financial-submodule input[type="checkbox"]:checked').length > 0;
        if (anyChecked) {
            $(`input[name="permissions[financial][view]"]`).prop('checked', true);
        }
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    // When financial whole row checkbox changes
    $('.row-checkbox[data-row="financial"]').off('change').on('change', function () {
        const checked = $(this).is(':checked');
        if (!checked) {
            // Uncheck all financial submenu checkboxes AND financial view/edit checkboxes
            $(`input[name^="permissions[financial]"]`).prop('checked', false);
            // But keep submenu visible (since you want it always open)
            $('.financial-submodule').removeClass('d-none');
            updateRowCheckboxes();
            updateMasterCheckboxState();
        } else {
            // If main row checkbox checked, check financial view by default? (optional)
            $(`input[name="permissions[financial][view]"]`).prop('checked', true);
            updateRowCheckboxes();
            updateMasterCheckboxState();
        }
    });
}


$(document).ready(function () {
    bindFinancialSubmenuEvents();
});


