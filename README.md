# relation-app-practice

## 概要
COACHTECH 教材 Tutorial 10-1「認証機能 ハンズオン演習」で作成した成果物です。
- Fortify（認証機能）を用いたフォームです。
- ユーザ登録したり、ダッシュボード内で自身の情報を確認することができます。


## 使用技術
- PHP 8.x
- Laravel 10.x
- Laravel Fortify（認証）
- MySQL

## ディレクトリ構成（抜粋）
```text
~/laravel-practice/
└── 9-5-5_hands-on/
    └── relation-app-practice/
        ├── app/                                # MVCのモデル（M） とコントローラー(C)
                └── Controllers                 # HTTPのコントローラー（リクエスト処理）
                    └── UserController.php
            └── Providers/                      #Provider（ルーティング周りをまとめるクラス）の設定
                    └── RouteServiceProvider    #ログイン後に行くページ等を設定            　　 
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
- Laravel Fortifyを用いた認証機能の実装
    - ユーザ登録やログイン機能、ログアウト機能を実装
```text
    sail composer require laravel/fortify
    sail artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider" //プロバイダーを設定
```
- authミドルウェアを用いた実装　
    - ミドルウェアのauthはログイン状態のチェックを行うもの
```
 Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
```
    と宣言することでミドルウェアへのルーティングが可能

## 動作確認
- 1.プロジェクトの移動およびsailの起動
  - プロジェクトの移動およびsailの起動
   - cd ~/laravel-practice/10-1-6_hands-on/auth-app-practice
   - ./vendor/bin/sail up -d
- 2.以下のコードを実行
  - http://localhost/register