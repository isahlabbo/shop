<!-- modal -->
<div class="modal fade" id="bonus_{{$bonus->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header btn-secondary">
            Note that you can only clear the bonus if you pay the referral pls justify this	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.payment.bonus.clear',[$shop->id,$bonus->id])}}">
            		@csrf
            		<div class="form-group">
                        <label class="text text-danger">Cash Given</label>
                        <input type="number" name="amount" class="form-control" value="{{$bonus->pendingBonus()}}">
                        @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    
                   
                    <button class="btn-primary btn-block">Pay Bonus</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->