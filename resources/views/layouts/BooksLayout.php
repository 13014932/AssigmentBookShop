<!DOCTYPE html>
<html lang="en">
<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Shop</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- Bootstrap CRUD Data Table for Database with Modal Form-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!---------------------------------------------->


    <!--  styles for datatable -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <!-- Script/LIb for datatable -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--    <script src="https://cdn.datatables.net/plug-ins/1.10.16/api/sum().js"></script>-->

    <!-- CHECKBOX LIB -->
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css"
          rel="stylesheet"/>
    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>


</head>
<style>

    table.datatable.cell-border tbody th, table.datatable.cell-border tbody td {
        border-top: 1px solid #ddd;
        border-right: 1px solid #ddd;
    }

    table.datatable.cell-border tbody tr th:first-child,
    table.datatable.cell-border tbody tr td:first-child {
        border-left: 1px solid #ddd;
    }

    table.datatable.cell-border tbody tr:first-child th,
    table.datatable.cell-border tbody tr:first-child td {
        border-top: none;
    }


    .brd {

        border-radius: 25px;

    }
</style>
<!-- admminbooks page styles-->
<style>

    table.dataTable td {

        text-align: center;
    }

    /*massge on column hover*/
    .message {
        display: none;
        color: #000;
        background: #999;
        position: absolute;
        top: 10px;
    }

    th {
        position: relative;
    }

    .anchor:hover + .message {
        display: block !important;
        z-index: 10;
    }

</style>
<!-- userbooks page styles-->
<style>


    table.dataTable td {

        text-align: center;
    }
    /*massge on column hover*/
    .message{
        display:none;
        color:#000;
        background:#999;
        position:absolute;
        top:10px;
    }

    th{
        position:relative;
    }

    .anchor:hover + .message{
        display:block !important;
        z-index:10;
    }
    .qtydisable{
        width: 40px;
        background-color: beige;
        text-align: center;

    }

</style>
<body>

</body>
</html>