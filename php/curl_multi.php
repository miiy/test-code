<?php

/**
 *
 * @param array $urls
 * @return array
 * @see https://www.php.net/manual/zh/function.curl-multi-init.php
 */
function curl_multi(array $urls) {
    // 创建批处理cURL句柄
    $mh = curl_multi_init();

    $chs = [];
    for ($i = 0; $i < count($urls); $i++) {
        // 创建cURL资源
        $chs[$i] = curl_init();

        // 设置URL和相应的选项
        curl_setopt($chs[$i], CURLOPT_URL, $urls[$i]);
        curl_setopt($chs[$i], CURLOPT_HEADER, 0);
        curl_setopt($chs[$i], CURLOPT_RETURNTRANSFER, 1); // 不输出返回内容
        curl_setopt($chs[$i], CURLOPT_CONNECTTIMEOUT, 5); // 超时时间
        curl_setopt($chs[$i], CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面

        //  curl_setopt($chs [$i], CURLOPT_PROXY, '10.211.55.3:8888'); // 代理调试

        // 增加句柄
        curl_multi_add_handle($mh, $chs [$i]);
    }

    $running = null;
    do {
        usleep(10000); // 10000微秒=10毫秒
        curl_multi_exec($mh, $running);
    } while ($running > 0);

    // 获取内容
    $res = [];
    foreach ($chs as $ch) {
        $curlInfo = curl_getinfo($ch);
        // $res[$curlInfo['url']] = curl_multi_getcontent($ch);
        $res[] = curl_multi_getcontent($ch);
    }

    // 关闭全部句柄
    foreach ($chs as $ch) {
        curl_multi_remove_handle($mh, $ch);
    }
    curl_multi_close($mh);

    // return result
    return $res;
}

$startTime = time();
$res = curl_multi([
    'https://www.baidu.com',
    'https://www.sina.com',
    'https://www.taobao.com',
    'https://google.com'
]);

echo time() - $startTime . "\n";

var_dump($res);
