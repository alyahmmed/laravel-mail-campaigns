<!DOCTYPE html>
<html>
    <head>
        <base href='{{URL::to('/public/') }}' />
        <script>var base = '{{ URL::to('/public/') }}';</script>
        <meta charset="utf-8">
        <!--<link rel="shortcut icon" type="image/png" href="assets/front/images/icons/fav.png">-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') </title>
        <link href="./assets/backend/ui/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/backend/ui/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Jquery 2.1.1 -->
        <script src="./assets/backend/ui/js/jquery-2.1.1.js"></script>
        <!-- Toastr style -->
        <link href="./assets/backend/ui/css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <!-- Datatable -->
        <link href="./assets/backend/ui/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <!-- Sweet Alert -->
        <link href="./assets/backend/ui/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <!-- blueimp gallery -->
        <link href="./assets/backend/ui/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
        <!-- Select2 -->
        <!--<link href="./assets/backend/ui/css/plugins/select2/select2.min.css" rel="stylesheet">-->
        <link href="./assets/backend/plugins/select2-4.0.3/dist/css/select2.min.css" rel="stylesheet" />

        <link href="./assets/backend/ui/css/plugins/iCheck/custom.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/chosen/chosen.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

        <!--<link href="./assets/backend/ui/css/plugins/cropper/cropper.min.css" rel="stylesheet">-->

        <link href="./assets/backend/ui/css/plugins/switchery/switchery.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="./assets/backend/ui/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        <link href="./assets/backend/ui/css/animate.css" rel="stylesheet">
        <link href="./assets/backend/ui/css/style.css" rel="stylesheet">
        <link href="./assets/backend/ui/css/plugins/codemirror/codemirror.css" rel="stylesheet">
        <link href="./assets/backend/ui/css/plugins/codemirror/ambiance.css" rel="stylesheet">
        <!-- Bootstrap Tour -->
        <link href="./assets/backend/ui/css/plugins/bootstrapTour/bootstrap-tour.min.css" rel="stylesheet">
        <!-- Tree View -->
        <link href="./assets/backend/ui/css/plugins/jsTree/style.min.css" rel="stylesheet">
        <!-- Steps -->
        <link href="./assets/backend/ui/css/plugins/steps/jquery.steps.css" rel="stylesheet">
        <!-- Flags -->
        <!--<link rel="stylesheet" type="text/css" href="./assets/backend/ui/js/flags-selector/flagstrap.css">-->
        <!-- Languages -->
        <link rel="stylesheet" href="assets/backend/ui/css/plugins/bootstrap-languages/languages.min.css"/>

    </head>    
    <body class="fixed-sidebar no-skin-config full-height-layout">
        

        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="{{\URL::Current().'#'}}"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a data-guarded="1" href="{{url('/backend/auth/logout')}}">
                                    <i class="fa fa-sign-out"></i> Sign Out
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                @yield('content')
                <div class="footer">
                    
                </div>

            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="./assets/backend/ui/js/jquery-ui-1.10.4.min.js"></script>
        <script src="./assets/backend/ui/js/bootstrap.min.js"></script>
        <script src="./assets/backend/ui/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="./assets/backend/ui/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="./assets/backend/ui/js/inspinia.js"></script>
        <script src="./assets/backend/ui/js/plugins/pace/pace.min.js"></script>
        <!-- Sweet alert -->
        <script src="./assets/backend/ui/js/plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Chosen -->
        <script src="./assets/backend/ui/js/plugins/chosen/chosen.jquery.js"></script>

        <!-- JSKnob -->
        <script src="./assets/backend/ui/js/plugins/jsKnob/jquery.knob.js"></script>

        <!-- DataTable -->
        <script src="./assets/backend/ui/js/plugins/dataTables/datatables.min.js"></script>

        <!-- Toastr script -->
        <script src="./assets/backend/ui/js/plugins/toastr/toastr.min.js"></script>

        <!-- blueimp gallery -->
        <script src="./assets/backend/ui/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

        <!-- Jquery Validate -->
        <script src="./assets/backend/ui/js/plugins/validate/jquery.validate.min.js"></script>

        <!-- Select2 -->
        <!--<script src="./assets/backend/ui/js/plugins/select2/select2.full.min.js"></script>-->
        <script src="./assets/backend/plugins/select2-4.0.3/dist/js/select2.full.min.js"></script>

        <!-- Input Mask-->
        <script src="./assets/backend/ui/js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <!-- Data picker -->
        <script src="./assets/backend/ui/js/plugins/datapicker/bootstrap-datepicker.js"></script>

        <!-- NouSlider -->
        <script src="./assets/backend/ui/js/plugins/nouslider/jquery.nouislider.min.js"></script>

        <!-- Switchery -->
        <script src="./assets/backend/ui/js/plugins/switchery/switchery.js"></script>

        <!-- IonRangeSlider -->
        <script src="./assets/backend/ui/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

        <!-- iCheck -->
        <script src="./assets/backend/ui/js/plugins/iCheck/icheck.min.js"></script>

        <!-- MENU -->
        <script src="./assets/backend/ui/js/plugins/metisMenu/jquery.metisMenu.js"></script>

        <!-- Color picker -->
        <script src="./assets/backend/ui/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

        <!-- Clock picker -->
        <script src="./assets/backend/ui/js/plugins/clockpicker/clockpicker.js"></script>

        <!-- Image cropper -->
        <!--<script src="./assets/backend/ui/js/plugins/cropper/cropper.min.js"></script>-->

        <!-- Date range use moment.js same as full calendar plugin -->
        <script src="./assets/backend/ui/js/plugins/fullcalendar/moment.min.js"></script>

        <!-- Date range picker -->
        <script src="./assets/backend/ui/js/plugins/daterangepicker/daterangepicker.js"></script>

        <!-- TouchSpin -->
        <script src="./assets/backend/ui/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Nestable List -->
        <script src="./assets/backend/ui/js/plugins/nestable/jquery.nestable.js"></script>

        <!-- Bootstrap Tour -->
        <script src="./assets/backend/ui/js/plugins/bootstrapTour/bootstrap-tour.min.js"></script>
        <!-- Steps -->
        <script src="./assets/backend/ui/js/plugins/staps/jquery.steps.min.js"></script>
        <!-- Jquery Validate -->
        <script src="./assets/backend/ui/js/plugins/validate/jquery.validate.min.js"></script>
        <script src="./assets/backend/functions.js"></script>
        @yield('js')
        @yield('footer-js')
        @if(!isset($_SESSION['is_super']))
        @endif
        <script>
            $(document).ready(function () {
                jQuery.validator.addMethod("english_only", function (value, element) {
                    return this.optional(element) || /^[a-z\s]+$/i.test(value);
                }, "English Letters only please");
            });

            $(document).ready(function () {


                $("#todo, #inprogress, #completed").sortable({
                    connectWith: ".connectList",
                    update: function (event, ui) {

                        var todo = $("#todo").sortable("toArray");
                        var inprogress = $("#inprogress").sortable("toArray");
                        var completed = $("#completed").sortable("toArray");
                        $('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                    }
                }).disableSelection();

            });
        </script>
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function () {
                $('a[href="https://froala.com/wysiwyg-editor"]').remove();
                /* Init DataTables */
                $('.example1').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true
                });

                $('.example2').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true
                });
                $('.example3').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true
                });
                $('.example4').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true
                });
                $('.example5').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('.example6').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true
                });

                /* Slider2 */
                $(".select2clear").select2({
                    placeholder: "Select an Option",
                    allowClear: true
                });
                $(".select2placeholder").select2({
                    placeholder: "Select one",
                    allowClear: true
                });
