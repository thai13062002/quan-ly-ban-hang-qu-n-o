<script>
    jQuery(
            '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
            )
        .insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
</script>
{{-- 
<script>
    $(document).on('click', '.color-ajax', function() {
        let product_id = $(this).val()
        let color_id = $(this).val()
        var url = '{{ route('user.colorsize', [':product_id', ':color_id']) }}';
        url = url.replace(':product_id', product_id);
        url = url.replace(':color_id', color_id);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(result) {
                $('#quantity').text(result['quantity'])
                // if (parseInt(result) <= 0) {
                //     disabledAddToCart(true)
                // } else {
                //     disabledAddToCart(false)
                // }
            },
            error: function(error) {
                console.log('www', error);
            }
        })
    })
</script> --}}
