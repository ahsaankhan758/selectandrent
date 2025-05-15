$(document).ready(function() {
    
    // $('#role').on('change', function() {
    //     $('#savePermissionsBtn').addClass('d-none');
    //     $('#permissionsTable').addClass('d-none');
    //     $('#checkAll').addClass('d-none');
    //     var selectedRole = $(this).val();
    
    //     $.ajax({
    //         url: 'getUsersList', 
    //         type: "GET",
    //         data: {
    //             role: selectedRole
    //         },
            
    //         success: function(response) {
    //             $('#nameList').removeClass('d-none');
    //             $('#nameList').html(response.html);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error:', xhr.responseText);
    //             alert('Something went wrong while fetching users.');
    //         }
    //     });
    // });
    
    $('#getUserName').on('change', function () {
        var selectedUserId = $(this).val();
        console.log('Selected User ID:', selectedUserId);
        $.ajax({
            url: '/admin/getUserPermissions',
            type: "GET",
            data: {
                selectedUserId: selectedUserId
            },
            success: function (response) {
                console.log('Response:', response);
                $('#permissionsTable').removeClass('d-none').html(response.html);
                bindMasterCheckbox();
                $('.vehicle-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.vehicle-submodule');

                    const isCollapsed = subRows.hasClass('d-none');

                    if (isCollapsed) {
                        subRows.removeClass('d-none');
                        $arrow.text('▼');
                    } else {
                        subRows.addClass('d-none');

                        // Uncheck all checkboxes in submodules when hiding
                        subRows.find('input[type="checkbox"]').prop('checked', false);
                        $arrow.text('►');
                    }
                });



                $('#savePermissionsBtn').removeClass('d-none');
                $('#checkAll').removeClass('d-none');
                
                // ✅ Bind the checkboxes now that the table exists
                
                updateMasterCheckboxState();
                handleVehicleParentAutoCheck();

                // ✅ Submodule toggling logic
                function updateVehicleSubmodulesVisibility() {
                    const viewChecked = $(`input[name="permissions[vehicle][view]"]`).is(':checked');
                    const editChecked = $(`input[name="permissions[vehicle][edit]"]`).is(':checked');
                    const rowChecked = $(`.row-checkbox[data-row="vehicle"]`).is(':checked');
                    const submodulesChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;

                    if (viewChecked || editChecked || rowChecked || submodulesChecked) {
                        $('.vehicle-submodule').removeClass('d-none');
                        $('.vehicle-parent-row .toggle-arrow').text('▼'); // arrow down
                    } else {
                        $('.vehicle-submodule').removeClass('d-none');
                        $('.vehicle-parent-row .toggle-arrow').text('►'); // arrow right
                    }
                }


                // ✅ Run on load
                updateVehicleSubmodulesVisibility();

                // ✅ Bind events after AJAX render
                $(`input[name="permissions[vehicle][view]"],
                input[name="permissions[vehicle][edit]"],
                .row-checkbox[data-row="vehicle"]`).on('change', function () {
                    updateVehicleSubmodulesVisibility();
                });
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });

    });
    
});


function bindMasterCheckbox() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');

    if (!masterCheckbox) return;

    // Unbind existing listeners first (important for re-binding)
    const newMasterCheckbox = masterCheckbox.cloneNode(true);
    masterCheckbox.parentNode.replaceChild(newMasterCheckbox, masterCheckbox);

    // Re-bind master checkbox change event
    newMasterCheckbox.addEventListener('change', function () {
        permissionCheckboxes.forEach(cb => cb.checked = newMasterCheckbox.checked);
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    // Bind permission checkbox listeners
    permissionCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            updateMasterCheckboxState();
            updateRowCheckboxes();
        });
    });

    // Row checkbox listeners
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
        masterCheckbox.indeterminate = true; // partial selection
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
        $('.vehicle-parent-row .toggle-arrow').text('▼'); // arrow down
    } else {
        $('.vehicle-submodule').removeClass('d-none');
        $('.vehicle-parent-row .toggle-arrow').text('►'); // arrow right
    }
}


    $(document).ready(function () {
        updateVehicleSubmodulesVisibility(); // Run on page load

        // Bind to any change on Vehicle permissions
        $(`input[name="permissions[vehicle][view]"],
           input[name="permissions[vehicle][edit]"],
           .row-checkbox[data-row="vehicle"]`).on('change', function () {
            updateVehicleSubmodulesVisibility();
        });
    });

function handleVehicleParentAutoCheck() {
    $('.vehicle-submodule input[type="checkbox"]').on('change', function () {
        const anyChecked = $('.vehicle-submodule input[type="checkbox"]:checked').length > 0;

        // If any submodule is checked, check vehicle[view]
        if (anyChecked) {
            $(`input[name="permissions[vehicle][view]"]`).prop('checked', true);
        }

        updateRowCheckboxes();
        updateMasterCheckboxState();
        updateVehicleSubmodulesVisibility();
    });
}



