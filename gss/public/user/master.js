$(function () {

    /* ----------------------------------------------------------------------
                                ALL PAGES
    ---------------------------------------------------------------------- */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* ----------------------------------------------------------------------
                                Service Request - Page
    ---------------------------------------------------------------------- */

    $("#category").change(function () {
        $.ajax({
            url: "/get-service-categories/" + $(this).val(),
            method: 'GET',
            success: function (Response) {
                $('#subcategory').html(Response.html);
            }
        });
    });

    $("#block").change(function () {
        $.ajax({
            url: "/get-service-departments/" + $(this).val(),
            method: 'GET',
            success: function (Response) {
                $('#department').html(Response.html);
            }
        });
    });

    $("#department").change(function () {
        $.ajax({
            url: "/get-service-floors/" + $(this).val(),
            method: 'GET',
            success: function (Response) {
                $('#floor').html(Response.html);
            }
        });
    });

    $("#floor").change(function () {
        $.ajax({
            url: "/get-service-rooms/" + $('#block').val() + "/" + $('#department').val() + "/" + $(this).val(),
            method: 'GET',
            success: function (Response) {
                $('#room').html(Response.html);
            }
        });
    });

    /* ----------------------------------------------------------------------
                                Service Details - Modal
    ---------------------------------------------------------------------- */

    $('.service-show').on('click', function () {
        var ticketId = $(this).attr('id');

        $.ajax({
            url: "/ticket/" + ticketId,
            type: "get",
            dataType: "json",
            success: function (data) {

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
                $('#service-assetcode').html(data.service.assetcode ? data.service.assetcode : 'No Data Available');
                $('#service-created_at').html(data.ticket.created_at);
                $('#service-updated_at').html(data.ticket.updated_at);
                $('#service-status').html(data.ticket.status.status);
                $('#service-userId').html(data.ticket.user.id);
                $('#service-description').html(data.service.description);
                $('#service-worker').html(data.serviceAction ? data.serviceAction.worker.name : 'No Data Available');
                $('#service-priority').html(data.service.priority.priority);

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    /* ----------------------------------------------------------------------
                                Service Action - Modal
    ---------------------------------------------------------------------- */
    var serviceId;
    $('.service-action').on('click', function () {

        serviceId = $(this).attr('id'); // If Triggered from Service-Details Modal
        $('#service-action-modal').modal('show');
    });

    $('#service-action-form').submit(function (event) {

        if (!serviceId) { // If Triggered from Service-Details Page
            serviceId = $('#service-id').html();
        }

        $.ajax({
            url: "/service-action/" + serviceId,
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                $('#service-action-form')[0].reset();
                $("#service-action-errors-box").hide();
                $("#service-action-errors").html('');
                $("#service-action-success-box").fadeIn('slow').delay(3000).fadeOut('slow');

                if (document.URL.includes("service-details")) { // If Action was taken from Service-Details Page
                    setInterval('location.reload()', 5000);
                }
            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#service-action-errors").html('<li>' + message + '</li>');
                });

                $("#service-action-success-box").hide();
                $("#service-action-errors-box").fadeIn('slow').delay(3000).fadeOut('slow');
            }
        });
        event.preventDefault();

    });

    $('#service-action-modal').on('hidden.bs.modal', function () {
        $("#service-action-errors-box").hide();
        $("#service-action-errors").html('');
        $("#service-action-success-box").hide();
        $('#service-action-form')[0].reset();
    });

    /* ----------------------------------------------------------------------
                                Ticket Delete - Modal
    ---------------------------------------------------------------------- */
    var ticketId;
    $('.service-delete').on('click', function () {

        ticketId = $(this).attr('id'); // If Triggered from Ticket-Delete Modal
        $('#ticket-delete-modal').modal('show');
    });

    $('#ticket-delete-btn').click(function (event) {

        if (!ticketId) { // If Triggered from Ticket-Details Page
            ticketId = $('#ticket-id').html();
        }

        $.ajax({
            url: "/ticket-delete/" + ticketId,
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                $("#ticket-delete-errors-box").hide();
                $("#ticket-delete-errors").html('');
                $("#ticket-delete-success-box").fadeIn('slow').delay(3000).fadeOut('slow');

                if (document.URL.includes("ticket-details")) { // If Action was taken from Service-Details Page
                    setInterval('window.location.assign("/tickets")', 5000);
                }
            },
            error: function (error) {
                $("#ticket-delete-errors").html('<li>' + error.statusText + '</li>');
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#ticket-delete-errors").html('<li>' + message + '</li>');
                });

                $("#ticket-delete-success-box").hide();
                $("#ticket-delete-errors-box").fadeIn('slow').delay(3000);
            }
        });
        event.preventDefault();

    });

    $('#ticket-delete-modal').on('hidden.bs.modal', function () {
        $("#ticket-delete-errors-box").hide();
        $("#ticket-delete-errors").html('');
        $("#ticket-delete-success-box").hide();
    });

    /* ----------------------------------------------------------------------
                                Permission Delete - Modal
    ---------------------------------------------------------------------- */
    let permissionId, userId;
    $('.user-permission-delete').on('click', function () {

        permissionId = $(this).attr('data-permission-id'); // If Triggered from Permission-Delete Modal
        userId = $(this).attr('data-user-id');
        $('#permission-delete-modal').modal('show');
    });

    $('#permission-delete-btn').click(function (event) {

         $.ajax({
            url: "/user-permission-delete/" + userId + '/' + permissionId,
            type: "post",
            success: function (data) {
                $("#user-permission-delete-errors-box").hide();
                $("#user-permission-delete-errors").html('');
                $("#user-permission-delete-success-box").fadeIn('slow').delay(3000).fadeOut('slow');
                setInterval('location.reload()', 5000);

            },
            error: function (error) {
                $("#user-permission-delete-errors").html('<li>' + error.statusText + '</li>');
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#user-permission-delete-errors").html('<li>' + message + '</li>');
                });

                $("#user-permission-delete-success-box").hide();
                $("#user-permission-delete-errors-box").fadeIn('slow').delay(3000);
            }
        });

        event.preventDefault();
    });

});

