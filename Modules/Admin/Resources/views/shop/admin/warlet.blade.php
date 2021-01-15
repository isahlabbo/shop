<!-- modal -->
<div class="modal fade" id="warlet_{{$shopAdmin->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<b class="text-danger h4">{{$shopAdmin->admin->first_name}} {{$shopAdmin->admin->last_name}} Warlet</b>
            </div>
            <div class="modal-body">
            	<table class="table">
	            	<tr>
	            		<td>Total Partispation Commission</td>
	            		<td>#{{$shopAdmin->totalParstispationCommission()}}</td>
	            	</tr>

	            	<tr>
	            		<td>Paid Partispation Commission</td>
	            		<td>#{{$shopAdmin->paidParstispationCommission()}}</td>
	            	</tr>

	            	<tr>
	            		<td>Balance Partispation Commission</td>
	            		<td>#{{$shopAdmin->balanceParstispationCommission()}}</td>
	            	</tr>

	            	<tr>
	            		<td>Agent Commission</td>
	            		<td># 0</td>
	            	</tr>

	            	<tr>
	            		<td>Debit Card Balance</td>
	            		<td># {{$shopAdmin->debitCardBalance()}}</td>
	            	</tr>
	            	
	            </table>
	            <form method="post" action="{{route('admin.shop.admin.pay',[$shopAdmin->id])}}">
	            	@csrf
	            	<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Give Cash') }}</label>

                        <div class="col-md-8">
                            <input type="number" class="form-control" placeholder="Enter the cash given to admin" name="paid">
                            @error('paid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Pay') }}
                            </button>
                        </div>
                    </div>
	            </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


                