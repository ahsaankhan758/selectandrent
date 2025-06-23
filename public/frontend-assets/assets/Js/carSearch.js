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

    function loadLocations() {
        let locationDropdown = $('#locationDropdown');
        let url = locationDropdown.data('url');

        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                if (response.status) {
                    locationDropdown.html('<option disabled selected>Select Location</option>');
                    $.each(response.locations, function (i, loc) {
                        locationDropdown.append(`<option value="${loc.id}">${loc.area_name}</option>`);
                    });
                }
            },
            error: function () {
                showToast("Failed to load locations.", "error");
            }
        });
    }

    fetchData();
    loadLocations();

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
                showToast('Failed to fetch models for selected brand.', "error");
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
                    window.location.href = response.redirect_url; // Redirect where session will be used
                } else {
                    showToast('No cars found or redirect failed.', "error");
                }
            },
            error: function (xhr) {
                submitBtn.prop('disabled', false).html('Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>');

                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    let errorMsg = '';
                    $.each(xhr.responseJSON.errors, function (key, val) {
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
