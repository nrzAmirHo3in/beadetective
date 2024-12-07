// Fetch countries from REST Countries API
async function fetchCountries() {
    try {
        const response = await fetch('https://restcountries.com/v3.1/all');

        if (!response.ok) throw new Error('Network response was not ok');

        const countries = await response.json();

        // Sort the names alphabetically
        countries.sort((a, b) => {
            return a.name.common.localeCompare(b.name.common);
        });

        const countrySelect = document.getElementById('country');

        // Populate country dropdown
        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country.name.common.toLowerCase(); // Using full name of the country
            option.textContent = `${country.flag} ${country.name.common}`;
            countrySelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error fetching countries:', error);
    }
}

// Function to populate cities based on selected country
async function populateCities() {
    const countryName = document.getElementById('country').value; // Get selected country name
    const citySelect = document.getElementById('city');

    // Clear existing options
    citySelect.innerHTML = '<option value="">Select City</option>';

    if (countryName) { // Only fetch cities if a valid country is selected
        try {
            const response = await fetch('https://countriesnow.space/api/v0.1/countries/cities', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ country: countryName }) // Sending the full name of the selected country
            });

            if (!response.ok) throw new Error('Network response was not ok');

            const data = await response.json();

            const cities = data.data; // Accessing cities from the response

            // Populate the city dropdown
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.toLowerCase().replace(/\s+/g, '');
                option.textContent = city;
                citySelect.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching cities:', error);
        }
    } else {
        alert("Please select a valid country.");
    }
}

// Initialize countries on page load
window.onload = fetchCountries;

document.getElementById('purchaseForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;

    // Simulate sending the purchase information and getting a response
    const responseMessage = `Thank you, ${firstName} ${lastName}! Your purchase has been processed. 
                              We will send confirmation to your email shortly.`;

    // Display the response message
    const responseDiv = document.getElementById('responseMessage');
    responseDiv.innerText = responseMessage;
    responseDiv.style.display = 'block';
});