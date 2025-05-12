$(document).ready(function() {
    
    $('#role').on('change', function() {
        $('#savePermissionsBtn').addClass('d-none');
        $('#permissionsTable').addClass('d-none');
        var selectedRole = $(this).val();
    
        $.ajax({
            url: 'getUsersList', 
            type: "GET",
            data: {
                role: selectedRole
            },
            
            success: function(response) {
                $('#nameList').removeClass('d-none');
                $('#checkAll').addClass('d-none');
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

    if (masterCheckbox) {
        masterCheckbox.addEventListener('change', function () {
            const allCheckboxes = document.querySelectorAll('.permission-checkbox');
            allCheckboxes.forEach(function (checkbox) {
                checkbox.checked = masterCheckbox.checked;
            });
        });
    }
}

function updateMasterCheckboxState() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const allCheckboxes = document.querySelectorAll('.permission-checkbox');
    if (masterCheckbox && allCheckboxes.length) {
        const allChecked = Array.from(allCheckboxes).every(cb => cb.checked);
        masterCheckbox.checked = allChecked;
    }
}


