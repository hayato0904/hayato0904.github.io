<?php
/**
 * リダイレクト
 * @param string $url URL
 * @return void
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}
//header Locationが頁を飛ばす処理。$urlでそれを代用している。
//