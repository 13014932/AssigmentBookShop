
<?php echo View::make('layouts.BootStrapTable'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
// Method to disable button's whose value is less then or equal to zero (currently not in use).
    function stopBuyssd(){
        if(document.getElementById('book_quantity').value <= 0)
        {
            $('button[id^="book_buy"]').prop('disabled', true);
        }
        else
        {
            $('button[id^="book_buy"]').prop('disabled', false);
        }

    }
// Method to disable buy button when book quantity value is less then or equal to zero.
    function disableBuyButton(){

        if(document.getElementById('model_book_quantity').value <= 0) {
            document.getElementById('model_book_buy').disabled =true;
        } else {
            document.getElementById('model_book_buy').disabled =false;
        }
    }
// Method to disable buy button when book quantity value is greater then book quantity.
    function disableBuyButtonHighQty(){

        var temp =document.getElementById('book_temp_qty').value;

        if(document.getElementById('model_book_quantity').value > temp) {
            alert('Book Quantity Not Greater Then => ' + temp);
            document.getElementById('model_book_buy').disabled =true;
        }
        else {
            document.getElementById('model_book_buy').disabled =false;
        }
    }
</script>

<body onload="stopBuyss()">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-lg-4">
                    <h2><span>Books View Table</span></h2>

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
        $("#model_book_quantity").val(quantity);
        $("#book_temp_qty").val(quantity);

    }

</script>

</body>
