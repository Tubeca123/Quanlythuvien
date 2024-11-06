<!DOCTYPE html>
<html>
<head>
    <title>Thông báo trả sách trễ</title>
</head>
<body>
    <h1>Xin chào, {{ $user->Full_name }}</h1>
    <p>Chúng tôi nhận thấy rằng bạn đã trả sách trễ vào ngày: {{ $datelate }}.</p>
    <p>Chi tiết sách:</p>
    <ul>
        @foreach ($detail as $bookName)
            <li>{{ $bookName }}</li>
        @endforeach
    </ul>
</body>
</html>