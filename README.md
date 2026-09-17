# relation-app-practice

## 概要
COACHTECH 教材 Tutorial 9-6「バリデーション ハンズオン演習」で作成した成果物です。
- バリデーションルールを用いたユーザ登録フォームです。
- 正しい入力をすると登録成功フォームに遷移し、バリデーションに合わない内容を入力するとエラー文を出力される。


## 使用技術
- PHP 8.x
- Laravel 10.x
- FormRequest / バリデーションルール

## ディレクトリ構成（抜粋）
```text
~/laravel-practice/
└── 9-5-5_hands-on/
    └── relation-app-practice/
        ├── app/                                # MVCのモデル（M） とコントローラー(C)
            └── Https/                          
                ├── Requests                    # Request（フォームリクエスト）
                    └── StoreUserRequest.php
                └── Controllers                 # HTTPのコントローラー（リクエスト処理）
                    └── UserController.php
            └── Models/                         # Eloquentモデル  
                └── User.php
        ├── database/    
            ├── factories/                      # ファクトリー（テストデータの自動生成）
                └── UserFactory.php
            ├── migrations/                     # マイグレーションの定義
                ├── 2014_10_12_000000_create_users_table.php
                ├── 2014_10_12_100000_create_password_reset_tokens_table.php
                ├── 2019_08_19_000000_create_failed_jobs_table.php
                └── 2019_12_14_000001_create_personal_access_tokens_table.php
            └──Seeder 　　　　　　　　　　　　　　#シーダーの定義
                └── DatabaseSeeder.php
        ├── routes/                            #コントローラとの紐づけ（ルーティング）
            ├── api.php
            ├── channels.php
            ├── console.php
            └── web.php　　　　　　　　　　　　　　#UserControllerとのルーティング
        ├── resources/
            ├── css/
            ├── js/
            └──  views/                   　　　 # Bladeテンプレート（V）
                └── posts/ 
                    ├── register_success.blade.php  #登録成功ページ
                    └── register.blade.php          #登録フォームページ
        ├── config/
        ├── strage/
        ├── bootstrap/
        └── tests/
```

## 学んだこと
- リクエストフォームの生成
    - バリデーションロジックをコントローラーから分離する　※コントローラーが複雑になるため、切り離し
```text
    sail artisan make:request StoreUserRequest #artisanを活用することでRequestを作成可能
```
- バリデーションルールの設定　
    - ルールは|で複数を接続する。
    - authorizeメソッドでリクエストを許可し、rulesメソッドでバリデーションルールを定義　⇒ StoreUserRequest.phpに設定
    - エラー文に関してもmessagesメソッドで設定可能（変数名に対して変数名.条件 => 'エラー文'という形式で設定する）

## 動作確認
- 1.プロジェクトの移動およびsailの起動
  - プロジェクトの移動およびsailの起動
   - cd ~/laravel-practice/9-6-5_hands-on/relation-app-practice
   - ./vendor/bin/sail up -d
- 2.以下のコードを実行
  - http://localhost/register