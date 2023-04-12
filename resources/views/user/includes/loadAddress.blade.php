<script>
    $.ajax({
        url: "{{ route('user.province') }}",
        type: 'GET',
        success: function(result) {
            $('#provinces').append(result)
        },
    })
    $(document).on('change', '#provinces', function() {
        let id = $(this).val()
        var url = '{{ route('user.district', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'GET',
            success: function(result) {
                    $('#districts').empty()
                $('#wards').empty()
                $('#districts').append(result)
            },
        })
    })
    $(document).on('change', '#districts', function() {
        let id = $(this).val()
        var url = '{{ route('user.ward', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url:url,
            type: 'GET',
            success: function(result) {
                $('#wards').empty()
                $('#wards').append(result)
            },
        })
    })
</script>
