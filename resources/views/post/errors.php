<h1></h1>
<?php
if ($errors->any()) {

    echo "<div class=\"alert alert-danger\" > <ul >" ;

foreach ($errors->all() as $error) {


    echo "<h2 ><li >".$error."</li ></h2 >";


}

}
?>
    </ul>
</div>


