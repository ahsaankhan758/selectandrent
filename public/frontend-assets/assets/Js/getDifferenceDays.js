document.addEventListener('DOMContentLoaded', function () {
    const pickupInput = document.getElementById('getPickupDate');
    const dropoffInput = document.getElementById('getDropoffDate');
    const result = document.getElementById('timeDifference');

    function calculateDifference() {
        
        const pickupDate = new Date(pickupInput.value);
        const dropoffDate = new Date(dropoffInput.value);

        if (pickupInput.value && dropoffInput.value && dropoffDate > pickupDate) {
            const diffMs = dropoffDate - pickupDate;
            const diffHrs = diffMs / (1000 * 60 * 60);
            const diffDays = Math.floor(diffHrs / 24);
            const remainingHours = Math.floor(diffHrs % 24);

            result.innerText = `Duration: ${diffDays} day(s) and ${remainingHours} hour(s)`;
        } else if (pickupInput.value && dropoffInput.value) {
            result.innerText = `Drop-off must be after Pickup.`;
        } else {
            result.innerText = '';
        }
    }

    if (pickupInput && dropoffInput) {
        pickupInput.addEventListener('change', calculateDifference);
        dropoffInput.addEventListener('change', calculateDifference);
    }
});