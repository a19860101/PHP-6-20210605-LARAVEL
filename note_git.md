# Git版本控制

## 前置動作

電腦第一次安裝使用git時，需先設定使用者。

```bash
git config --global user.name "your name"
# 設定使用者名稱

git config --global user.email "your email"
# 設定使用者email

git config --list
# 檢查
```

## 初始化

在每個專案要使用版本控制之前，都必須先初始化才可使用。

```bash
git init
```

## 基本操作

### 加入暫存

當檔案有新增、刪除或修改時，就需要加入暫存或追蹤。

```bash
git add 檔名.副檔名

# or

git add .
# 加入此檔案夾中所有檔案

git status
# 查看目前檔案狀態
```
