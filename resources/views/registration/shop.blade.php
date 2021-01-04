@if(isset($component['shop']) && $component['shop'])
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Chose Shop') }}</label>
    <div class="col-md-6">
        <select name="shop" id="" class="form-control">
            <option value="">Chose Shop</option>
            @foreach(admin()->shops as $shop)
                <option value="{{$shop->id}}">{{$shop->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif