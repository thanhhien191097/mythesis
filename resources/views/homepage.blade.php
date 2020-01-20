<html>

<head>
    <!-- <link rel="stylesheet" href="assets/fonts"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.remixicon.com/releases/v2.0.0/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
</head>

<body>

    <div class="section steps">
        <div class="container">
            <div class="row form-group">
                <div class="col-xs-12">
                    <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                        <li class="active"><a href="#step-1">
                                <h4 class="list-group-item-heading">Step 1</h4>
                                <p class="list-group-item-text">Select a template</p>
                            </a></li>
                        <li class="disabled"><a href="#step-2">
                                <h4 class="list-group-item-heading">Step 2</h4>
                                <p class="list-group-item-text">Fill general information</p>
                            </a></li>
                        <li class="disabled"><a href="#step-3">
                                <h4 class="list-group-item-heading">Step 3</h4>
                                <p class="list-group-item-text">List skill and experience</p>
                            </a></li>
                        <li class="disabled"><a href="#step-4">
                                <h4 class="list-group-item-heading">Step 4</h4>
                                <p class="list-group-item-text">Upload avatar</p>
                            </a></li>
                        <li class="disabled"><a href="#step-5">
                                <h4 class="list-group-item-heading">Step 5</h4>
                                <p class="list-group-item-text">Preview CV</p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="step-one">
        <div class="row setup-content" id="step-1">
            <div class="container">
                <div class="header">
                    <div class="tittle"> Select your Template </div>
                    <div class="description">To get started, select a CV template below</div>
                </div>

                <div class="slick-carousel">

                    <?php for ($i=1; $i <= 6; $i++) { ?>
                    <div class="slide-content">
                        <div class="template-content">
                            <div class="template-name"> Template <?php echo $i; ?> </div>
                            <div class="template-img" onclick="mark(this)"
                                data-tn="{{ route('download_template_excel', ['template' => $i]) }}">
                                <img src='{{ asset("images/template$i.png")}}' class="image">
                                <div class="middle">
                                    <button type="button" class="btn btn-select" data-template="template_{{$i}}">
                                        <i class="ri-heart-fill"></i>
                                        SELECT THIS
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            {{-- <div class="button-style">
              <button id="activate-step-2" class="btn-activate">Move to step 2</button>
        </div> --}}

        </div>
    </div>

    <div class="step-two">
        <div class="row setup-content" id="step-2">
            <div class="container">
                <div class="header">
                    <div class="tittle"> Personal information </div>
                    <div class="description"> Fill your personal information here </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-3 column"></div>
                    <div class="col-md-6 column">
                        <form method="POST" action="{{route('post_excel')}}" enctype="multipart/form-data"
                            id="templateForm">
                            @csrf
                            {{-- Upload file template<input type="file" hidden name="file_excel"> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="btn btn-primary btn-block" for="upload-excel">
                                        <input id="upload-excel" name="file_excel" type="file" class="d-none">
                                        Upload Data Excel
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <a id="sample_excel" href="{{ route('download_template_excel', '') }}"
                                        class="btn btn-success btn-block">Download Template Excel</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="load"
                                            style="width:0%">
                                            0%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a id="execute_send_mail" class="btn btn-warning btn-block">Execute send mail</a>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="name_excel">
                    </form>
                </div>
                <div class="col-md-3 column"></div>
            </div>
        </div>
    </div>
    </div>


    <div class="step-three">
        <div class="row setup-content" id="step-3">
            <div class="container">
                <div class="header">
                    <div class="tittle"> Select your Template </div>
                    <div class="description">To get started, select a CV template below</div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <table class="table table-bordered table-hover" id="tab_logic">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Surname
                                    </th>
                                    <th class="text-center">
                                        Email
                                    </th>

                                    <th class="text-center">
                                        Gender
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr id='addr0'>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <input type="text" name='name0' placeholder='Name' class="form-control" />
                                    </td>
                                    <td>
                                        <input type="text" name='sur0' placeholder='Surname' class="form-control" />
                                    </td>
                                    <td>
                                        <input type="text" name='email0' placeholder='Email' class="form-control" />
                                    </td>
                                    <td>
                                        <select type="text" name="gender0" class="form-control">
                                            <option name="male" value="male">Male</option>
                                            <option name="Female" value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr id='addr1'></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row'
                    class="btn btn-danger pull-right">Delete Row</a>
            </div>

            <div class="button-style">
                <button id="activate-step-4" class="btn-activate">Activate Step 4</button>
            </div>

        </div>
    </div>

    <div class="step-four">
        <div class="row setup-content" id="step-4">
            <div class="container">
                <div class="header">
                    <div class="tittle"> Select your Templae </div>
                    <div class="description">To get started, select a CV template below</div>
                    <div id="wrapper">
                        <input type="file" accept="image/*" onchange="preview_image(event)">
                        <img id="output_image" />
                    </div>
                </div>


            </div>

        </div>
    </div>






</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
<script>
    const urlDownload   = "<?php echo route('download_template_excel', ''); ?>";
    const postExcel     = "<?php echo route('post_excel'); ?>";
    const executeExcel  = "<?php echo route('execute.excel'); ?>";
</script>
<script src="{{ asset('js/index.js')  }}"></script>

</html>