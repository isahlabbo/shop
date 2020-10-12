<br>
<div class="card">
    <div class="card-header" style="background-color: black; color: white">{{ $client->first_name }} {{ $client->last_name }} measurement</div>

    <div class="card-body">
        <form method="POST" action="{{admin() ? route('admin.shop.customer.measurement.update',[$shop->id,$client->id]) : route('client.measurement.update',[$client->id])}}">
            @csrf
           
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Shoulder</label>

                <div class="col-md-6">
                    <input id="shoulder" type="number" class="form-control @error('shoulder') is-invalid @enderror" name="shoulder" value="{{ $client->measurement()->shoulder }}" required autocomplete="shoulder" autofocus>
                    @error('shoulder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Full Gown Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('password') is-invalid @enderror" name="full_gown_length" required autocomplete="current-password" value="{{ $client->measurement()->full_gown_length }}">

                    @error('full_gown_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Half Gown Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('password') is-invalid @enderror" name="half_gown_length" required autocomplete="current-password" value="{{ $client->measurement()->half_gown_length }}">

                    @error('half_gown_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Full Hand Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('full_hand_length') is-invalid @enderror" name="full_hand_length" required autocomplete="current-password" value="{{ $client->measurement()->full_hand_length }}">

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
                    <input id="password" type="number" class="form-control @error('half_hand_length') is-invalid @enderror" name="half_hand_length" required autocomplete="current-password" value="{{ $client->measurement()->half_hand_length }}">

                    @error('half_hand_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Hand Width</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('hand_width') is-invalid @enderror" name="hand_width" required autocomplete="current-password" value="{{ $client->measurement()->hand_width }}">

                    @error('hand_width')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Blouse Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('blouse_length') is-invalid @enderror" name="blouse_length" required autocomplete="current-password" value="{{ $client->measurement()->blouse_length }}">

                    @error('blouse_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Bonse</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('bonse') is-invalid @enderror" name="bonse" required autocomplete="current-password" value="{{ $client->measurement()->bonse }}">

                    @error('bonse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Under Bonse</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('under_bonse') is-invalid @enderror" name="under_bonse" required autocomplete="current-password" value="{{ $client->measurement()->under_bonse }}">

                    @error('under_bonse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Half Cut</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('half_cut') is-invalid @enderror" name="half_cut" required autocomplete="current-password" value="{{ $client->measurement()->half_cut }}">

                    @error('half_cut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Flip Play</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('flip_play') is-invalid @enderror" name="flip_play" required autocomplete="current-password" value="{{ $client->measurement()->flip_play }}">

                    @error('flip_play')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Sket Length</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('sket_length') is-invalid @enderror" name="sket_length" required autocomplete="current-password" value="{{ $client->measurement()->sket_length }}">

                    @error('sket_length')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Waist</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('waist') is-invalid @enderror" name="waist" required autocomplete="current-password" value="{{ $client->measurement()->waist }}">

                    @error('waist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Hip</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('hip') is-invalid @enderror" name="hip" required autocomplete="current-password" value="{{ $client->measurement()->hip }}">

                    @error('hip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Under Hip</label>

                <div class="col-md-6">
                    <input id="password" type="number" class="form-control @error('password') is-invalid @enderror" name="under_hip" required autocomplete="current-password" value="{{ $client->measurement()->under_hip }}">

                    @error('under_hip')
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
