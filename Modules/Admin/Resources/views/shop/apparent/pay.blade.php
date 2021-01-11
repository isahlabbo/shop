<!-- modal -->
<div class="modal fade" id="pay_{{$apparentProgrammeClass->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header card-header-primary">Apparent Payment information</div>
                    <div class="card-body">
                    	<form method="post" action="{{route('admin.shop.apparent.pay',[$shop->id, $apparentProgrammeClass->id])}}">
                    		@csrf
                    		<div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="amount" value="{{$apparentProgrammeClass->pendingPayment() }}" required autocomplete="name" autofocus>
                                        @error('amount')
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
                </div>     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


                