
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <meta http-equiv="content-language" content="en">
        <title>CV Preview</title>
</head>

<style>
    @font-face {
        font-family: myFirstFont;
        src: url("{{asset('fonts/NunitoSans-BlackItalic.ttf')}}");
    }

    body{
        font-family: myFirstFont;
    }

    /* .main-font{
        font-family: myFirstFont,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
    } */
</style>

<body>
    

    @if($showDownload ?? true)
    <div style="text-align: right; margin-bottom: 10px">
        <form action="{{ route('download',$id) }}" method="GET">
            <button class="btn btn-icon btn-warning" type="submit">
                <i class="fa fa-download"></i> Download PDF
            </button>
        </form>
    </div>
    @endif
    <!-- HEADER -->
    <div class="header">
        <img src="{{ asset('images/nguyen.png') }}" id="ava" alt="">
        <p>Email {{ $i['email'] ?? '' }} </p> <!-- ?? dung de khong hien loi~ khi data trong' -->
        <p>Job {{ $i['job'] ?? '' }}</p>
        <p>Cảnh tượng trước mắt chúng tôi thực sự hùng vĩ.</p>
    </div>  
</body>
</html>