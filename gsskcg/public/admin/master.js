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
                                Service Details - Modal
    ---------------------------------------------------------------------- */

    $('.service-show').on('click', function() {
        var ticketId = $(this).attr('id');

        $.ajax({
            url: "/service-details/" + ticketId,
            type: "get",
            dataType: "json",
            success: function(data) {
                $('#service-details-modal').modal('show');
                $('#service-ticketId').html(data.ticket.id);
                $('#service-category').html(data.service.category);
                $('#service-user-name').html(data.ticket.user.name);
                $('#service-department').html(data.service.department);
                $('#service-subcategory').html(data.service.subcategory);
                $('#service-holder').html(data.ticket.authority.authority);
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
                // $('#service-worker').html(data.ticket.worker.name);  
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

    $('.service-action').on('click', function() {
        var ticketId = $(this).attr('id');
        $('#service-action-modal').modal('show');
        $('#service-action-form').submit(function(event) {
            $.ajax({
                url: "/service-action/" + ticketId,
                type: "post",
                dataType: "json",
                success: function(data) {
                    $("#service-action-errors-box").hide();
                    $("#service-action-errors").html('');
                    $("#service-action-success-box").show();
                },
                error: function(error) {
                    $("#service-action-success-box").hide();
                    $("#service-action-errors-box").show();
                    $.each(error.responseJSON.errors, function(field, message) {
                        $("#service-action-errors").html('<li>' + message + '</li>');
                    })
                }
            });
            event.preventDefault();

        });
    });

    $('#service-action-modal').on('hidden.bs.modal', function() {
        $("#service-action-errors-box").hide();
        $("#service-action-errors").html('');
        $("#service-action-success-box").hide();
    });
});