<?php  include('header.php');?>
<?php include('sidebar.php');?>

<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food</a>
							<span class="breadcrumb-item active">Add Food</span>
						</div>
					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title font-weight-bold">Add Food Master</h5>
						<h6>Currently Not in Use</h6>
					</div>

					<div class="card-body">
						 <section class="panel">
        <header class="panel-heading">
            Food Combination List
            <!-- dtae filters -->

            <!-- <span class="tools pull-right">
                <form role="form" method="get" action="/index.php/auth_panel/web_user/all_user_list"  >
                    <select name="period" class="form-control input-sm m-bot15 period" onchange="this.form.submit()">
                        <option  value="today">Today</option>
                        <option   value="yesterday">Yesterday</option>
                        <option   value="7 days">Last 7 Days</option>
                        <option   value="current_month">Current Month</option>
                        <option   value="custom">Custom</option>
                        <option selected  value="all">All</option>
                    </select>
                    <input type='hidden' value='all' name='user'>                </form>
            </span> -->
            <!-- <span class="tools pull-right">
                <form id="download_content_csv" method="post" action=""  >
                    <button class="btn btn-sm btn-danger margin-right bold"> 
                        <i class="fa fa-file" aria-hidden="true"></i>
                        Download csv 
                    </button>
                    <input name="download_pdf" class="btn btn-info btn-sm  margin-right bold" value="Download PDF" type="submit">
                    <textarea style="display:none;" name="input_json"></textarea>
                </form>
            </span> -->
        </header>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="adv-table ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
                    <table  class="table display table-bordered table-striped" id="all-user-grid">
                        <thead>
                            <tr>
                               
                                <th>Food Combination</th>
                                <th>Placement Name</th>
                                <th>Food Type</th>
                                <th>Food Disease</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <tr>
                                <th><input type="text" data-column="1"  class="search-input-text form-control"></th>
                                <th><input type="text" data-column="2"  class="search-input-text form-control"></th>
                                <th><input type="text" data-column="3"  class="search-input-text form-control"></th>
                                <th><input type="text" data-column="4"  class="search-input-text form-control"></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<!-- /content area -->
			 <!-- js placed at the end of the document so the pages load faster -->
       

        <!-- Latest compiled and minified JavaScript -->
       
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script><script type="text/javascript" language="javascript" >
                        var all_user_all = "<?=base_url()?>" + "Admin/ajax_fn";
                        //    var all_user_csv = "https://ecareerpoint.com/index.php/auth_panel/web_user/get_request_for_csv_download/0?period=&user=";

                                jQuery(document).ready(function () {
                                    var table = 'all-user-grid';
                                    var dataTable_user = jQuery("#" + table).DataTable({
                                        "processing": true,
                                        "language": {
                                            "processing": "<i class='fa fa-spin  fa-spinner fa-4x' style='z-index:999'><i>" //add a loading image,simply putting <img src="loader.gif" /> tag.
                                        },
                                        "bSortCellsTop": true,
                                        "pageLength": 100,
                                        "lengthMenu": [15, 25, 50, 100,500,1000],
                                        "serverSide": true,
                                        "order": [[0, "desc"]],
                                        "ajax": {
                                            url: all_user_all, // json datasource
                                            type: "post", // method  , by default get
                                            error: function () {  // error handling
                                                jQuery("." + table + "-error").html("");
                                                jQuery("#" + table + "_processing").css("display", "none");
                                            }
                                        }
                                    });
                                    dataTable_user.column([]).visible(false);
                                    jQuery("#" + table + "_filter").css("display", "none");
                                    $('.search-input-text').on('keyup click', function () {   // for text boxes
                                        var i = $(this).attr('data-column'); // getting column index
                                        var v = $(this).val(); // getting search input value
                                        dataTable_user.columns(i).search(v).draw();
                                    });
                                    $('.search-input-select').on('change', function () {   // for select box
                                        var i = $(this).attr('data-column');
                                        var v = $(this).val();
                                        dataTable_user.columns(i).search(v).draw();
                                    });
                                    // Re-draw the table when the a date range filter changes
                                    $('.date-range-filter').change(function () {
                                        if ($('#min-date-user').val() != "" && $('#max-date-user').val() != "") {
                                            var dates = $('#min-date-user').val() + ',' + $('#max-date-user').val();
                                            dataTable_user.columns(8).search(dates).draw();
                                        }
                                    });
                                    $('.date-range-filter-clear').on('click', function () {
                                        // clear date filter
                                        $('#min-date-course-transaction').val('');
                                        $('#max-date-course-transaction').val("");
                                        dataTable_transaction.columns(9).search('').draw();
                                    });
                                    $(document).ajaxComplete(function (event, xhr, settings) {
                                        if (settings.url === all_user_all) {
                                            var obj = jQuery.parseJSON(xhr.responseText);
                                            var read = obj.posted_data;
                                            $('#download_content_csv').attr('action', all_user_csv);
                                            $('textarea[name=input_json]').val(JSON.stringify(read));
                                        }
                                    });
                                });
                                $('#min-date-course-transaction').datepicker({
                                    format: 'dd-mm-yyyy',
                                    autoclose: true
                                });
                                $('#max-date-course-transaction').datepicker({
                                    format: 'dd-mm-yyyy',
                                    autoclose: true
                                });
                                $('.period').on('change', function () {
                                    period = $(this).val();
                                    if (period == "custom") {
                                        $('.custom_search').show();
                                    }
                                });
</script>

<?php include('footer.php');?>