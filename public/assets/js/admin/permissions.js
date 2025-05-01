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
                $('#nameList').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });
    });
    
    $('#getUserName').on('change', function() {
        var selectedUserId = $(this).val();
        
        $.ajax({
            url: 'getUserPermissions', 
            type: "GET",
            data: {
                selectedUserId: selectedUserId
            },
            success: function(response) {
                $('#permissionsTable').removeClass('d-none');
                $('#savePermissionsBtn').removeClass('d-none');
                $('#permissionsTable').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('Something went wrong while fetching users.');
            }
        });
    });
});
