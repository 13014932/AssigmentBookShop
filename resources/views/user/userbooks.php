
<?php echo View::make('layouts.BootStrapTable'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function stoppedBuysss(){
        if(document.getElementById('book_quantity').value <= 0)
        {
            $('button[id^="book_buy"]').prop('disabled', true);
        }
        else
        {
            $('button[id^="book_buy"]').prop('disabled', false);
        }


        /*
        if(document.getElementById('book_quantity').value <= 0) {
                    document.getElementById('book_buy').disabled =true;
                } else {
                    document.getElementById('book_buy').disabled =false;
                }
        */

    }

    function stoppedTyping(){

        if(document.getElementById('mbook_quantity').value <= 0) {
            document.getElementById('mbook_buy').disabled =true;
        } else {
            document.getElementById('mbook_buy').disabled =false;
        }
    }
    function maxStoppedTyping(){

        var temp =document.getElementById('book_temp_qty').value;


        if(document.getElementById('mbook_quantity').value > temp) {
            alert('Book Quantity Not Greater Then => ' + temp);
            document.getElementById('mbook_buy').disabled =true;
        }
        else {
            document.getElementById('mbook_buy').disabled =false;
        }
    }
</script>
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
<body onload="stoppedBuy()">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-lg-4">
                    <h2><span>Books View Table</span></h2>

                    <!--                                        <a href="#" class="btn btn-info btn-lg">-->
                    <!--                                            <span class="glyphicon glyphicon-refresh"> </span>-->
                    <!--                                        </a>-->

                </div>
                <div class="col-lg-6">
                    <a href="/buydbooks" class="btn btn-success"  data-toggle="modal"><i class="material-icons">&#xE417;</i>
                        <span>View Buyed Books</span></a>

                </div>

            </div>
        </div>

        <table class="table table-striped table-hover display " cellspacing="0" id="datatable">
            <thead>
            <tr>


                <th class='space'>Book-ID</th>

                <th class='space'>Book-Name</th>

                <th class='space'>Book-Price</th>
                <th class='space'>special_price</th>

                <th class='space'>Book-Author_name</th>
                <th class='space'>Book-created_date</th>

                <th >Book-Quantity</th>
                <th >action</th>


            </tr>
            </thead>
            <tbody>


            <?php
            // $vendors - vendors data come from VendorsController
            foreach ($showdata as $book) {



                echo "<tr><td class='space'>" . $book->id . "</td>";
                echo "<td class='space' >". $book->name . "</td>";
                echo "<td class='space'>" . $book->price . "</td>";
                echo "<td class='space'>" . $book->special_price . "</td>";
                echo "<td class='space'>" . $book->author_name . "</td>";
                echo "<td class='space'>" . $book->book_created_date . "</td>";
                echo "<td class='space'>" ."<input type=\"text\" value=\"$book->quantity\"  id=\"book_quantity\" name=\"book_quantity\" class=\"qtydisable\" readonly>". "</td>";


                echo "<td class='space'>" ."  "." "." <a href=\"#BookBuyModal\"   onclick='bookDetail($book->id,$book->price,$book->quantity)' data-toggle=\"modal\"><button  name='book_buy' id='book_buy' type=\"button\" >BUY BOOK</button></a> ". "</td>";



            }
            ?>
            </tr>
            </tbody>
        </table>


    </div>

</div>
<script>

    function bookDetail(id,price,quantity) {
        $("#book_id").val(id);
        $("#book_price").val(price);
        $("#mbook_quantity").val(quantity);
        $("#book_temp_qty").val(quantity);

    }

</script>

<!-- Edit Vendor Split Modal HTML -->

<div id="BookBuyModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/buybook">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                <div class="modal-header">
                    <h4 class="modal-title">BUY BOOK !</h4><br>

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Book Details</label><br><br>
                        <!--                         <input type="checkbox"  required>Percentage<br>-->
                        <!--                     <input type="checkbox"  required>   Fixed Amount<br><br>-->
                        <label class="custom-control custom-checkbox">
                            <span >BOOK-ID</span>  <input type="number" name="book_id" id="book_id"  readonly>
                        </label><br><br>
                        <label class="custom-control custom-checkbox">
                            <span >BOOK PRICE</span>  <input type="text" name="book_price" id="book_price" readonly>

                            <input type="hidden" name="book_temp_qty" id="book_temp_qty" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label><b>Book Quantity</label>


                        <input type="number" id="mbook_quantity" name="mbook_quantity"  oninput="stoppedTyping()"  onchange="maxStoppedTyping()" class="form-control"  required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal"  value="Cancel">


                    <input type="submit" class="btn btn-info" name='mbook_buy' id='mbook_buy' onmouseover ="stoppedTyping()"  value="Buy NOW !">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
