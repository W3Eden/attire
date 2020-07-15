(function ($) {
    $(document).ready(function () {

        // Custom range

        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();

            var min = parseInt($(this).prop('min'));
            var max = parseInt($(this).prop('max'));
            if (val > max) {
                val = max;
            } else if (val < min) {
                val = min;
            }
            $(this).parent().next().children('.cs-range-value').val(val);
            $(this).val(val);
        });

        $('input.cs-range-value').on('input change', function () {
            var val = $(this).val();
            $(this).parent().prev().children().val(val);
            $(this).parent().prev().children().trigger('change');
            $(this).val(val);
        });


        $('<br><hr/>').insertBefore('li#customize-control-body_font span.customize-control-title');
        $('<br><hr/>').insertBefore('li#customize-control-widget_content_font span.customize-control-title');
        $('<br><hr/>').insertBefore('li#customize-control-menu_dropdown_font span.customize-control-title');

        $('body').on('hove', '#_customize-input-heading_font', function () {
            $('#_customize-input-heading_font').chosen();
        });


    });
})(jQuery);
