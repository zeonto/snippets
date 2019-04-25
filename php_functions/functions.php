<?php
/**
 * 日期区间数组列表
 * 
 * 传入2个日期返回日期区间的全部日期列表，返回列表日期大小顺序和参数大小顺序一致
 * 
 * @param string $startDate 开始日期
 * @param string $endDate 结束日期
 * @param string $format 格式
 * @return array 日期区间数组
 */
function date_range($startDate, $endDate, $format = 'Y-m-d')
{
    $data = array_map(
      function ($n) use ($format) {return date($format, $n);}, range(strtotime($startDate), strtotime($endDate), 24 * 3600)
    );
    return $data;
}

/**
 * 计算日期区间的天数
 * 
 * 计算天数包含2个参数的日期在内，日期参数不限定大小顺序
 *
 * @param string $startDate 开始日期
 * @param string $endDate 结束日期
 * @return int
 */
function date_count($startDate, $endDate)
{
    $startDate = date('Y-m-d', strtotime($startDate));
    $endDate = date('Y-m-d', strtotime($endDate));
    $date = date_diff(date_create($startDate), date_create($endDate));
    $days = $date->format('%a') + 1;
    return $days;
}
