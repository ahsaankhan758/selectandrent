$(document).ready(function() {
    
    $('#role').on('change', function() {
        $('#savePermissionsBtn').addClass('d-none');
        $('#permissionsTable').addClass('d-none');
        $('#checkAll').addClass('d-none');
        var selectedRole = $(this).val();
    
        $.ajax({
            url: 'getUsersList', 
            type: "GET",
            data: {
                role: selectedRole
            },
            
            success: function(response) {
                $('#nameList').removeClass('d-none');
                $('#nameList').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });
    });
    
    $('#getUserName').on('change', function () {
        var selectedUserId = $(this).val();
    
        $.ajax({
            url: 'getUserPermissions',
            type: "GET",
            data: {
                selectedUserId: selectedUserId
            },
            success: function (response) {
                $('#permissionsTable').removeClass('d-none').html(response.html);
                $('#savePermissionsBtn').removeClass('d-none');
                $('#checkAll').removeClass('d-none');
    
                // ✅ Now that the table exists, bind the master checkbox event
                bindMasterCheckbox();
                updateMasterCheckboxState();
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

    if (!masterCheckbox) return;

    // Master checkbox controls all
    masterCheckbox.addEventListener('change', function () {
        permissionCheckboxes.forEach(cb => cb.checked = masterCheckbox.checked);
        updateRowCheckboxes();
        updateMasterCheckboxState();
    });

    // Permission checkbox updates master and row checkbox
    permissionCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            updateMasterCheckboxState();
            updateRowCheckboxes();
        });
    });

    // Row checkbox controls its own row
    document.querySelectorAll('.row-checkbox').forEach(rowCb => {
        rowCb.addEventListener('change', function () {
            const rowKey = this.dataset.row;
            const rowChecks = document.querySelectorAll(`.permission-checkbox[data-row="${rowKey}"]`);
            rowChecks.forEach(cb => cb.checked = rowCb.checked);
            updateMasterCheckboxState();
        });
    });

    // Initial state sync
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

