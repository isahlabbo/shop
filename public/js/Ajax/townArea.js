$(document).ready(function(){
    $('select[name="town"]').on('change',function(){
        var area_id = $(this).val();
        if(area_id){
            $.ajax({
               url: '/ajax/address/town/'+area_id+'/get-areas',
               type: 'GET',
               dataType: 'json',
               success: function(data){
                    $('select[name="area"]').empty();
                    $('select[name="area"]').append('<option value="">Select Area</option>');
                    $.each(data, function(key, value){
                        $('select[name="area"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="area"]').empty();
        }
    });
});