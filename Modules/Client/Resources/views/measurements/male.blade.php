<br>
<div class="card">
    <div class="card-header" style="background-color: black; color: white">{{ $client->first_name }} {{ $client->last_name }} measurement</div>

    <div class="card-body">
        <form method="POST" action="{{$route ?? '' ? $route ?? '' : route('client.measurement.update',[$client->id])}}">
            @csrf
           
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Shoulder</label>

                <div class="col-md-6">
                    <input id="shoulder" type="number" class="form-control @error('shoulder') is-invalid @enderror" name="shoulder" required autocomplete="shoulder" autofocus value="{{$client->measurement()->shoulder}}">

                    @error('shoulder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Full Shirt Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('full_shirt_length') is-invalid @enderror" name="full_shirt_length" required autocomplete="current-password" value="{{$client->measurement()->full_shirt_length}}">

                    @error('full_shirt_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Half Shirt Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('full_shirt_length') is-invalid @enderror" name="half_shirt_length" required autocomplete="current-password" value="{{$client->measurement()->half_shirt_length}}">

                    @error('half_shirt_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Full Hand Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('full_hand_length') is-invalid @enderror" name="full_hand_length" required autocomplete="current-password" value="{{$client->measurement()->full_hand_length}}">

                    @error('full_hand_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Half Hand Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('half_hand_length') is-invalid @enderror" name="half_hand_length" required autocomplete="current-password" value="{{$client->measurement()->half_hand_length}}">

                    @error('half_hand_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Arm Width</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('arm_width') is-invalid @enderror" name="arm_width" required autocomplete="current-password" value="{{$client->measurement()->arm_width}}">

                    @error('arm_width')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">clip Width</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('clip_width') is-invalid @enderror" name="clip_width" required autocomplete="current-password" value="{{$client->measurement()->clip_width}}">

                    @error('clip_width')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Chest</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('chest') is-invalid @enderror" name="chest" required autocomplete="current-password" value="{{$client->measurement()->chest}}">

                    @error('chest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Under Chest</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('under_chest') is-invalid @enderror" name="under_chest" required autocomplete="current-password" value="{{$client->measurement()->under_chest}}">

                    @error('under_chest')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Neck</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('neck') is-invalid @enderror" name="neck" required autocomplete="current-password" value="{{$client->measurement()->neck}}">

                    @error('neck')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Trouser Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('trouser_length') is-invalid @enderror" name="trouser_length" required autocomplete="current-password"
                    value="{{$client->measurement()->trouser_length}}">

                    @error('trouser_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Waist</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('waist') is-invalid @enderror" name="waist" required autocomplete="current-password" value="{{$client->measurement()->waist}}">

                    @error('waist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Under waist</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('password') is-invalid @enderror" name="under_waist" required autocomplete="current-password" value="{{$client->measurement()->under_waist}}">

                    @error('under_waist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Save') }}
            </button>

        </form>
    </div>
</div>
