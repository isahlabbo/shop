@if(isset($component['relation']) && $component['relation'])
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Relation Ship') }}</label>
    <div class="col-md-6">
        <select name="relation" id="" class="form-control">
            <option value="">Chose Relation</option>
            @foreach($relations as $relation)
                <option value="{{$relation->id}}">{{$relation->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif