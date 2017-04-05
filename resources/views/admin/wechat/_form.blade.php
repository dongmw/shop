<div class="am-tab-panel am-fade  @if($index==0) am-in am-active  @endif"
     id="tab{{$index}}">
    <table class="am-table am-table-hover">
        <thead>
        <tr>
            <th>级别</th>
            <th>类型</th>
            <th>名称</th>
            <th>值</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>一级菜单：</td>
            <td>
                <select class="form-control am-form-field am-radius type" name="buttons[{{$index}}][type]">
                    <option value="click" @if(isset($button["type"]) and $button["type"] == 'click') selected @endif>
                        click
                    </option>

                    <option value="view" @if(isset($button["type"]) and $button["type"] == 'view') selected @endif>
                        view
                    </option>
                </select>
            </td>
            <td>
                <input type="text" name="buttons[{{$index}}][name]" value="{{$button['name'] or ''}}"
                       class="am-form-field am-radius">
            </td>
            <td>
                <input type="text" name="buttons[{{$index}}][value]"
                       @if (isset($button["key"]))
                            value="{{$button["key"]}}"
                       @elseif (isset($button["url"]))
                            value="{{$button["url"]}}"
                       @else
                            value=""
                       @endif

                       class="am-form-field am-radius">
            </td>
        </tr>

        @for ($i = 0; $i < 5; $i++)

            <tr>
                <td>二级菜单：{{$i+1}}</td>

                <td>
                    <select class="form-control am-form-field am-radius type"
                            name="buttons[{{$index}}][sub_button][{{$i}}][type]">
                        <option value="click"
                                @if(isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"]== 'click') selected @endif>
                            click
                        </option>

                        <option value="view"
                                @if(isset($button['sub_button']["$i"]["type"]) and $button['sub_button']["$i"]["type"] == 'view') selected @endif>
                            view
                        </option>
                    </select>
                </td>
                <td>
                    <input type="text" name="buttons[{{$index}}][sub_button][{{$i}}][name]"
                           value="{{$button['sub_button']["$i"]["name"] or ''}}"
                           class="am-form-field am-radius">
                </td>
                <td>
                    <input type="text" name="buttons[{{$index}}][sub_button][{{$i}}][value]"
                           @if (isset($button['sub_button']["$i"]["key"]))
                                value="{{$button['sub_button']["$i"]["key"]}}"
                           @elseif (isset($button['sub_button']["$i"]["url"]))
                                value="{{$button['sub_button']["$i"]["url"]}}"
                           @else
                                value=""
                           @endif

                           class="am-form-field am-radius">
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>
