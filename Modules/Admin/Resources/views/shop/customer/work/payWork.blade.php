<!-- modal -->
<div class="modal fade" id="work_{{$work->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.customer.work.pay',[$work->shopClient->shop->id,$work->shopClient->client->id,$work->id])}}">
            		@csrf
            		<div class="form-group">
                        <label class="text text-danger">Available Bonus</label>
                        <input type="number" disabled="" name="available_bonus" class="form-control" value="{{$work->shopClient->client->availableBonusBalance()}}">
                        @error('available_bonus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text text-danger">Pending Payment</label>
                        <input type="number" disabled="" name="pending_payment" class="form-control" value="{{$work->pendingPayment()}}">
                        @error('pending_payment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="text text-danger">Payment Method</label>
                        <select class="form-control" name="payment_method">
                        	@if($work->shopClient->client->availableBonusBalance() >= $work->pendingPayment())
                                <option value="bonus">Pay With Bonus</option>
	                        @elseif($work->shopClient->client->availableBonusBalance() < $work->pendingPayment() && $work->shopClient->client->availableBonusBalance() > 0)
	                            <option value="bonus and cash">Pay With Bonus And Cash</option>
	                        @else
	                            <option value="cash">Pay With Cash</option>
	                        @endif    
                        </select>
                        @error('payment_method')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
               
                    @if($work->shopClient->client->availableBonusBalance() < $work->pendingPayment())
                        <div class="form-group">
	                        <label class="text text-danger">Cash Payment</label>
	                        <input type="number" name="cash" class="form-control" value="{{$work->pendingPayment() - $work->shopClient->client->availableBonusBalance()}}" placeholder="Pls collect the cash and enter figure here">
	                        @error('cash')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
                    @endif
                    <button class="btn-primary btn-block">Pay</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->