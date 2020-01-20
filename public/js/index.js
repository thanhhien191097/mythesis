// Activate Next Step

$(document).ready(function() {
    var timerId;
    $('.progress').fadeOut();

    $('#execute_send_mail').click(function(){
        let name_excel = $('input[name=name_excel]').val();
        if(name_excel.length == 0){
            alert("Vui lòng import file Excel");
            return;
        }
        let arrTemp  = $("#sample_excel").attr('href').split('/');
        let template = arrTemp[arrTemp.length-1];

        $.ajax({
            url: executeExcel,
            type: "POST",
            data: {
                template, name_excel
            },
            dataType: "text",
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"').val()
            },
            success: function(data, textStatus, jqXHR) {
                if(!data.error){
                    console.log(data);
                }else{
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });

    });

    $('#upload-excel').change(function () {
        if ($(this).val().length > 0) {
            var formData = new FormData();
            var excelFile = $(this)[0].files[0];
            formData.append("file_excel", excelFile);

            var percent = 0;
            $('.progress').fadeIn();
            $('#load').css('width', '0%');
            $('#load').addClass('progress-bar-striped active');
            timerId = setInterval(function () {
                // increment progress bar
                percent += 5 + Math.floor(Math.random() * Math.floor(5));
                $('#load').css('width', percent + '%');
                $('#load').html(percent + '%');
                if(percent >= 100){
                    clearInterval(timerId);
                    $('#pay').attr('disabled', false);
                    $('#load').removeClass('progress-bar-striped active');
                    $('#load').html('wait a moment');
                }
            }, 100);

            $.ajax({
                url: postExcel,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"').val()
                },
                success: function(data, textStatus, jqXHR) {
                    if(!data.error){
                        $('.progress-bar').css('background-color', '#2fafff');
                        $('#load').html('Import success');
                        $('.progress').delay(2000).fadeOut('slow');
                        $('input[name=name_excel]').val(data.data);
                    }else{
                        alert("Lỗi");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.progress-bar').css('background-color', '#dc3545');    
                    $('#load').html('Import failure');
                    $('.progress').delay(2000).fadeOut('slow');
                },
                complete: function(datta){
                    clearInterval(timerId);
                    $('#upload-excel').val('');
                    $('#load').css('width','100%');
                    $('#load').removeClass('progress-bar-striped active');
                }
            });
        }
    })

	// Slick Library for slider
	$(".slick-carousel").slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1
	});
    
    // Activate steps
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });

    $('#step-1 .btn-select').click(function(){
        console.log(urlDownload + "/" + $(this).data('template'));
        $("#sample_excel").attr("href", urlDownload + "/" + $(this).data('template'));

        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO //
    // $('#activate-step-2').on('click', function(e) {
    //     $('ul.setup-panel li:eq(1)').removeClass('disabled');
    //     $('ul.setup-panel li a[href="#step-2"]').trigger('click');
    //     // $(this).remove();
    // })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        // $(this).remove();
    })
    
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        // $(this).remove();
    })
    
    $('#activate-step-5').on('click', function(e) {
        $('ul.setup-panel li:eq(4)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-5"]').trigger('click');
        // $(this).remove();
    })
});


// Add , Dlelete row dynamically

     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td><td><select type='text' name='gender"+i+"' class='form-control'><option name='male"+i+"' value='male'>Male</option><option name='Female"+i+"' value='Female'>Female</option><option name='3rdgen"+i+"' value='none'>None</option></select></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
     

function mark(el) {
	// 'For' each item and remove active
	Array.prototype.forEach.call(document.querySelectorAll('.template-img'), function(item, index){
		item.style.border = "";
	});  

    var templateName = $(el).attr("data-tn");

    $('#templateForm').attr('action', templateName);
    // debugger;

	// Add active attribute to this element
    el.style.border = "4px solid #337ab7";
}

function preview_image(event) {
	var reader = new FileReader();
	reader.onload = function() {
		var output = document.getElementById('output_image');
		output.src = reader.result;
	}
	reader.readAsDataURL(event.target.files[0]);
}