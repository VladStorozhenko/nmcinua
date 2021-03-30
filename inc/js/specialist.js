/**

 * ===

 * Specialist scripts file

 * ===

 *

 * @package nmc

 *

 */



const $ = jQuery;



$(document).ready(function() {

    $('#specialist-button').on('click', function() {

        var date = new Date();

        var currentMonth = date.getMonth(); // current month

        var currentDate = date.getDate(); // current date

        var currentYear = date.getFullYear(); //this year

        let daysToEnable = $(this).data("daystoenable");

        let daysIndexes = Object.values(daysToEnable);

        let selectedSpecialistName = $(this).data('specialist');

        $(`#specialist-name`).attr('value', selectedSpecialistName);

        $.datepicker.regional.ru = {
          closeText: "Закрыть",
          prevText: "&#x3C;Пред",
          nextText: "След&#x3E;",
          currentText: "Сегодня",
          monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
          "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
          monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
          "Июл","Авг","Сен","Окт","Ноя","Дек" ],
          dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
          dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
          dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
          weekHeader: "Нед",
          dateFormat: "dd.mm.yy",
          firstDay: 1,
          isRTL: false,
          showMonthAfterYear: false,
          yearSuffix: "" };
          
      $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );

        $(`#specialist-day`).datepicker({

            changeYear: false,

            minDate: new Date(currentYear, currentMonth, currentDate),

            dateFormat: 'dd.mm.yy',

            pos: "top",

            beforeShowDay: function (date) {

                daysToEnable = $(`#specialist-button`).data('daystoenable');

                daysIndexes = Object.values(daysToEnable);

              if (daysIndexes.indexOf(date.getDay()) == -1) {

                return [false, ""];

              } else {

                return [true, ""];

              }

            },

            onSelect: function() {

                let selectedDate = $(this).datepicker({ dateFormat: 'dd.mm.yy' }).val();

                $('#selected-date').attr('value', selectedDate);

            }

        })

        $('#speciliastModal').on('hidden.bs.modal', function () {

            $(`#specialist-day`).datepicker('setDate', null);

              $(`#specialist-day`).datepicker('destroy');

          });

    })

})