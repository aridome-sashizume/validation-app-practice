<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h1 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { padding: 8px; width: 300px; border: 1px solid #ddd; border-radius: 4px; }
        input.error { border-color: #dc3545; }
        .error-message { color: #dc3545; font-size: 14px; margin-top: 5px; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error-list { background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .error-list ul { margin: 0; padding-left: 20px; }
        .error-list li { color: #721c24; }
    </style>
</head>
<body>
    <h1>ユーザー登録</h1>

    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name') }}" class="@error('name') error @enderror">
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" class="@error('email') error @enderror">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password" class="@error('password') error @enderror">
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>パスワード（確認）</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>
