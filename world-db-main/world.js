$(document).ready(() => {
    const lookupBtn = $('#lookup'); // Selecting the button with id 'lookup'
    const lookupCitiesBtn = $('#lookupCities'); // Selecting the button with id 'lookupCities'

    lookupBtn.click(() => { // Adding a click event listener to the 'lookup' button
        const input = $('#country').val(); // Getting the value of the input field with id 'country'
        $.ajax(`world.php?country=${input}`, { // Making an AJAX request to 'world.php' with the country as a parameter
            method: 'GET', // Using the GET method for the request
        }).done(response => $('#result').html(response)) // If the request is successful,
            // display the response in the element with id 'result'
            .fail(() => alert('There was a problem with the request.')); // If the request fails, show an alert message
    });

    lookupCitiesBtn.click(() => { // Adding a click event listener to the 'lookupCities' button
        const input = $('#country').val(); // Getting the value of the input field with id 'country'
        $.ajax(`world.php?country=${input}&lookup=cities`, { // Making an AJAX request to 'world.php' with the country and lookup=cities as parameters
            method: 'GET', // Using the GET method for the request
        }).done(response => $('#result').html(response)) // If the request is successful,
            // display the response in the element with id 'result'
            .fail(() => alert('There was a problem with the request.')); // If the request fails, show an alert message
    });
});

