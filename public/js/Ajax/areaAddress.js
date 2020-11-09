
$(document).ready(function(){
    $('select[name="area"]').on('change',function(){
        var area_id = $(this).val();
        if(area_id){
            $.ajax({
                url: '/ajax/address/area/'+area_id+'/get-addresses',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="address"]').empty();
                    $('select[name="address"]').append('<option value="">Select Address</option>');
                    $.each(data, function(key, value){
                        $('select[name="address"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="address"]').empty();
        }
    });
});