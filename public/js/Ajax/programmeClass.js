
$(document).ready(function(){
    $('select[name="programme"]').on('change',function(){
        var programme_id = $(this).val();
        if(programme_id){
            $.ajax({
                url: '/ajax/programme/'+programme_id+'/get-classes',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="class"]').empty();
                    $('select[name="class"]').append('<option value="">Select Class</option>');
                    $.each(data, function(key, value){
                        $('select[name="class"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="class"]').empty();
        }
    });
});