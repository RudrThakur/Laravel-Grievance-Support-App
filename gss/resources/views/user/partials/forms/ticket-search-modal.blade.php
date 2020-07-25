<div class="modal fade" id="ticket-search-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Search</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="GET" action="/tickets">
                    <h6>Search By User Name</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_name" id="user-name"
                               aria-describedby="user-name" placeholder="Enter Name">
                    </div>
                    <hr>
                      <h6>Search By User ID</h6>
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_id" id="user-id"
                               aria-describedby="user-id" placeholder="Enter User ID">
                    </div>
                    <hr>
                    <button class="btn btn-success" type="submit">Apply</button>
                    <a href="/tickets" class="btn btn-primary" type="submit">Clear</a>
                </form>

            </div>
        </div>
    </div>
</div>
