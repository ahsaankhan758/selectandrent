$(document).ready(function () {
    $(".load-more-btn").click(function () {
        let button = $(this);
        let targetList = $("#" + button.data("target"));
        let loadMoreUrl = button.data("url");
        let offset = parseInt(button.data("offset")) || 8; // Ensure it's an integer, default to 8
        let model = button.data("model");
        let totalRecords = parseInt(button.data("total")) || 0; // Ensure it's an integer, default to 0

        if (totalRecords === 0) {
            console.warn("Total records not set properly.");
        }

        $.ajax({
            url: loadMoreUrl,
            type: "GET",
            data: { offset: offset, model: model },
            beforeSend: function () {
                button.text("Loading...");
            },
            success: function (response) {
                if ($.trim(response.cars) === "") {
                    button.hide();
                } else {
                    targetList.append(response.cars);

                    //  Update offset AFTER appending new cars
                    let newOffset = offset + 8;
                    if (newOffset > totalRecords) {
                        newOffset = totalRecords;
                    }
                    button.data("offset", newOffset);

                    // Update current count correctly
                    let currentCountElement = $("#current-count");
                    if (currentCountElement.length) {
                        let currentCount = Math.min(newOffset, totalRecords) || 0; 
                        currentCountElement.text(currentCount);
                    }

                    if (!response.hasMore) {
                        button.hide();
                    } else {
                        button.text("Load More");
                    }
                }
            },
            error: function () {
                button.text("Load More").prop("disabled", false);
                alert("Something went wrong. Please try again.");
            }
        });
    });
    
    
});
