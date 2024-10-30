<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm-6 my-1">
                {{-- <p class="m-0">Copyright with &copy; by IT Team <a href="https://ahmadfadillah.my.id"
                        target="_blank"> PT. SIMS JAYA KALTIM</a></p> --}}
            </div>
            <div class="col-sm-6 ms-auto my-1">
                <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                    <li class="list-inline-item"><a href="{{ route('dashboards.index') }}">v1.0.0</a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
@include('layout.theme')

<!-- [Page Specific JS] start -->
<script src="{{ asset('dashboard') }}/assets/js/plugins/apexcharts.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/jsvectormap.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/world.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/world-merc.js"></script>
{{-- <script src="{{ asset('dashboard') }}/assets/js/pages/dashboard-default.js"></script> --}}

<script src="{{ asset('dashboard') }}/assets/js/plugins/popper.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/simplebar.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/fonts/custom-font.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pcoded.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/feather.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/apexcharts.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/pages/w-chart.js"></script>

<!-- datatable Js -->
<script src="{{ asset('dashboard') }}/assets/js/jquery-3.6.0.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/dataTables.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/plugins/flatpickr.min.js"></script>
    <script>
      // minimum setup
      flatpickr(document.querySelector('#pc-date_range_picker-1'), {
        mode: 'range'
      });
      flatpickr(document.querySelector('#pc-date_range_picker-2'), {
        mode: 'range'
      });
      flatpickr(document.querySelector('#pc-date_range_picker-3'), {
        mode: 'range',
        minDate: 'today',
        dateFormat: 'Y-m-d',
        disable: [
          function (date) {
            return !(date.getDate() % 8);
          }
        ]
      });
      flatpickr(document.querySelector('#pc-date_range_picker-4'), {
        mode: 'range',
        dateFormat: 'Y-m-d',
        defaultDate: ['2016-10-10', '2016-10-20']
      });
    </script>
<script>
    // [ DOM/jquery ]
    var total, pageTotal;
    var table = $('#dom-jqry').DataTable();
    // [ column Rendering ]
    $('#colum-render').DataTable({
        columnDefs: [{
                render: function (data, type, row) {
                    return data + ' (' + row[3] + ')';
                },
                targets: 0
            },
            {
                visible: false,
                targets: [3]
            }
        ]
    });
    // [ Multiple Table Control Elements ]
    $('#multi-table').DataTable({
        dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
    });
    // [ Complex Headers With Column Visibility ]
    $('#complex-header').DataTable({
        columnDefs: [{
            visible: false,
            targets: -1
        }]
    });
    // [ Language file ]
    $('#lang-file').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json'
        }
    });
    // [ Setting Defaults ]
    $('#setting-default').DataTable();
    // [ Row Grouping ]
    var table1 = $('#row-grouping').DataTable({
        columnDefs: [{
            visible: false,
            targets: 2
        }],
        order: [
            [2, 'asc']
        ],
        displayLength: 25,
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api
                .rows({
                    page: 'current'
                })
                .nodes();
            var last = null;

            api
                .column(2, {
                    page: 'current'
                })
                .data()
                .each(function (group, i) {
                    if (last !== group) {
                        $(rows)
                            .eq(i)
                            .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

                        last = group;
                    }
                });
        }
    });
    // [ Order by the grouping ]
    $('#row-grouping tbody').on('click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    // [ Footer callback ]
    $('#footer-callback').DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total = api
                .column(4)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal = api
                .column(4, {
                    page: 'current'
                })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        }
    });
    // [ Custom Toolbar Elements ]
    $('#c-tool-ele').DataTable({
        dom: '<"toolbar">frtip'
    });
    // [ Custom Toolbar Elements ]
    $('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');
    // [ custom callback ]
    $('#row-callback').DataTable({
        createdRow: function (row, data, index) {
            if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
                $('td', row).eq(5).addClass('highlight');
            }
        }
    });

</script>


<script>
    layout_change('light');

</script>

<script>
    layout_sidebar_change('light');

</script>

<script>
    change_box_container('false');

</script>

<script>
    layout_caption_change('true');

</script>

<script>
    layout_rtl_change('false');

</script>

<script>
    preset_change('preset-1');

</script>


</body>

</html>
