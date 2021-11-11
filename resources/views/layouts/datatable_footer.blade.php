<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function() {

    var table = $('.yajra-datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('blogs.listing') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'title',
          name: 'title'
        },
        {
          data: 'description',
          name: 'description'
        },
        {
          data: 'category',
          name: 'category'
        },
        {
          data: 'image',
          name: 'image',
          render: function(data, type, row) {
            return (
              '<a  target="_blank" href="./storage/uploads/' +
              row.image +
              '">' +
              '<img src="./storage/uploads/' +
              row.image +
              '" class="img-responsive" width="w-100" height="100" id="image' +
              row.id +
              '"></a>'
            );
          },
        },

        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true
        },
      ]
    });

  });
</script>