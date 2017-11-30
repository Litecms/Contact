<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> {!! trans('contact::contact.name') !!} <small> {!! trans('app.manage') !!} {!! trans('contact::contact.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('contact::contact.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='contact-contact-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs primary">
                <li class="active"><a href="#tab-pages-active" data-toggle="tab">{!! trans('contact::contact.names') !!}</a></li>
            </ul>
            <div class="tab-content">
            <table id="contact-contact-list" class="table table-striped data-table">
                <thead class="list_head">
                    <th>{!! trans('contact::contact.label.name')!!}</th>
                                <th>{!! trans('contact::contact.label.phone')!!}</th>
                                <th>{!! trans('contact::contact.label.mobile')!!}</th>
                                <th>{!! trans('contact::contact.label.email')!!}</th>
                                <th>{!! trans('contact::contact.label.city')!!}</th>
                </thead>
                <thead  class="search_bar">
                    <th>{!! Form::text('search[name]')->raw()!!}</th>
                                <th>{!! Form::text('search[phone]')->raw()!!}</th>
                                <th>{!! Form::text('search[mobile]')->raw()!!}</th>
                                <th>{!! Form::text('search[email]')->raw()!!}</th>
                                <th>{!! Form::text('search[city]')->raw()!!}</th>
                </thead>
            </table>
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#contact-contact-entry', '{!!guard_url('contact/contact/0')!!}');
    oTable = $('#contact-contact-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! guard_url('contact/contact') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#contact-contact-list .search_bar input, #contact-contact-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'name'},
                    {data :'phone'},
                    {data :'mobile'},
                    {data :'email'},
                    {data :'city'},
        ],
        "pageLength": 25
    });

    $('#contact-contact-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#contact-contact-list').DataTable().row( this ).data();

        $('#contact-contact-entry').load('{!!guard_url('contact/contact')!!}' + '/' + d.id);
    });

    $("#contact-contact-list .search_bar input, #contact-contact-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
