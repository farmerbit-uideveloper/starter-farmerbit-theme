import $ from 'jquery';
import 'tui-date-picker/dist/tui-date-picker.css';
import 'tui-time-picker/dist/tui-time-picker.css';
import DatePicker from 'tui-date-picker';
import TimePicker from 'tui-time-picker';

$(document).ready(function() {

    $('.fakeInput').click(function() {
        $(this).parent().find('input').click();
    });

    if($('.fakeInput').length){

        $('[type="file"]').on( "change", function() {
            
            if(this.files.length == 1) {
                
                if(this.files.item(0).size > 10000000) {
                    alert("Errore!\nSeleziona un file con dimensione massima di 10MB.");
                }else{
                    if(this.files.item(0).type == 'application/pdf'){
                        var nameLabel = $(this).parent().find('input').val().split('\\').pop();
                        if(nameLabel.length > 23) {
                            nameLabel = nameLabel.substr(0, 20) + '...';
                        }
                        $(this).parent().find('.fakeInput-label').text(nameLabel);
                    }else{
                        alert("Errore!\nSeleziona solo file PDF.");
                    }
                }
            }

        });
    }
    
    if($('.tui-datepicker-input input').length) {
        var datepicker = new DatePicker('#wrapper', {
            input: {
                element: '.tui-datepicker-input input',
                language: 'it',
                format: 'dd-MM-yyyy'
            }
        }); 
    }
    
    if($('#timepicker-selectbox').length) {
        var tpSpinbox = new TimePicker('#timepicker-selectbox', {
            initialHour: 12,
            initialMinute: 30,
            inputType: 'selectbox',
            showMeridiem: false,
            language: 'it'
        });
    }

    $('.form__form-block form button').click(function(e) {
        e.preventDefault();

        $('.tooltip-error').removeClass('show');
        var id_form = "#" + $(this).data('id-form');

        $('input[type="text"]').each(function() {
            var input = $(this);
            var name = $(this).attr('name');
            var value = $(this).val();

            var input_required = '_' + name;

            if($('[name="'+ input_required +'"]').length && $('[name="'+ input_required +'"]').val() == '1'){
                if(!value.length) {
                    $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                }
            }
        });

        $('input[type="email"]').each(function() {
            var input = $(this);
            var name = $(this).attr('name');
            var value = $(this).val();

            var input_required = '_' + name;

            if($('[name="'+ input_required +'"]').length && $('[name="'+ input_required +'"]').val() == '1'){
                if(!value.length) {
                    $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                }
            }
        });

        $('textarea').each(function() {
            var textarea = $(this);
            var name = $(this).attr('name');
            var value = $(this).val();

            var input_required = '_' + name;

            if($('[name="'+ input_required +'"]').length && $('[name="'+ input_required +'"]').val() == '1'){
                if(!value.length) {
                    $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                }
            }
        });

        $('input[type="checkbox"]').each(function() {
            var input = $(this);
            var name = $(this).attr('name');
            var value = $(this).prop("checked");

            var input_required = '_' + name;

            if($('[name="'+ input_required +'"]').length && $('[name="'+ input_required +'"]').val() == '1'){
                if(!value) {
                    $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                }
            }
        });

        $('input[type="file"]').each(function() {
            var name = $(this).attr('name');
            if(this.files.length == 1) {
                
                if(this.files.item(0).size > 10000000) {
                    $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                }else{
                    if(this.files.item(0).type != 'application/pdf'){
                        $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
                    }
                }
            }else{
                $('.tooltip-error[data-target="'+ name +'"]').addClass('show');
            }
        });

        if($('.tooltip-error.show').length){
            $('html, body').animate({
                scrollTop: $('.tooltip-error.show').first().offset().top - 250
            }, 800);

            /*setTimeout(function() {
                $('.tooltip-error.show').each(function () {
                    $(this).removeClass('show');
                });
            },3000);*/
        }

        if($('.tooltip-error.show').length == 0) {            

            var $contactForm = $( id_form ), $loading = "<svg id='spinner' width='48px' height='48px' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid' class='uil-default'><rect x='0' y='0' width='100' height='100' fill='none' class='bk'></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(0 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(30 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.08333333333333333s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(60 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.16666666666666666s' repeatCount='indefinite'/></rect><rect  x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(90 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.25s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(120 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.3333333333333333s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(150 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.4166666666666667s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(180 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5s' repeatCount='indefinite'/></rect><rect x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(210 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.5833333333333334s' repeatCount='indefinite'/></rect><rect  x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(240 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.6666666666666666s' repeatCount='indefinite'/></rect><rect  x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(270 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.75s' repeatCount='indefinite'/></rect><rect  x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(300 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.8333333333333334s' repeatCount='indefinite'/></rect><rect  x='45.5' y='40' width='9' height='20' rx='5' ry='5' fill='#b2b3b4' transform='rotate(330 50 50) translate(0 -30)'><animate attributeName='opacity' from='1' to='0' dur='1s' begin='0.9166666666666666s' repeatCount='indefinite'/></rect></svg>";
            
            $contactForm.after( $loading );

            if( $( "#validation-output" ).length ) {
                $( "#validation-output" ).remove();
            }

            var url = $(id_form).attr('action');  
            var data = "action=form_send_component&" + $contactForm.serialize();    

            const upload_file = new Promise((resolve, reject) => {  
                
                    $('input[type="file"]').each(function() {              
                        var name = $(this).attr('name');

                        var file_data = $(this).prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('file', file_data);
                        form_data.append('action', 'form_upload_file');
                
                        resolve(
                            $.ajax({
                                url,
                                type: 'POST',
                                contentType: false,
                                processData: false,
                                data: form_data,
                                success: function (response) {
                                    $( "#spinner" ).remove();
                                    if(response != 'error'){
                                        data = data + '&' + name + '=' + response;
                                        //$contactForm.after( response );
                                    }else{
                                        var error = '<div id="validation-output"><div class="message error">C\'è stato un errore nel caricare il tuo file. Ricarica la pagina e riprova.</div></div>';
                                        $contactForm.after( error );
                                    }
                                }
                            })
                        );
                    })
                
            });

            upload_file.then( (result, displayError ) => {
                if(result){
                    $.ajax({ 
                        type: "POST", 
                        url, 
                        data: data
                    }).done( function(response) { 
                        $("#spinner").remove();
                        $contactForm.after(response);
                    });
                } else {
                    console.log(displayError);
                }
            });

            // $('input[type="file"]').each(function() {              
            //     var name = $(this).attr('name');

            //     data = data + '&' + name + '=' + $(this).val();
                
            //     // var form_data = new FormData();
            //     // form_data.append('file', file_data);
            //     // form_data.append('action', 'form_upload_file');

            //     // $.ajax({
            //     //     url,
            //     //     type: 'POST',
            //     //     contentType: false,
            //     //     processData: false,
            //     //     data: form_data,
            //     //     success: function (response) {
            //     //         $( "#spinner" ).remove();
            //     //         if(response != 'error'){
            //     //             data = data + '&' + name + '=' + response;
            //     //         }else{
            //     //             var error = '<div id="validation-output"><div class="message error">C\'è stato un errore nel caricare il tuo file. Ricarica la pagina e riprova.</div></div>';
            //     //             $contactForm.after( error );
            //     //         }
            //     //     }
            //     // })


            // });

            $.ajax({ 
                type: "POST", 
                url, 
                data: data
            }).done( function(response) { 
                $("#spinner").remove();
                $contactForm.after(response);
            });
        }
    });

});