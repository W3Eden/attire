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

        $('body')
            .on('hove', '#_customize-input-heading_font', function () {
                $('#_customize-input-heading_font').chosen();
            })
            .on('click', '.attire-responsive-icons i', function () {
                var _this = $(this);
                $('.attire-responsive-icons i.active').removeClass('active');
                $('.attire-responsive-wrapper.active').removeClass('active');
                $(this).addClass('active');

                if (_this.hasClass('at-show-desktop-option')) {
                    $('.preview-desktop').click();
                    $('.attire-responsive-desktop').addClass('active');
                } else if (_this.hasClass('at-show-tablet-option')) {
                    $('.preview-tablet').click();
                    $('.attire-responsive-tablet').addClass('active');
                } else if (_this.hasClass('at-show-mobile-option')) {
                    $('.preview-mobile').click();
                    $('.attire-responsive-mobile').addClass('active');
                }
            });

    });

})(jQuery);
