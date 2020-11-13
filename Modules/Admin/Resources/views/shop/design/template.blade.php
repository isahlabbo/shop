
<div class="col-md-3">
    <div class="card shadow">
        <div class="card-body shadow">
            <img src="{{storage_url($design->design_image)}}" height="150">
            <table>
                <tr>
                    <td><b>Description:</b> </td>
                    <td>{{$design->description}}</td>
                </tr>
                <tr>
                    <td><b>Fee:</b> </td>
                    <td><b>#</b>{{$design->shopClientWork->fee ?? $design->fee}}</td>
                </tr>
                <tr>
                    <td><b>Status:</b> </td>
                    <td>{{$design->prove_image ? 'Trusted' : 'Not Trusted'}}</td>
                </tr>
                
                @if(admin())
                <tr>
                    <td><b>Requests</b></td>
                    <td><a href="{{route('admin.shop.design.request.index',[$design->shop->id,$design->id])}}" ><b>{{count($design->shopDesignRequests)}}</b> </a></td>
                </tr>
                <tr>
                    <td><b>Likes</b></td>
                    <td><a href="{{route('admin.shop.design.like.index',[$design->shop->id,$design->id])}}" ><b>{{count($design->shopDesignLikes)}}</b> </a></td>
                </tr>
                @endif
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                
            </table>
        </div>
        
        <div class="card-footer">
            <table>
                <tr>
                    <td><a href="{{route('client.shop.design.like',[$design->shop->id,$design->id])}}"><i class="fa fa-heart"></i> </a></td>
                    <td><b>{{count($design->shopDesignLikes)}}</b></td>
                    <td><a href="{{route('client.shop.design.request',[$design->shop->id,$design->id])}}" ><b>Request</b> </a></td>
                    <td><b>{{count($design->shopDesignRequests)}}</b></td>
                </tr>
            </table>
        </div>
        
    </div>
</div>