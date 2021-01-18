<!-- modal -->
<div class="modal fade" id="more_{{$shopClient->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<table>
	            	<tr>
	            		<td>Family Members</td>
	                    <td>
	                    <a href="{{route('admin.shop.customer.family.member.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
	                        {{count($shopClient->client->clientFamilyMembers)}}
	                    </a>
	                    </td>
                     </tr>
                     <tr>
                     	<td>Works</td>
	                    <td>
	                        <a href="{{route('admin.shop.customer.work.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
	                        {{count($shopClient->shopClientWorks)}}
	                        </a>
	                    </td>
	                </tr>
                    <tr>
                        <td>Finished Works</td>    
	                    <td>{{count($shopClient->shopClientWorks->where('status',1))}}</td>
	                </tr>
                    <tr>
                        <td>Un Finish Works</td>    
	                    <td>{{count($shopClient->shopClientWorks->where('status',0))}}</td>
	                </tr>
                    <tr>
                        <td>Bonus</td>    
	                    <td>0</td>
	                </tr>
                    <tr>
                        <td>Referral code</td>    
	                    <td>{{$shopClient->client->referral_code}}</td>
	                </tr>
                    <tr>
                        <td>E-mail Address</td>    
	                    <td>{{$shopClient->client->email}}</td>
	                </tr>
                    <tr>    
	                    <td>
	                        <a href="{{route('admin.shop.customer.edit',[$shop->id,$shopClient->client->id])}}">
	                        <button class="btn-primary btn">
	                            Edit
	                        </button>
	                        </a>
	                        <a href="{{route('admin.shop.customer.delete',[$shop->id,$shopClient->id])}}" onclick="return confirm('are you sure you want delete this costomer from your shop')">
		                        <button class="btn-secondary btn">
		                            Delete
		                        </button>
		                    </a>
	                        <a href="{{route('admin.shop.customer.measurement.index',[$shop->id,$shopClient->client->id])}}">
	                            <button class="btn-primary btn">
	                            Measurement
	                            </button>
	                        </a> 
	                    </td>
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


                