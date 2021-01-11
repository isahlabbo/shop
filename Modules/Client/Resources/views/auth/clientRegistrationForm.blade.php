
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<br>
		<div class="card">
                <div class="card-header card-header-primary">{{$message }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ $route ? $route : route('client.register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                
                                @include('registration.infor')
                                
                                @include('registration.loginInfor')

                                @include('registration.shop')
                                
                            </div>  

                            <div class="col-md-6">

                                @include('registration.address')

                                @include('registration.relationShip')
                                
                                @include('registration.referral')
                                
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ isset($component['data']) ? 'Update' : 'Register' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
	</div>
</div>