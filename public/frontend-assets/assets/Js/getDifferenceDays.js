
document.addEventListener('DOMContentLoaded', function () {
    const cartItems = document.querySelectorAll('.cart-item');
    

    cartItems.forEach(item => {
        const pickupInput = item.querySelector('.pickup-time');
        const dropoffInput = item.querySelector('.dropoff-time');
        const timeDiffDisplay = item.querySelector('.time-difference');
        const priceDisplay = item.querySelector('.calculated-price');
        const rowId = item.getAttribute('data-row-id');
        const price = item.getAttribute('data-price');
        const pricePerDay = price;

        const calculateAndUpdate = () => {
            const pickupDate = new Date(pickupInput.value);
            const dropoffDate = new Date(dropoffInput.value);
        
            if (pickupInput.value && dropoffInput.value && dropoffDate > pickupDate) {
                const diffMs = dropoffDate - pickupDate;
                const diffHrs = diffMs / (1000 * 60 * 60);
                let diffDays = Math.ceil(diffHrs / 24);
        
                // Ensure at least 1 day is charged
                if (diffDays < 1) diffDays = 1;
        
                // timeDiffDisplay.innerText = `Duration: ${diffDays} day(s)`;
        
                const totalPrice = diffDays * pricePerDay;
                // priceDisplay.innerText = `Price: $${totalPrice}`;
        
                updateCartPrice(rowId, totalPrice, diffDays);
            } else if (pickupInput.value && dropoffInput.value) {
                timeDiffDisplay.innerText = `Drop-off must be after Pickup.`;
                priceDisplay.innerText = '';
            } else {
                timeDiffDisplay.innerText = '';
                priceDisplay.innerText = '';
            }
        };
        

        pickupInput.addEventListener('change', calculateAndUpdate);
        dropoffInput.addEventListener('change', calculateAndUpdate);
    });

    function updateCartPrice(rowId, price, days) {
        
        fetch('/update-cart-price', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ rowId, price, days })
        })
        .then(res => res.json())
        .then(data => {
            const toast = {
                title: "Alert",
                message: data.message,
                status: data.status,
                timeout: 5000
            };
            Toast.create(toast);
            $('.showNewPrice'+data.rowId).html('$'+data.price);
            $('.showDuration'+data.rowId).html(data.qty);
        }
        
        )
        .catch(err => console.error('Error:', err));
    }
});
