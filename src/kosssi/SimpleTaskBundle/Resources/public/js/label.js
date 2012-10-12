jQuery(document).ready(function($) {
    $('#label_new').click(function(){

        $.get($(this).attr('href'), function(data) {
            $('#popup').html(data).show();
            $('#label_form_quit').click(function(){
                $('#popup').html('');
                $('#popup').hide();
            });
            $('#label_new_validate').click(function(){
                $('#popup').hide();
                $.post($("#label_form").attr('action'), $("#label_form").serialize(), function(data) {

                    $('#label_list').html($(data).children());
                    $('#popup').html('');
                });

                return false;
            });
        });

        return false;
    });
});