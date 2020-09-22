$(document).ready(function(){
    $('select[name="grantor_state"]').on('change',function(){
        var grantor_state_id = $(this).val();
        console.log(grantor_state_id);
        if(grantor_state_id){
            $.ajax({
               url: '/ajax/address/state/'+grantor_state_id+'/get-lgas',
               type: 'GET',
               dataType: 'json',
               success: function(data){
                    $('select[name="grantor_lga"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="grantor_lga"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="grantor_lga"]').empty();
        }
    });
    
});