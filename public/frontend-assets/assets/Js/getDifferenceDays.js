const pickupInput = document.getElementById('getPickupDate');
    const dropoffInput = document.getElementById('getDropoffDate');
    const result = document.getElementById('timeDifference');

    function calculateDifference() {
        const pickupDate = new Date(pickupInput.value);
        const dropoffDate = new Date(dropoffInput.value);

        if (pickupInput.value && dropoffInput.value && dropoffDate > pickupDate) {
            const diffMs = dropoffDate - pickupDate; // in milliseconds
            const diffHrs = diffMs / (1000 * 60 * 60); // hours
            const diffDays = Math.floor(diffHrs / 24); // days
            const remainingHours = Math.floor(diffHrs % 24);

            result.innerText = `Difference: ${diffDays} day(s) and ${remainingHours} hour(s)`;
        } else if (pickupInput.value && dropoffInput.value) {
            result.innerText = `Drop-off must be after Pickup.`;
        } else {
            result.innerText = '';
        }
    }

    pickupInput.addEventListener('change', calculateDifference);
    dropoffInput.addEventListener('change', calculateDifference);