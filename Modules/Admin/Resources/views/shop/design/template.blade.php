
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
                    <td><a href="#" ><b>{{count($design->shopDesignRequests)}}</b> </a></td>
                </tr>
                <tr>
                    <td><b>Likes</b></td>
                    <td><a href="#" ><b>{{count($design->shopDesignLikes)}}</b> </a></td>
                </tr>
                @endif

                
                <tr>
                    <td></td>
                    <td><a href="#" ><b>Make Request</b> </a></td>
                </tr>
                
            </table>
        </div>
        
        <div class="card-footer">
            <table>
                <tr>
                    <td width="150"><a href=""><i class="fa fa-heart"></i> </a>{{count($design->shopDesignLikes)}}</td>
                </tr>
            </table>
        </div>
        
    </div>
</div>