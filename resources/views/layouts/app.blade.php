@include('layouts.head')

    <div id="app" style="margin-top: -25px;">

        @include('layouts.header')


        <main class="py-4">
            @yield('content')
        </main>

    </div>
<script>
    $(document).ready(function() {
    $('.save-property').on('click', function() {
        var propertyId = $(this).data('property-id');
        $.ajax({
            url: "{{ route('property.save') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                property_id: propertyId
            },
            success: function(response) {
                if (response.status == 'success') {
                    $('.save-' + propertyId).hide();
                    $('.unsave-' + propertyId).show();
                    $('.unsave-' + propertyId).css('background-color', 'red');
                    showAlert(response.message, 'success');
                } else {
                    showAlert(response.message, 'danger');
                }
            }
        });
    });

    $('.unsave-property').on('click', function() {
        var propertyId = $(this).data('property-id');
        $.ajax({
            url: "{{ route('property.unsave') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                property_id: propertyId
            },
            success: function(response) {
                if (response.status == 'success') {
                    $('.unsave-' + propertyId).hide();
                    $('.save-' + propertyId).show();
                    showAlert(response.message, 'success');
                } else {
                    showAlert(response.message, 'danger');
                }
            }
        });
    });

    function showAlert(message, type) {
        var alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        $('.alert-container').append(alert);
        setTimeout(function() {
            alert.alert('close');
        }, 3000);
    }
});
</script>
<!-- Alert Container -->
<div class="alert-container" style="position: fixed; top: 10px; right: 10px; z-index: 1050;"></div>
    @include('layouts.footer')

</body>
</html>
