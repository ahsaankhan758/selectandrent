$(document).ready(function () {
    let carModelsLoaded = false;

    // Fetch cars when filters change
    $("#transmission-filter, #sort-filter, #addressFilter, #dateFilter, #timeFilter").on("change", function () {
        fetchFilteredCars();
    });

    // Fetch cars when clicking a category button
    $(".category-filter").on("click", function () {
        let categoryId = $(this).attr("data-category");
        fetchFilteredCars(categoryId);
    });

    function fetchFilteredCars(categoryId = "") {
        let transmission = $("#transmission-filter").val();
        let sort = $("#sort-filter").val();
        let carModelId = $("#carModelDropdownBtn").attr("data-selected") || "";
        let address = $("#addressFilter").val();
        let date = $("#dateFilter").val();
        let time = $("#timeFilter").val();

        $.ajax({
            url: carListingRoute,
            type: "GET",
            data: {
                transmission: transmission,
                sort: sort,
                car_model_id: carModelId,
                address: address,
                date: date,
                time: time,
                category_id: categoryId 
            },
            beforeSend: function () {
                $("#car-list").html('<p>Loading...</p>');
            },
            success: function (response) {
                $("#car-list").html(response.data);
                $("#current-count").text(response.filteredCount);

                // **Hide Load More button if filtered records < 8**
                if (response.filteredCount < 8) {
                    $(".load-more-btn").hide();
                } else {
                    $(".load-more-btn").show().data("offset", 8).data("total", response.filteredCount);
                }
            },
            error: function () {
                console.error("Error fetching filtered cars.");
            }
        });
    }

    // Smart Car Model Dropdown
    $("#carModelDropdownBtn").on("click", function () {
        let dropdownMenu = $("#carModelDropdownMenu");
        let dropdownArrow = $(".dropdown-arrow");

        dropdownMenu.toggleClass("show");
        dropdownArrow.toggleClass("rotate");

        if (!carModelsLoaded) {
            $.ajax({
                url: carListingFilterRoute,
                method: "GET",
                beforeSend: function () {
                    $("#carModelList").html('<li class="dropdown-item-custom text-muted">Loading...</li>');
                },
                success: function (data) {
                    carModelsLoaded = true;
                    populateDropdown(data);
                },
                error: function () {
                    console.error("Error fetching car models.");
                    $("#carModelList").html('<li class="dropdown-item-custom text-danger">Error loading models</li>');
                }
            });
        }
    });

    function populateDropdown(models) {
        let list = $("#carModelList");
        list.empty();

        if (models.length === 0) {
            list.append('<li class="dropdown-item-custom text-muted">No Models Available</li>');
        } else {
            models.forEach(model => {
                list.append(`<li class="dropdown-item-custom" data-value="${model.id}">${model.name}</li>`);
            });
        }
    }

    // Search functionality inside the dropdown
    $("#carModelSearch").on("keyup", function () {
        let searchVal = $(this).val().toLowerCase();
        $("#carModelList .dropdown-item-custom").each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(searchVal));
        });
    });

    // Select a car model
    $(document).on("click", "#carModelList .dropdown-item-custom", function () {
        let selectedText = $(this).text();
        let selectedId = $(this).attr("data-value");

        $("#carModelDropdownBtn span").text(selectedText);
        $("#carModelDropdownBtn").attr("data-selected", selectedId);
        $("#carModelDropdownMenu").removeClass("show");
        $(".dropdown-arrow").removeClass("rotate");

        fetchFilteredCars();
    });

    // Hide dropdown when clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".car-listing-dropdown-container").length) {
            $("#carModelDropdownMenu").removeClass("show");
            $(".dropdown-arrow").removeClass("rotate");
        }
    });

    // Hide address dropdown on outside click
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".address-dropdown-container").length) {
            $("#addressDropdown").hide();
        }
    });

    // Show brand buttons first 6; if > 6, show "View More" link
    $("#viewMoreCategories").on("click", function () {
        $("#extraCategories").slideToggle();
        $(this).text($(this).text() === "View More" ? "View Less" : "View More");
    });

    // Highlight selected category
    $(".category-filter").on("click", function () {
        $(".category-filter").removeClass("active");
        $(this).addClass("active");
    });



    // address filter 
    $("#addressFilter").on("input", function () {
        let query = $(this).val().trim();

        if (query.length > 0) {
            $.ajax({
                url: carListingAddressFilter,
                method: "GET",
                data: { query: query },
                beforeSend: function () {
                    $("#addressDropdown")
                        .html('<li class="dropdown-item text-muted">Searching...</li>')
                        .show();
                },
                success: function (response) {
                    let dropdown = $("#addressDropdown");
                    dropdown.empty(); // Clear previous results

                    // Filter results that start with the entered letter (case-insensitive)
                    let filteredResults = response.filter(location => 
                        new RegExp(`^${query}`, "i").test(location.city)
                    );

                    if (filteredResults.length > 0) {
                        filteredResults.forEach(location => {
                            dropdown.append(
                                `<li class="dropdown-item" data-id="${location.id}">${location.city}</li>`
                            );
                        });
                        dropdown.show();
                    } else {
                        dropdown.append('<li class="dropdown-item text-muted">No results found</li>').show();
                    }
                },
                error: function () {
                    $("#addressDropdown")
                        .html('<li class="dropdown-item text-danger">Error loading locations</li>')
                        .show();
                }
            });
        } else {
            $("#addressDropdown").hide(); // Hide dropdown if input is empty
        }
    });

    // Select city from dropdown
    $(document).on("click", "#addressDropdown .dropdown-item", function () {
        let selectedText = $(this).text();
        let selectedId = $(this).attr("data-id");

        if (!$(this).hasClass("text-muted")) {
            $("#addressFilter").val(selectedText); // Set input value
            $("#addressFilter").attr("data-selected", selectedId); // Store ID
            $("#addressDropdown").hide(); // Hide dropdown
            fetchFilteredCars(); // Trigger filtering
        }
    });

    // Hide dropdown when clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".position-relative").length) {
            $("#addressDropdown").hide();
        }
    });
    
});
