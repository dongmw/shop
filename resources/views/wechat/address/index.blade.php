@extends('wechat.layout.application')

@section('content')
    <div class="page-address-list" data-log="地址列表">
        <div class="address-choose">
            <ul class="ui-list">

                @foreach ($addresses as $a)
                    <li class="ui-list-item" data-id="{{$a->id}}">
                        <p class="ui_fz30">
                            <span class="consignee">{{$a->name}}</span>
                            <span>{{$a->tel}}</span>
                        </p>
                        <p>{{$a->province}} {{$a->city}} {{$a->area}}</p>
                        <p>{{$a->detail}}</p>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="add">
            <a href="/address/create" class="ui-button ui-button-active">
                <span>新建地址</span>
            </a>
        </div>
        <div class="popup-risk-check"></div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("li").click(function () {
                var address_id = $(this).data("id");
                $.ajax({
                    type: "PATCH",
                    url: "",
                    data: {address_id: address_id},
                    success: function (data) {
//                        console.log(data);
                        location.href = '/order/checkout';
                    }
                })
            })
        })
    </script>
@endsection