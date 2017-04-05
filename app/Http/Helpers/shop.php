<?php
/**是否显示
 * @param $brand
 * @return string
 */
function is_something($brand)
{
    if ($brand->is_show) {
        return '<span class="am-icon-check"></span>';
    } else {
        return '<span class="am-icon-close"></span>';
    }
}

/**
 * 商品选项
 */
//是否...
//function some_thing($attr, $module)
//{
//    return $module->$attr ? '<span class="am-icon-check some_thing" data-attr="' . $attr . '"></span>' : '<span class="am-icon-close some_thing" data-attr="' . $attr . '"></span>';
//}


function it_something($attr, $module)
{
    return $module->$attr ? '<span class="am-icon-check it_something" data-attr="' . $attr . '"></span>' : '<span class="am-icon-close it_something" data-attr="' . $attr . '"></span>';
}


/**
 * 微信菜单, 删除空数组
 * @param $buttons
 */
function wechat_menus($request_buttons)
{
    $buttons = [];

    foreach ($request_buttons as $key => $value) {
        if ($value['name'] == "") {
            continue;
        }

        $buttons["$key"] = wechat_key_url($value);

        foreach ($value["sub_button"] as $k => $v) {
            if ($v['name'] == "") {
                continue;
            }
            $buttons["$key"]["sub_button"][] = wechat_key_url($v);
        }
    }
    return $buttons;
}

/**
 * 根据类型,返回url或者key
 * @param $value
 * @return array
 */
function wechat_key_url($value)
{
    $result = [];

    $result['type'] = $value['type'];
    $result['name'] = $value['name'];
    if ($value['type'] == "click") {
        $result['key'] = $value['value'];
    } else {
        $result['url'] = $value['value'];
    }
    return $result;
}