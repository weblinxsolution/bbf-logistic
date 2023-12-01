<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; by BBF logistic 2023</p>
    </div>
</div>
<!--**********************************
                    Footer end
                ***********************************-->
</div>
<!--**********************************
                Main wrapper end
            ***********************************-->
<!--**********************************
                Scripts
            ***********************************-->

<script>
    $('.report-filter').change(function() {
        var filter = $(this).val();

        var teacher =
            '<label>Teacher</label><select id="inputState" class="form-control"><option selected="selected">Choose...</option><option>Option 1</option><option>Option 2</option><option>Option 3</option></select>';
        var student =
            '<label>Student</label><select id="inputState" class="form-control"><option selected="selected">Choose...</option><option>Option 1</option><option>Option 2</option><option>Option 3</option></select>';
        if (filter == 'teacher') {
            $('#set_role').html(teacher)
        } else {
            $('#set_role').html(student)
        }
    })

    $('.choose_days').click(function() {
        $(this).next().slideToggle();
    })

    function appendQuestions() {
        var question =
            "<div class='form-row'><div class='col-lg-12'><button type='button' class='btn btn-danger d-block mt-4 px-3 ml-auto' onclick='this.parentNode.parentNode.remove()'><i class='icon-trash fa-lg'></i></button></div><div class='form-group col-md-6'><label>Question</label><input type='text' class='form-control' placeholder='Question'></div><div class='form-group col-md-6'><label>Audio</label><input type='file' class='form-control'></div><div class='form-row col-md-12 d-flex flex-wrap'><div class='col-lg-3'><label for='q1' class='ml-2'>Awsner 1</label><div class='d-flex align-items-center'><input type='radio' name='correct' class='mr-2'><input type='text' name='question' id='q1' class='form-control' placeholder='Awnser 1'></div></div><div class='col-lg-3'><label for='q2' class='ml-2'>Awsner 2</label><div class='d-flex align-items-center'><input type='radio' name='correct' class='mr-2'><input type='text' name='question' id='q2' class='form-control' placeholder='Awnser 2'></div></div><div class='col-lg-3'><label for='q3' class='ml-2'>Awsner 3</label><div class='d-flex align-items-center'><input type='radio' name='correct' class='mr-2'><input type='text' name='question' id='q3' class='form-control' placeholder='Awnser 3'></div></div><div class='col-lg-3'><label for='q4' class='ml-2'>Awsner 4</label><div class='d-flex align-items-center'><input type='radio' name='correct' class='mr-2'><input type='text' name='question' id='q4' class='form-control' placeholder='Awnser 4'></div></div></div></div>";
        document.getElementById('question_box').insertAdjacentHTML('beforeend', question);
    }
</script>

<script src="{{ asset('admin/plugins/common/common.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/js/settings.js') }}"></script>
<script src="{{ asset('admin/js/gleek.js') }}"></script>
<script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>

<!-- Chartjs -->
<script src="{{ asset('admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<!-- Circle progress -->
<script src="{{ asset('admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
<!-- Datamap -->
<script src="{{ asset('admin/plugins/d3v3/index.js') }}"></script>
<script src="{{ asset('admin/plugins/topojson/topojson.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
<!-- Morrisjs -->
<script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
<!-- Pignose Calender -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
<!-- ChartistJS -->
<script src="{{ asset('admin/plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>

<!-- For Calendar -->
<script src="{{ asset('admin/plugins/jqueryui/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins-init/fullcalendar-init.js') }}"></script>

<!-- Data Table JS -->
<script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admnin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
<script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>