//                $(".select2").select2();

                var config = {
                    '.chosen-select': {},
                    '.chosen-select-deselect': {allow_single_deselect: true},
                    '.chosen-select-no-single': {disable_search_threshold: 10},
                    '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                    '.chosen-select-width': {width: "95%"}
                }
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }

                


                /* Datepicker */
                $('.dataPackerDateMonth').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true,
                    startDate: "today",
                    format: "dd/MM"
                });

                $('.dataPacker .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true,
                    format: "yyyy/mm/dd"
                });
                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });

                $('#data_2 .input-group.date').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: "dd/mm/yyyy"
                });

                $('#data_3 .input-group.date').datepicker({
                    startView: 2,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('#data_4 .input-group.date').datepicker({
                    minViewMode: 1,
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true
                });

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('input[name="daterange"]').daterangepicker();

                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {days: 60},
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-primary',
                    cancelClass: 'btn-default',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });

                /* Colokpicker */
                $('.clockpicker').clockpicker();

                /* Switch */
                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, {color: '#1AB394'});

                var elem_2 = document.querySelector('.js-switch_2');
                var switchery_2 = new Switchery(elem_2, {color: '#ED5565'});

                var elem_3 = document.querySelector('.js-switch_3');
                var switchery_3 = new Switchery(elem_3, {color: '#1AB394'});

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });

                
                /* Touchspain */
                $(".touchspin1").TouchSpin({
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });

                $(".touchspin2").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%',
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });

                $(".touchspin3").TouchSpin({
                    verticalbuttons: true,
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });

                /* Range Slider */
                $("#ionrange_1").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    type: 'double',
                    prefix: "$",
                    maxPostfix: "+",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_2").ionRangeSlider({
                    min: 0,
                    max: 10,
                    type: 'single',
                    step: 0.1,
                    postfix: " carats",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_3").ionRangeSlider({
                    min: -50,
                    max: 50,
                    from: 0,
                    postfix: "ï¿½",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_4").ionRangeSlider({
                    values: [
                        "January", "February", "March",
                        "April", "May", "June",
                        "July", "August", "September",
                        "October", "November", "December"
                    ],
                    type: 'single',
                    hasGrid: true
                });

                $("#ionrange_5").ionRangeSlider({
                    min: 10000,
                    max: 100000,
                    step: 100,
                    postfix: " km",
                    from: 55000,
                    hideMinMax: true,
                    hideFromTo: false
                });

                $(".dial").knob();



                /* Sorting */
                $("#todo, #inprogress, #completed").sortable({
                    connectWith: ".connectList",
                    update: function (event, ui) {

                        var todo = $("#todo").sortable("toArray");
                        var inprogress = $("#inprogress").sortable("toArray");
                        var completed = $("#completed").sortable("toArray");
                        $('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                    }
                }).disableSelection();


            });




        </script>

        <script>
            $(document).ready(function () {
                $("#wizard").steps();
                $("#form").steps({
                    bodyTag: "fieldset",
                    onStepChanging: function (event, currentIndex, newIndex)
                    {
                        // Always allow going backward even if the current step contains invalid fields!
                        if (currentIndex > newIndex)
                        {
                            return true;
                        }

                        // Forbid suppressing "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age").val()) < 18)
                        {
                            return false;
                        }

                        var form = $(this);

                        // Clean up if user went backward before
                        if (currentIndex < newIndex)
                        {
                            // To remove error styles
                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                        }

                        // Disable validation on fields that are disabled or hidden.
                        form.validate().settings.ignore = ":disabled,:hidden";

                        // Start validation; Prevent going forward if false
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex)
                    {
                        // Suppress (skip) "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age").val()) >= 18)
                        {
                            $(this).steps("next");
                        }

                        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3)
                        {
                            $(this).steps("previous");
                        }
                    },
                    onFinishing: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Disable validation on fields that are disabled.
                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                        form.validate().settings.ignore = ":disabled";

                        // Start validation; Prevent form submission if false
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Submit form input
                        form.submit();
                    }
                }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
            });
        </script>


    </body>
</html>