<!-- modal -->
<div class="modal fade" id="update_{{$work->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form method="post" action="{{route('admin.shop.customer.work.update',[$work->shopClient->shop->id,$work->shopclient->id,$work->id])}}">
            		@csrf

            		<div class="form-group">
                        <label class="text text-danger">Work Description</label>
                        <textarea class="form-control" cols="20" rows="3" name="description">{{$work->description}}</textarea>
                        @error('available_bonus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

            		<div class="form-group">
                        <label class="text text-danger">Work Fee</label>
                        <input type="number" name="fee" class="form-control" value="{{$work->fee}}">
                        @error('available_bonus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text text-danger">Paid Fee/ Advance</label>
                        <input type="number" name="paid_fee" class="form-control" value="{{$work->paid_fee}}">
                        @error('pending_payment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text text-danger">Finishing Date</label>
                        <input type="date" name="finishing_date" class="form-control" value="{{$work->finishing_date}}">
                        @error('finishing_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text text-danger">Finishing Time</label>
                        <input type="time" name="finishing_time" class="form-control" value="{{$work->finishing_time}}">
                        @error('finishing_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button class="btn-primary btn-block">Update</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->