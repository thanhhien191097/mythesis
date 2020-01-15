<!DOCTYPE html>
<html lang="en">
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BigStore: Shopping Invoice</title>
    </head>


    <style>
        

    </style>

    <body>
        @if($showDownload ?? true)
        <div style="text-align: right; margin-bottom: 10px">
            <form action="{{ route('download',$id) }}" method="GET">
                <button class="btn btn-icon btn-warning" type="submit">
                    <i class="fa fa-download"></i> Download PDF
                </button>
                <input type="hidden" name="fname" value="{{ $_GET['fname'] }}">
                <input type="hidden" name="quote" value="{{ $_GET['quote'] }}">
            </form>
        </div>
        @endif
        <!-- HEADER -->
        <div class="header">
            <!-- <img src="assets/images/nguyen.png" id="ava" alt=""> -->
            <div class="name" style="color: #ec5858; font-size: 1rem; text-transform: uppercase; text-align: left; font-weight: bold;" id="fname"><?php echo $_GET['fname'];?></div>
            <div class="quote" id="quote"><?php echo $_GET['quote'];?></div>
        </div>  
    </body>
</html>