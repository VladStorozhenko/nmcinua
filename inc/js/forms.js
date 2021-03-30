/**
 * ===
 * Contact form scripts file
 * ===
 */

jQuery(document).ready(function (){
    // standart form
    jQuery('#standart-form').on('submit', function(e){
        e.preventDefault();
        let form = jQuery(this);
        let name = form.find('#name').val();
        let tel = form.find('#tel').val();

        ajaxurl = form.data('url');
        if(!name || !tel) {
            return;
        }

        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                name: name,
                tel: tel,
                action: 'nmc_standart_register_form'
            },
            error: function (response) {
                alert("Ошибка");
            },
            success: function(response) {
                if (response === 0) {
                    console.log('Error');
                } else {
                    nmc_on_standart_form_submit_success();
                }
            }
        })
    }) ;

    // handle specialist form
    jQuery('#specialist-form').on('submit', function(e) {
        e.preventDefault();

        let form = jQuery(this);
        let forSpecialistName = form.find('#for-specialist-name').val();
        let forSpecialistTel = form.find('#for-specialist-tel').val();
        let forSpecialistDate = form.find('#selected-date').val();
        let selectedSpecialist = form.find('#specialist-name').val();
        let ajaxurl = form.data('url');

        if(!forSpecialistName || !forSpecialistTel) {
            return;
        }

        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                forSpecialistName: forSpecialistName,
                forSpecialistTel: forSpecialistTel,
                forSpecialistDate: forSpecialistDate,
                selectedSpecialist: selectedSpecialist,
                action: 'nmc_specialist_register_form',
            },
            error: function (response) {
                alert("Ошибка");
                console.log(response);
            },
            success: function(response) {
                if (response === 0) {
                    alert("Ошибка");
                    console.log("Error");
                } else {
                    nmc_on_specialist_form_submit_success();
                }
            }
        })
    })
});

// on form successful submit
function nmc_on_standart_form_submit_success() {
    jQuery('#modal').modal('hide');
    jQuery('#thanksModal').modal();
}

function nmc_on_specialist_form_submit_success() {
    jQuery('#speciliastModal').modal('hide');
    jQuery('#thanksModal').modal();
}
