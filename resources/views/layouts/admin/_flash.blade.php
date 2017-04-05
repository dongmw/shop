@if (session('notice'))
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-success">
                {{ session('notice') }}
            </div>
        </div>
    </div>
@endif

@if (session('alert'))
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                {{ session('alert') }}
            </div>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                <h2>Oops~ There's something wrong!</h2>
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endif