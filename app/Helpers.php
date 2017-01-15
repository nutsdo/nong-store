<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 下午9:51
 */

if (! function_exists('dingo_route')) {
    /**
     * 根据别名获得url.
     *
     * @param string $version
     * @param string $name
     * @param string $params
     *
     * @return string
     */
    function dingo_route($version, $name, $params = [])
    {
        return app('Dingo\Api\Routing\UrlGenerator')
            ->version($version)
            ->route($name, $params);
    }
}

if (! function_exists('random_color')) {
    /**
     * 随机标签颜色.
     *
     * @return string
     */
    function random_color()
    {
        $colors = [
            'primary',
            'secondary',
            'purple',
            'orange',
            'pink',
            'turquoise',
            'success',
            'info',
            'blue',
            'danger',
            'red',
            'warning',
            'black',
            'gray',
            'warning',
        ];
        $count = count($colors);
        $index = random_int(0,$count-1);

        return $colors[$index];
    }
}