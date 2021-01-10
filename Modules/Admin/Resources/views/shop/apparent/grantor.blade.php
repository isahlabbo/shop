<!-- modal -->
<div class="modal fade" id="grantor_{{$apparentProgrammeClass->apparent->id ?? 'k'}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <img src="{{storage_url($apparentProgrammeClass->apparent->grantor->image ?? '')}}" height="200" width="200">	
            </div>
            <div class="modal-body">
                <div class="car">
                    <div class="card-header card-header-primary">Grantor information</div>
                    <div class="card-body">
                    	<table>
        	            	<tr>
        	            		<td>Name</td>
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->name ?? ''}}</td>
                             </tr>
                             <tr>
                             	<td>Email</td>
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->email ?? ''}}</td>
        	                </tr>
                            <tr>
                                <td>Phone</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->phone ?? ''}}</td>
        	                </tr>
                            <tr>
                                <td>Gender</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->gender->name ?? ''}}</td>
        	                </tr>
                            <tr>
                                <td>Country</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->area->town->lga->state->country->name ?? ''}}</td>
        	                </tr>
                            <tr>
                                <td>State</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->area->town->lga->state->name ?? ''}}</td>
        	                </tr>
                            <tr>
                                <td>Local Government</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->area->town->lga->name ?? ''}}</td>
        	                </tr>
        	                <tr>
                                <td>Town</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->area->town->name ?? ''}}</td>
        	                </tr>
        	                <tr>
                                <td>Area</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->area->name ?? ''}}</td>
        	                </tr>

        	                <tr>
                                <td>Location</td>    
        	                    <td>{{$apparentProgrammeClass->apparent->grantor->address->name ?? ''}}</td>
        	                </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="car">
                    <div class="card-header card-header-primary">Apparent information</div>
                    <div class="card-body">
                        <table>   
                            <tr>
                                <td>Address</td>
                                <td>{{$apparentProgrammeClass->apparent->address->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{$apparentProgrammeClass->apparent->gender->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td>{{$apparentProgrammeClass->apparent->religion->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <td>Tribe</td>
                                <td>{{$apparentProgrammeClass->apparent->tribe->name ?? ''}}</td>
                            </tr>
                        </table>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


                