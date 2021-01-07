<!-- modal -->
<div class="modal fade" id="grantor_{{$apparent->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <img src="{{storage_url($apparent->grantor->image)}}" height="200" width="200">	
            </div>
            <div class="modal-body">
            	<table>
	            	<tr>
	            		<td>Name</td>
	                    <td>{{$apparent->grantor->name}}</td>
                     </tr>
                     <tr>
                     	<td>Email</td>
	                    <td>{{$apparent->grantor->email}}</td>
	                </tr>
                    <tr>
                        <td>Phone</td>    
	                    <td>{{$apparent->grantor->phone}}</td>
	                </tr>
                    <tr>
                        <td>Gender</td>    
	                    <td>{{$apparent->grantor->gender->name ?? ''}}</td>
	                </tr>
                    <tr>
                        <td>Country</td>    
	                    <td>{{$apparent->grantor->address->area->town->lga->state->country->name}}</td>
	                </tr>
                    <tr>
                        <td>State</td>    
	                    <td>{{$apparent->grantor->address->area->town->lga->state->name}}</td>
	                </tr>
                    <tr>
                        <td>Local Government</td>    
	                    <td>{{$apparent->grantor->address->area->town->lga->name}}</td>
	                </tr>
	                <tr>
                        <td>Town</td>    
	                    <td>{{$apparent->grantor->address->area->town->name}}</td>
	                </tr>
	                <tr>
                        <td>Area</td>    
	                    <td>{{$apparent->grantor->address->area->name}}</td>
	                </tr>

	                <tr>
                        <td>Location</td>    
	                    <td>{{$apparent->grantor->address->name}}</td>
	                </tr>
                    
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


                