function deleteConsumer(customerId) {

    $.ajax({
        url: 'controllers/consumer/delete.php',

        data: {id: customerId},

        type: 'POST',

        dataType: 'json',
    });
    $("#" + customerId).remove();

}