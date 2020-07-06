<style>
    #flash-message {
        position: absolute;
        margin: 20px;
        right: 0;
        z-index: 10;
    }
</style>

<script>
    setTimeout(function() {
        $('#flash-message').fadeOut('slow');
    }, 3000);
</script>

@if ($flash = session('message'))
<div id="flash-message" class="alert alert-success" role="alert">
    {{ $flash }}
</div>
@endif