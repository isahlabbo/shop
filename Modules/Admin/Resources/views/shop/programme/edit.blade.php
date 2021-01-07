<!-- modal -->
<div class="modal fade" id="programme_{{$programme->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<b class="text-danger h3">{{$programme->name}} Programme Edit</b>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.programme.update',[$shop->id, $programme->id])}}">
                    @csrf
            		<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $programme->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ $programme->duration }}" required autocomplete="name" autofocus>

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Programme Fee') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ $programme->fee }}" required autocomplete="name" autofocus>

                            @error('fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

            		<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('About Programme') }}</label>

                        <div class="col-md-8">
                            <textarea class="form-control" cols="30" rows="4" name="about">{{$programme->about}}</textarea>
                            @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Update') }}
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


                