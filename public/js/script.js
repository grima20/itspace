const DataForm = {    1: {      backLevel: null,      idForm: 'idDate',      date: null,      nextLevel: 2    },    2: {      backLevel: 1,      idForm: 'idDate',      date: null,      nextLevel: 2    },    3: {        backLevel: 1,        idForm: 'idDate',        date: null,        nextLevel: 2    }};$('#DayUser').keyup(function () {    console.log($(this).val());    var now = new Date(); //Текущя дата    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate()); //Текущя дата без времени    var dob = new Date($(this).val()); //Дата рождения    var dobnow = new Date(today.getFullYear(), dob.getMonth(), dob.getDate()); //ДР в текущем году    var age; //Возраст//Возраст = текущий год - год рождения    age = today.getFullYear() - dob.getFullYear();//Если ДР в этом году ещё предстоит, то вычитаем из age один год    if (today < dobnow) {        age = age-1;    }    console.log(age);    $('#voz').val(age);});$('.start').on('click', function () {    $('#form-1').hide();    $('#form-2').fadeIn( "slow" );    $('.form-3').fadeIn( "slow" );    $('.form-4').hide();    $('.idProgressbar').html('0');    $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);});$('.btnForm').on('click', function () {    $('.form-3').hide();    $('.form-5').hide();    $('.form-4').fadeIn( "slow" );    $('.idProgressbar').html('29');    $('.progress-bar').css('width', '29%').attr('aria-valuenow', 29);});$('.btnForm-5').on('click', function () {    $('.form-4').hide();    $('.form-6').hide();    $('.form-5').fadeIn( "slow" );    $('.idProgressbar').html('58');    $('.progress-bar').css('width', '58%').attr('aria-valuenow', 58);});$('.btnForm-6').on('click', function () {    $('.form-5').hide();    $('.form-7').hide();    $('.form-6').fadeIn( "slow" );    $('.idProgressbar').html('62');    $('.progress-bar').css('width', '62%').attr('aria-valuenow', 62);});$('.btnForm-7').on('click', function () {    $('.form-6').hide();    $('.form-8').hide();    $('.form-7').fadeIn( "slow" );    $('.idProgressbar').html('75');    $('.progress-bar').css('width', '75%').attr('aria-valuenow', 75);});$('.btnForm-8').on('click', function () {    $('.form-7').hide();    $('.form-9').hide();    $('.form-8').fadeIn( "slow" );    $('.idProgressbar').html('92');    $('.progress-bar').css('width', '92%').attr('aria-valuenow', 92);});$('#btnForm-2').on('click', function (e) {    e.preventDefault();    $('.form-8').hide();    $('.form-result').fadeIn( "slow" );    $('.idProgressbar').html('100');    $('.progress-bar').css('width', '100%').attr('aria-valuenow', 25);    $.ajax({        url: '/result',        method: 'POST',        data: $('form').serialize(),        success: function (msg) {            console.log(JSON.parse(msg));            msg = JSON.parse(msg);            if(msg.status === 'success'){                $('.resetForm').removeClass('d-none');                $('.prgg').addClass('d-none');                $('.cardio-title').html('Результаты первичного тестирования');                $('.form-result').html(' <div class="text-muted mb-3">Результат для первичного прогноза и не является окончательным диагнозом, для окончательного решения необходимо проконсультироваться с врачом.</div>\n' +                    '                                    <div class="w-100 p-4 text-center r-8 bg-light mb-4">Сердечная недостаточность</div><div class="text-danger">У вас высокая вероятность заболевания сердечно-сосудистой системы. Обратитесь к врачу для более детального обследования</div> ');            }        }    });});$('.restart-form').on('click', function () {    $('.cardio-title').html('Заполните ваши личные данные');    $('.resetForm').addClass('d-none');    $('.prgg').removeClass('d-none');    $('.form-result').hide();    $('.form-3').fadeIn( "slow" );    $('.idProgressbar').html('0');    $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);});