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

    var permissionId, userId;
    $('.user-permission-delete-btn').on('click', function () {

        permissionId = $(this).attr('data-permission-id'); // If Triggered from Permission-Delete Modal
        userId = $(this).attr('data-user-id');
        $('#permission-delete-modal').modal('show');
    });

    $('#user-permission-delete-btn').click(function (event) {

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

    /* ----------------------------------------------------------------------
                     User  Permissions Edit - Modal
    ---------------------------------------------------------------------- */

    var userId;
    $('.user-permissions-edit-btn').on('click', function () {

        userId = $(this).attr('data-user-id'); // If Triggered from Edit User Permissions Modal
        $('#user-permissions-edit-modal').modal('show');
    });

    $('#user-permissions-edit-form').submit(function (event) {

        $.ajax({
            url: "/user-permissions-edit/" + userId,
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                $('#user-permissions-edit-form')[0].reset();
                $("#user-permissions-edit-errors-box").hide();
                $("#user-permissions-edit-errors").html('');
                $("#user-permissions-edit-success-box").fadeIn('slow').delay(3000).fadeOut('slow');

                setInterval('location.reload()', 5000);

            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#user-permissions-edit-errors").html('<li>' + message + '</li>');
                });
                $("#user-permissions-edit-success-box").hide();
                $("#user-permissions-edit-errors-box").fadeIn('slow').delay(3000).fadeOut('slow');
            }
        });
        event.preventDefault();

    });

    /* ----------------------------------------------------------------------
                      User Delete - Modal
---------------------------------------------------------------------- */

    let userToBeDeleted;
    $('.user-delete').on('click', function () {

        userToBeDeleted = $(this).attr('id');
        $('#user-delete-modal').modal('show');
        $('#user-id-delete').html(userToBeDeleted);
    });

    $('#user-delete-form').submit(function (event) {

        $.ajax({
            url: "/user-delete/" + userToBeDeleted,
            type: "post",
            success: function (response) {
                $('#user-delete-modal').modal('hide');

                if (response.status) {
                    $("#manage-users-errors-box").hide();
                    $("#manage-users-errors").html('');
                    $("#manage-users-success-box").fadeIn('slow').delay(3000).fadeOut('slow');
                    $('#manage-users-success').html(response.message);

                    setInterval('location.reload()', 5000);
                } else {
                    $("#manage-users-errors").html(
                        '<li> Some Error Occurred :</li>' +
                        '<li>' + response.message + '</li>');
                    console.log(response.errors);
                    $("#manage-users-success-box").hide();
                    $("#manage-users-errors-box").fadeIn('slow');
                }
            },
            error: function (error) {
                $('#user-delete-modal').modal('hide');
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#manage-users-errors").html(
                        '<li> Some Error Occurred :</li>' +
                        '<li>' + message + '</li>');
                });
                $("#manage-users-success-box").hide();
                $("#manage-users-errors-box").fadeIn('slow');
            }
        });
        event.preventDefault();

    });

        /* ----------------------------------------------------------------------
                      Role Permission Edit - Modal
---------------------------------------------------------------------- */


var roleId;
    $('.role-permissions-edit-btn').on('click', function () {

        roleId = $(this).attr('data-role-id'); 
        $('#role-permissions-edit-modal').modal('show');
    });

    $('#role-permissions-edit-form').submit(function (event) {

        $.ajax({
            url: "/role-permissions-edit/" + roleId,
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                $('#role-permissions-edit-form')[0].reset();
                $("#role-permissions-edit-errors-box").hide();
                $("#role-permissions-edit-errors").html('');
                $("#role-permissions-edit-success-box").fadeIn('slow').delay(3000).fadeOut('slow');
                $('#role-permissions-edit-modal').modal('hide');
               
                location.reload();

            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (field, message) {
                    $("#role-permissions-edit-errors").html('<li>' + message + '</li>');
                });
                $("#role-permissions-edit-success-box").hide();
                $("#role-permissions-edit-errors-box").fadeIn('slow').delay(3000).fadeOut('slow');
            }
        });
        event.preventDefault();

    });



});

