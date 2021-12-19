<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset='utf-8'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>ユーザー登録フォーム</title>
</head>

<body>
    <main class="py-4">
        @if (Auth::check())
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    aaa
                </div>
                <div class="col-12 col-md-8  col-lg-9">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif                  
                    @yield('content')
                </div>
            </div>
        </div>
        @else
        @yield('content')
        @endif
    </main>
</body>

</html>