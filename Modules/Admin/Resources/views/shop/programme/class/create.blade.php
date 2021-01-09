<!-- modal -->
<div class="modal fade" id="newClass" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<b class="text-danger h4">{{$programme->name}} New Class Registration</b>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.programme.class.register',[$shop->id, $programme->id])}}">
                    @csrf
            		<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class Start At') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="date" class="form-control @error('duration') is-invalid @enderror" name="start" value="{{ old('start') }}" required autocomplete="name" autofocus>
                            @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class End At') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" required autocomplete="name" autofocus>

                            @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
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


                