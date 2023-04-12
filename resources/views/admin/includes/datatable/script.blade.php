<script>
    $(document).on('click', '.delete', function () {
        let url = $(this).attr('data-url');
        let id = $(this).attr('data-message');
        $('#deleteForm').attr('action', url);
        $('#deleteMessage').html(`${id}`);
        $('.modal').modal();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable({
            'language': {
                'zeroRecords': "{{ __('admin.label.datatable.zeroRecords') }}",
                'emptyTable': "{{ __('admin.label.datatable.emptyTable') }}",
                'search': "{{ __('admin.label.datatable.search') }}",
                'info': "{{ __('admin.label.datatable.info') }}",
                'infoEmpty': "{{ __('admin.label.datatable.infoEmpty') }}",
                'infoFiltered': "{{ __('admin.label.datatable.infoFiltered') }}",
                'paginate': {
                    'first': "{{ __('admin.label.datatable.first') }}",
                    'last': "{{ __('admin.label.datatable.last') }}",
                    'next': "{{ __('admin.label.datatable.next') }}",
                    'previous': "{{ __('admin.label.datatable.previous') }}"
                },
                'lengthMenu': "{{ __('admin.label.datatable.lengthMenu') }}",
            },
            'ordering': false,
        });
    });
</script>

<!-- Required datatable js -->
<script src="admin-assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin-assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="admin-assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin-assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="admin-assets/libs/jszip/jszip.min.js"></script>
<script src="admin-assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="admin-assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="admin-assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="admin-assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="admin-assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="admin-assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin-assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="admin-assets\js\pages\datatables.init.js"></script>
