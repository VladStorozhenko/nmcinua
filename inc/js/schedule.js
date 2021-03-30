/**
 * ===
 * Schedule scripts file
 * ===
 */

jQuery.noConflict();

jQuery(document).ready(function ($) {
    $.fn.center = function () {
        this.css("position", "absolute");
        this.css("top", Math.max(0, (window.innerHeight - $(this).outerHeight()) / 2 + $(window).scrollTop()) + "px");
        this.css("left", Math.max(0, (window.innerWidth - $(this).outerWidth()) / 2 + $(window).scrollLeft()) + "px");
        return this;
    };

    $("#type-select").change(function () {
        let select = $(this);
        let value = select.val(); // get selected value
        let ajaxurl = select.data("url");

        // ajax call on select
        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: "html",
            data: {
                value: value,
                action: "nmc_get_specialists_by_type",
            },
            error: function (response) {
                alert(`Произошла ошибка`);
            },
            success: function (response) {
                let html = "";
                html += response;
                $("#content").html(html);

                // button click
                $(".specialist-button").on("click", function () {
                    var date = new Date();
                    var currentMonth = date.getMonth(); // current month
                    var currentDate = date.getDate(); // current date
                    var currentYear = date.getFullYear(); //this year
                    let daysToEnable = $(this).data("daystoenable");
                    let daysIndexes = Object.values(daysToEnable);

                    let id = $(this).data("id");
                    $("#specialist-day").attr("id", `specialist-day-${id}`);

                    let selectedSpecialistName = $(this).data("specialist");

                    $(`#specialist-name`).attr("value", selectedSpecialistName);

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

                    $(`#specialist-day-${id}`).datepicker({
                        changeYear: false,
                        dateFormat: "dd.mm.yy",
                        minDate: new Date(currentYear, currentMonth, currentDate),
                        beforeShow: function (input, inst) {
                            setTimeout(function () {
                                if (window.innerHeight < 700) {
                                    inst.dpDiv.center();
                                }
                            }, 0);
                        },
                        beforeShowDay: function (date) {
                            daysToEnable = $(`button[data-id=${id}]`).data("daystoenable");
                            daysIndexes = Object.values(daysToEnable);
                            if (daysIndexes.indexOf(date.getDay()) == -1) {
                                return [false, ""];
                            } else {
                                return [true, ""];
                            }
                        },
                        onSelect: function () {
                            let selectedDate = $(this).datepicker({ dateFormat: "dd.mm.yy" }).val();

                            $("#selected-date").attr("value", selectedDate);
                        },
                    });

                    $("#speciliastModal").on("hidden.bs.modal", function () {
                        $(`#specialist-day-${id}`).datepicker("setDate", null);
                        $(`#specialist-day-${id}`).datepicker("destroy");
                        $(`#specialist-day-${id}`).attr("id", "specialist-day");
                    });
                });
            },
        });
    });
});

new SlimSelect({
    select: "#type-select",
    searchingText: "Поиск...", // Optional - Will show during ajax request
    searchPlaceholder: "Поиск",
    placeholder: "Выберите направление",
    showSearch: false,
    searchFocus: false, // Whether or not to focus on the search input field
});
