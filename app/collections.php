<?php

function lawfirmInfoStatus($val = null)
{
    $res = collect();
    $res->put("stay", "대기");
    $res->put("select", "진행");
    $res->put("complete", "완료");
    $res->put("cancel", "취소");
    if ($val != null) return $res->get($val);
    return $res;
}

function getAuth($val = null){
    $res = collect();
    $res->put("1", "일번");
    $res->put("2", "이번");
    $res->put("3", "삼번");
    $res->put("4", "사번");
    $res->put("5", "오번");
    if ($val != null) return $res->get($val);
    return $res;

}
