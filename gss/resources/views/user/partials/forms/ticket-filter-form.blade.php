<form method="GET" action="/tickets">
    <h6>Ticket Type</h6>
    <hr>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="services" value="1"
               name="type_id[]">
        <label class="form-check-label" for="services">Services</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="consumables" value="2"
               name="type_id[]">
        <label class="form-check-label" for="consumables">Consumables</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="capitalequipments" value="3"
               name="type_id[]">
        <label class="form-check-label" for="capitalequipments">Capital Equipments</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="hallbookings" value="4"
               name="type_id[]">
        <label class="form-check-label" for="hallbookings">Hall Bookings</label>
    </div>
    <hr>
    <h6>Ticket Status</h6>
    <hr>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="pending" value="1"
               name="status_id[]">
        <label class="form-check-label" for="pending">Pending</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inprogress" value="2"
               name="status_id[]">
        <label class="form-check-label" for="inprogress">In Progress</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="onhold" value="3"
               name="status_id[]">
        <label class="form-check-label" for="onhold">On Hold</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="closed" value="4"
               name="status_id[]">
        <label class="form-check-label" for="closed">Closed</label>
    </div>
    <hr>

    <button class="btn btn-success" type="submit">Apply</button>
    <a href="/tickets" class="btn btn-primary" type="submit">Clear</a>
</form>
