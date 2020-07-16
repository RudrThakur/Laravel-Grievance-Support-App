$(function() {

    /* ----------------------------------------------------------------------
                                ALL PAGES
    ---------------------------------------------------------------------- */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* ----------------------------------------------------------------------
                                Service- Page
    ---------------------------------------------------------------------- */

    $("#category").change(function() {
        $.ajax({
            url: "/get-service-categories/" + $(this).val(),
            method: 'GET',
            success: function(Response) {
                $('#subcategory').html(Response.html);
            }
        });
    });

    $("#block").change(function() {
        $.ajax({
            url: "/get-service-departments/" + $(this).val(),
            method: 'GET',
            success: function(Response) {
                $('#department').html(Response.html);
            }
        });
    });

    $("#department").change(function() {
        $.ajax({
            url: "/get-service-floors/" + $(this).val(),
            method: 'GET',
            success: function(Response) {
                $('#floor').html(Response.html);
            }
        });
    });

    $("#floor").change(function() {
        $.ajax({
            url: "/get-service-rooms/" + $('#block').val() + "/" + $('#department').val() + "/" + $(this).val(),
            method: 'GET',
            success: function(Response) {
                $('#room').html(Response.html);
            }
        });
    });

    /* ----------------------------------------------------------------------
                                Service Details - Modal
    ---------------------------------------------------------------------- */

    $('.service-show').on('click', function() {
        var ticketId = $(this).attr('id');

        $.ajax({
            url: "/ticket-details/" + ticketId,
            type: "get",
            dataType: "json",
            success: function(data) {
                $('#service-details-modal').modal('show');
                $('#service-ticketId').html(data.ticket.id);
                $('#service-category').html(data.service.category);
                $('#service-user-name').html(data.ticket.user.name);
                $('#service-department').html(data.service.department);
                $('#service-subcategory').html(data.service.subcategory);
                $('#service-holder').html(data.ticket.authority.name);
                $('#service-block').html(data.service.block);
                $('#service-floor').html(data.service.floor);
                $('#service-room').html(data.service.room);
                $('#service-quantity').html(data.service.quantity);
                $('#service-assetcode').html(data.service.assetcode);
                $('#service-created_at').html(data.ticket.created_at);
                $('#service-updated_at').html(data.ticket.updated_at);
                $('#service-status').html(data.ticket.status.status);
                $('#service-userId').html(data.ticket.user.id);
                $('#service-description').html(data.service.description);
                // $('#service-worker').html(data.service.worker.name);  
                $('#service-priority').html(data.service.priority.priority);

            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    /* ----------------------------------------------------------------------
                                Service Action - Modal
    ---------------------------------------------------------------------- */
    var serviceId;
    $('.service-action').on('click', function() {

        serviceId = $(this).attr('id'); // If Triggered from Service-Details Modal
        $('#service-action-modal').modal('show');
    });

    $('#service-action-form').submit(function(event) {

        if (!serviceId) { // If Triggered from Service-Details Page
            serviceId = $('#service-id').html();
        }

        $.ajax({
            url: "/service-action/" + serviceId,
            type: "post",
            data: $(this).serialize(),
            success: function(data) {
                $('#service-action-form')[0].reset();
                $("#service-action-errors-box").hide();
                $("#service-action-errors").html('');
                $("#service-action-success-box").fadeIn('slow').delay(3000).fadeOut('slow');
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(field, message) {
                    $("#service-action-errors").html('<li>' + message + '</li>');
                });
                $('#service-action-errors').html('<li>Status: ' + error.statusText + '</li>');
                $("#service-action-success-box").hide();
                $("#service-action-errors-box").fadeIn('slow').delay(3000).fadeOut('slow');
            }
        });
        event.preventDefault();

    });

    $('#service-action-modal').on('hidden.bs.modal', function() {
        $("#service-action-errors-box").hide();
        $("#service-action-errors").html('');
        $("#service-action-success-box").hide();
        $('#service-action-form')[0].reset();
    });

});