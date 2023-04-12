<?php

namespace App\Helpers;

class DataHelper
{
    /**
     *  Data tree category
     *
     * @param array $parent
     * @return array
     */
    public static function dataTree($array, $parent, $check = 0, $level = 0)
    {
        $data = '';
        foreach ($array as  $val) {
            if ($val['parent_id'] == $parent) {
                if ($val['id'] == $check)
                    $data .= "<option  value=" . $val['id'] . " selected>" . str_repeat('--', $level) . $val['name'] . "</option>";
                else $data .= "<option  value=" . $val['id'] . ">" . str_repeat('--', $level) . $val['name'] . "</option>";
                $childData = self::dataTree($array, $val['id'], $check, $level + 1);
                if (!empty($childData)) {
                    $data .= $childData;
                }
            }
        }

        return $data;
    }
}
