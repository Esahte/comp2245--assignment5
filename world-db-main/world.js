$(document).ready(() => {
    const lookupBtn = $('#lookup');

    lookupBtn.click(() => {
        const input = $('#country').val();
        $.ajax('world.php?country='+input, {
            method: 'GET',
            data: {
                country: input
            }
        }).done(response => $('#result').html(response))
            .fail(() => alert('There was a problem with the request.'));
    });
});
