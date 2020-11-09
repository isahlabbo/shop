$(document).ready(function(){
    $('select[name="lga"]').on('change',function(){
        var lga_id = $(this).val();
        if(lga_id){
            $.ajax({
               url: '/ajax/address/lga/'+lga_id+'/get-towns',
               type: 'GET',
               dataType: 'json',
               success: function(data){
                    $('select[name="town"]').empty();
                    $('select[name="town"]').append('<option value="">Select Town</option>');
                    $.each(data, function(key, value){
                        $('select[name="town"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="town"]').empty();
        }
    });
    
});