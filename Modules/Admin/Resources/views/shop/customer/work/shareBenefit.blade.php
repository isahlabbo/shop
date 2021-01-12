<!-- modal -->
<div class="modal fade" id="benefit_{{$work->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            {{'Share'}} #{{$work->shareableBalance()}} Benfit for the work Particepation	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.customer.work.benefit.share',[$work->shopClient->shop->id,$work->shopClient->client->id,$work->id])}}">
            		@csrf
            		@foreach($work->shopClient->shop->shopAdmins as $shopAdmin)
            		<div class="form-group">
                        <label class="text text-danger">{{$shopAdmin->admin->first_name}} {{$shopAdmin->admin->last_name}}</label>
                        <select class="form-control" name="{{$shopAdmin->admin->id}}[]">
                            <option value="{{$shopAdmin->admin->getBenefit($work)->percent ?? ''}}">{{$shopAdmin->admin->getBenefit($work)->percent ?? 'Choose Share Percent'}} %</option>
	                        @for($i = 0; $i <=100; $i++)
	                            <option value="{{$i}}">{{$i}} %</option>
	                        @endfor
                        </select>
                        <input type="text" class="form-control" value="{{$shopAdmin->admin->getBenefit($work)->amount ?? 'Amount Not available'}}" disabled="">
                    </div>
                    @endforeach
                    
                    <button class="btn-primary btn-block"><i class="fa fa-share"></i> Share</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->