<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiêu đề trang</title>
    <link rel="stylesheet" href="đường_dẫn_tới_file_css" media="all">
</head>

<body id="">
@include('includes.header')

<h2>Tiêu đề từ template</h2>
@yield('content')

@include('includes.footer')

</body>
</html>