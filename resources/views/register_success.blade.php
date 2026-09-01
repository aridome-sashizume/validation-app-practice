<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>登録完了</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { color: #28a745; }
        .success-box { background: #d4edda; border: 1px solid #c3e6cb; padding: 20px; border-radius: 4px; margin-bottom: 20px; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>登録が完了しました！</h1>
        <p>ご登録ありがとうございます。</p>
    </div>
    <a href="{{ route('register.create') }}">← 登録画面に戻る</a>
</body>
</html>
