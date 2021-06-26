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

## heroku 上傳

使用Heroku上傳需要安裝下列軟體

- [Git](https://git-scm.com/)
- [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli)

### Git 基本教學

電腦第一次安裝使用git時，需先設定使用者。

```bash
git config --global user.name "your name"
# 設定使用者名稱

git config --global user.email "your email"
# 設定使用者email

git config --list
# 檢查
```

#### 初始化

在每個專案要使用版本控制之前，都必須先初始化才可使用。

```bash
git init
```

#### 加入暫存

當檔案有新增、刪除或修改時，就需要加入暫存或追蹤。

```bash
git add 檔名.副檔名

# or

git add .
# 加入此檔案夾中所有檔案

git status
# 查看目前檔案狀態
```

#### 提交

所有檔案確認加入暫存之後，即可提交到儲存庫

```bash
git commit -m "your message"
```

#### 查看紀錄

```bash
git log

git reflog
```

### 上傳流程

1. 建立Procfile，並輸入下列指令

    ```proc
    web: vendor/bin/heroku-apache-php2 public/
    ```

    > 注意首字P要大寫

2. 建立heroku專案

    ```bash
    heroku login
    #登入heroku

    heroku create
    #建立專案
    ```

3. 上傳

    ```bash
    git add .
    git commit -m "your message"

    git push heroku master
    # 上傳到heroku
    ```
    > 若有修改重複步驟三即可
