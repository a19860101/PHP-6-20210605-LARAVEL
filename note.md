# 上傳

## Apache Server

### 前置動作

- 將public以外的檔案包成一個資料夾，名稱自訂
- public內的資料放置在上述資料夾之外
- 開啟 /config/filesystems.php，修改上傳路徑

```php
'public' => [
            'driver' => 'local',
            ////
            'root' => public_path('../../storage'),
            //視狀況修改
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
```

- 設定資料庫 .env

> 若完成以上設定，php artisan serve 就無法使用。可改用localhost/資料夾名稱 進行測試
