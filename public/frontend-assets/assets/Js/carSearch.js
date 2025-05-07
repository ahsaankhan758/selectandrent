$(document).ready(function () {
    let brandDropdown = $('#brandDropdown');
    let modelDropdown = $('#modelDropdown');
    let beamDropdown = $('#beamDropdown');
    let transmissionDropdown = $('#transmissionDropdown');
    let carSearchForm = $('#carSearchForm');

    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetchData() {
        $.ajax({
            url: brandDropdown.data('url'),
            method: 'GET',
            success: function (response) {
                if (response.status) {
                    // Populate Brands Dropdown
                    brandDropdown.empty().append('<option disabled selected>Brand</option>');
                    response.brands.forEach(function (brand) {
                        brandDropdown.append('<option value="' + brand.id + '">' + brand.name + '</option>');
                    });

                    // Populate Beams Dropdown
                    beamDropdown.empty().append('<option disabled selected>Beam</option>');
                    response.beams.forEach(function (beam) {
                        beamDropdown.append('<option value="' + beam + '">' + beam + '</option>');
                    });

                    // Populate Transmissions Dropdown
                    transmissionDropdown.empty().append('<option disabled selected>Transmission</option>');
                    response.transmissions.forEach(function (transmission) {
                        transmissionDropdown.append('<option value="' + transmission + '">' + transmission + '</option>');
                    });

                    // Populate Models Dropdown (initial load)
                    modelDropdown.empty().append('<option disabled selected>Model</option>');
                    response.models.forEach(function (model) {
                        modelDropdown.append('<option value="' + model.id + '">' + model.name + '</option>');
                    });
                }
            }
        });
    }

    // Fetch initial data on page load
    fetchData();

    // Handle brand change to update models
    brandDropdown.on('change', function () {
        var selectedBrandId = $(this).val();

        $.ajax({
            url: brandDropdown.data('url'),
            method: 'GET',
            data: { brand_id: selectedBrandId },
            success: function (response) {
                if (response.status) {
                    modelDropdown.empty().append('<option disabled selected>Model</option>');
                    response.models.forEach(function (model) {
                        modelDropdown.append('<option value="' + model.id + '">' + model.name + '</option>');
                    });
                }
            },
            error: function () {
                console.warn('Failed to fetch models for selected brand.');
            }
        });
    });

    // Handle form submission with AJAX
    $(document).on('submit', '#carSearchForm', function (e) {
        e.preventDefault();
        var form = $(this);
        var submitBtn = form.find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('Processing...');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    let toast = {
                        title: "Success",
                        message: response.message,
                        status: response.status,
                        timeout: 5000
                    };
                    Toast.create(toast);
                    console.log(response.data);
                    submitBtn.prop('disabled', false).html('Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>');
                    form.trigger('reset');
                } else {
                    alert('Something went wrong. Please try again.');
                }
            },
            error: function (xhr) {
                submitBtn.prop('disabled', false).html('Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>');
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    $.each(errors, function (key, val) {
                        errorMsg += val[0] + '\n';
                    });
                    alert(errorMsg);
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
    });
});
