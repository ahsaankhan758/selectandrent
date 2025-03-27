$(document).ready(function () {
    // Transmission and sorting filters
    $("#transmission-filter, #sort-filter").on("change", function () {
        fetchFilteredCars();
    });

    function fetchFilteredCars() {
        let transmission = $("#transmission-filter").val();
        let sort = $("#sort-filter").val();

        $.ajax({
            url: carListingRoute,
            type: "GET",
            data: {
                transmission: transmission,
                sort: sort
            },
            beforeSend: function () {
                $("#car-list").html('<p>Loading...</p>');
            },
            success: function (response) {
                $("#car-list").html(response.html);
                $("#current-count").text(response.filteredCount);
            },
            error: function () {
                console.error("Error fetching cars.");
            }
        });
    }

    // Smart Car Model Dropdown
    let carModelsLoaded = false;

    $("#carModelDropdownBtn").on("click", function () {
        let dropdownMenu = $("#carModelDropdownMenu");

        if (!carModelsLoaded) {
            $.ajax({
                url: carListingFilterRoute,
                method: "GET",
                beforeSend: function () {
                    $("#carModelList").html('<li class="dropdown-item text-muted">Loading...</li>');
                },
                success: function (data) {
                    carModelsLoaded = true;
                    populateDropdown(data);
                },
                error: function () {
                    console.error("Error fetching car models.");
                    $("#carModelList").html('<li class="dropdown-item text-danger">Error loading models</li>');
                }
            });
        }

        dropdownMenu.toggle();
    });

    function populateDropdown(models) {
        let list = $("#carModelList");
        list.empty();

        if (models.length === 0) {
            list.append('<li class="dropdown-item text-muted">No Models Available</li>');
        } else {
            models.forEach(model => {
                list.append(`<li class="dropdown-item" data-value="${model.id}">${model.name}</li>`);
            });
        }
    }

    // Search functionality inside the dropdown
    $("#carModelSearch").on("keyup", function () {
        let searchVal = $(this).val().toLowerCase();
        $("#carModelList .dropdown-item").each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(searchVal));
        });
    });

    // Select a car model
    $(document).on("click", "#carModelList .dropdown-item", function () {
        let selectedText = $(this).text();
        let selectedId = $(this).attr("data-value");

        $("#carModelDropdownBtn").text(selectedText).attr("data-selected", selectedId);
        $("#carModelDropdownMenu").hide();
        filterCars();
    });

    // Close dropdown when clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".position-relative").length) {
            $("#carModelDropdownMenu").hide();
        }
    });

    // Address, Date, and Time Filters
    $("#addressFilter, #dateFilter, #timeFilter").on("change", function () {
        filterCars();
    });

    function filterCars() {
        let carModelId = $("#carModelDropdownBtn").attr("data-selected") || "";
        let address = $("#addressFilter").val();
        let date = $("#dateFilter").val();
        let time = $("#timeFilter").val();

        $.ajax({
            url: carListingRoute, // Ensure this variable is defined in your script
            method: "GET",
            data: {
                car_model_id: carModelId,
                address: address,
                date: date,
                time: time
            },
            beforeSend: function () {
                $("#car-list").html('<p>Loading...</p>');
            },
            success: function (response) {
                $("#car-list").html(response.html);
                $("#current-count").text(response.filteredCount);
            },
            error: function () {
                console.error("Error fetching filtered cars.");
            }
        });
    }
});
