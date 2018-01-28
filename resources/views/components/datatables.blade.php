@section('css_head')
@parent
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables/media/css/jquery.dataTables.min.css')}}">
<style>
	.dataTable tfoot {display: table-header-group;}
</style>
@endsection

@section('js_bottom')
@parent
<script type="text/javascript" charset="utf8" src="{{asset('bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
    	
        $('.filterable tfoot th:not(.no-filter)').each(function(){
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control"/>' );
        });

        // DataTable
        var table = $('.filterable')
            .on('init.dt', function(){
                $('.dataTables_wrapper').find('select,input').addClass('form-control');
            })
            .DataTable({
            	"columnDefs": [{
                    targets: "no-sort",
                    orderable: false
                }]
            });
     
        // Apply the search
        
        table.columns().eq(0).each( function (colId) {
            var that = this;
     
            $( 'input', this.column(colId).footer() ).on( 'keyup change', function () {
                
                if ( that.search() !== this.value ) {
                    that
                    	.column( colId )
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    });
</script>
@endsection
