<?php echo View::make('layouts.BootStrapTable'); ?>
<?php echo View::make('datatable.DataTableLib'); ?>

<h1></h1>
<?php

if (Session::has('success')) {

    echo "<div class=\"alert alert-success alert-dismissible\" > <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><ul >";

    foreach (Session::get('success') as $suc) {


        echo "<h2 ><li >" . $suc . "</li ></h2 ></ul>
</div>";


    }

}

if ($errors->any()) {

    echo "<div class=\"alert alert-danger alert-dismissible\" > <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><ul >";

    foreach ($errors->all() as $error) {


        echo "<h2 ><li >" . $error . "</li ></h2 ></ul></div>";


    }

}
?>


<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-lg-4">
                    <h2><span>Admin Books View Table</span></h2>

                </div>


                <div class="col-lg-8">

                    <a href="#addBookModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Create A New Book</span></a>

                </div>
            </div>
        </div>

        <table class="table table-striped table-hover display " cellspacing="0" id="datatable">
            <thead>
            <tr>

                <th class='space'>Book-ID</th>
                <th class='space'>S.NO.</th>
                <th class='space'>Book-Name</th>

                <th class='space'>Book-Price</th>
                <th class='space'>special_price</th>

                <th class='space'>Book-Author_name</th>
                <th class='space'>Book-created_date</th>

                <th>Book-Quantity</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


        <script>


            //
            <!-- DATATABLE  PROCESSING (SERVER-SIDE)-->
            $(document).ready(function () {


                $('#datatable tbody').on('click', 'tr', function () {

//                      console.log( table.row( this ).data() );
                    var mydata = table.row(this).data();
                    $("#book_del_id").val(mydata.id);
                    $("#book_view_id").val(mydata.id);
// below code for pass the value of each book coulmn to model text fields to view the details of the books.
                    $("#book_view_name").val(mydata.name);
                    $("#book_view_price").val(mydata.price);
                    $("#book_view_author_name").val(mydata.author_name);
                    $("#book_view_special_price").val(mydata.special_price);
                    $("#book_view_created_date").val(mydata.book_created_date);
                    $("#book_view_quantity").val(mydata.quantity);
// below code for pass the value of each book coulmn to model text fields to view the details of the books.
                    $("#update_book_id").val(mydata.id);
                    $("#update_book_name").val(mydata.name);
                    $("#update_book_price").val(mydata.price);
                    $("#update_book_author_name").val(mydata.author_name);
                    $("#update_book_special_price").val(mydata.special_price);
                    $("#update_book_created_date").val(mydata.book_created_date);
                    $("#update_book_quantity").val(mydata.quantity);

                });

                var table = $('#datatable').DataTable({


                    'columnDefs': [


                        {
                            "targets": 1,
                            "searchable": false,
                            "orderable": false,


                        },

                        {
                            "targets": 8,
                            "searchable": false,
                            "orderable": false

                        },
                        {
                            "targets": 9,
                            "searchable": false,
                            "orderable": false


                        },
                        {
                            "targets": 10,
                            "searchable": false,
                            "orderable": false


                        },
                        {
                            "targets": 8,

                            "render": function () {

                                return '<a href="#viewBookModal" class="view " data-toggle="modal"><i class=" fa fa-eye" data-toggle="tooltip" title="View Current Book Details"></i></a>';


                            }
                        },
                        {
                            "targets": 9,

                            "render": function () {

//                                return '<a  href="edituser/67202" class="edit" ><i class=" fa fa-pencil" data-toggle="tooltip" title="Edit Login Accounts "></i></a>';
                                return '<a href="#editBookModal" class="edit" data-toggle="modal"><i class=" fa fa-pencil" data-toggle="tooltip" title="Edit Current Book Details"></i></a>';


                            }
                        },
                        {
                            "targets": 10,

                            "render": function () {


                                return '<a href="#deleteBookModal" class="delete" data-toggle="modal"><i class=" fa fa-trash" data-toggle="tooltip"  title="DELETE Current Book "> </i></a>';


                            }
                        }

                    ],
                    'select': {
                        'style': 'multi'
                    },
                    'order': [[0, 'asc']],
                    "tabIndex": 2,
                    "language": {
                        "lengthMenu": "Display _MENU_ Books per page",
                        "info": "Showing _START_ to _END_ of _TOTAL_ Books",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search": "Search Books:",
                        "processing": "Hang on. Waiting for response..."
                    },

                    "processing": true,
                    "serverSide": true,
                    "pagingType": "full_numbers",
                    "scrollY": "560px",
                    "scrollCollapse": true,
                    "lengthMenu": [10, 25, 50, 100, 500],
                    "ajax": "<?= route('books') ?>",
//                    "deferLoading": 75,
//                    "deferLoading": [ 10, 100 ],
//                    "search": {
//                        "search": "my_filter"
//                    },
//                    scroller: {
//                        displayBuffer: 20
//                    },

                    "columns": [

                        {"data": "id"},
                        {"data": null},

                        {"data": "name"},

                        {"data": "price"},
                        {"data": "special_price"},
                        {"data": "author_name"},
                        {"data": "book_created_date"},

                        {"data": "quantity"},
                        {"data": null},
                        {"data": null},
                        {"data": null}

                    ]


                });
                table.on('order.dt search.dt processing.dt page.dt  ', function () {
                    table.column(1).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                        var info = table.page.info();
                        var length_process = info.length;
                        var page = info.page + 1;
                        if (page > '1') {
                            var pageprocess = (page - 1) * length_process;  // u can change this value of ur page
                            cell.innerHTML = pageprocess + i + 1;
                        }
                    });
                });


            });
        </script>


    </div>

</div>


