$(document).ready(function () {
    let brandDropdown = $('#brandDropdown');
    let modelDropdown = $('#modelDropdown');
    let transmissionDropdown = $('#transmissionDropdown');
    let carSearchForm = $('#carSearchForm');

    // CSRF Token Setup
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
                    brandDropdown.html('<option disabled selected>Brand</option>');
                    $.each(response.brands, function (i, brand) {
                        brandDropdown.append(`<option value="${brand.id}">${brand.name}</option>`);
                    });

                    transmissionDropdown.html('<option disabled selected>Transmission</option>');
                    $.each(response.transmissions, function (i, trans) {
                        transmissionDropdown.append(`<option value="${trans}">${trans}</option>`);
                    });

                    modelDropdown.html('<option disabled selected>Model</option>');
                    $.each(response.models, function (i, model) {
                        modelDropdown.append(`<option value="${model.id}">${model.name}</option>`);
                    });
                }
            },
            error: function () {
                alert('Failed to load filter data.');
            }
        });
    }

    fetchData();

    brandDropdown.on('change', function () {
        let selectedBrandId = $(this).val();

        $.ajax({
            url: brandDropdown.data('url'),
            method: 'GET',
            data: { brand_id: selectedBrandId },
            success: function (response) {
                if (response.status) {
                    modelDropdown.html('<option disabled selected>Model</option>');
                    $.each(response.models, function (i, model) {
                        modelDropdown.append(`<option value="${model.id}">${model.name}</option>`);
                    });
                }
            },
            error: function () {
                var message = 'Failed to fetch models for selected brand.';
                showToast(message, "error");
            }
        });
    });

    carSearchForm.on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let submitBtn = form.find('button[type="submit"]');
        submitBtn.prop('disabled', true).html(`<img src="../frontend-assets/assets/loader.gif" alt="Loading..." width="25">`);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                submitBtn.prop('disabled', false).html('Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>');

                if (response.status && response.redirect_url) {
                    window.location.href = response.redirect_url;
                } else {
                    var message = 'No cars found or redirect failed.';
                    showToast(message, "error");
                }
            },
            error: function (xhr) {
                submitBtn.prop('disabled', false).html('Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>');

                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    $.each(errors, function (key, val) {
                        errorMsg += val[0] + '\n';
                    });
                    showToast(errorMsg, "error");
                    
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    showToast(xhr.responseJSON.message, "error");
                }
            }
        });
    });
});
