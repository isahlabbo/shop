<!-- modal -->
<div class="modal fade" id="schedul_{{$schedule->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	<b class="text-danger h3">{{$schedule->week}} Schedule Information</b>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.programme.schedule.update',[$shop->id,$programme->id,$schedule->id])}}">
                    @csrf
            		<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Topic') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="topic" value="{{ $schedule->topic }}" required autocomplete="name" autofocus>

                            @error('topic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

            		<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Objectives') }}</label>

                        <div class="col-md-8">
                            <textarea class="form-control" cols="30" rows="4" name="objective">{{$schedule->objective}}</textarea>
                            @error('objective')
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


                