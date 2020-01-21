

<!DOCTYPE html>


<html>


<head>


    <title>DATA INVENTORY</title>


    <link rel="stylesheet" href="css/bootstrap.css" />


</head>


<body>  


    <div class="container mt-3">


        <div class="row">


            <div class="col-sm-12">


                <button type="button"  


class="btn btn-primary btnTambahItem" data-toggle="modal"  


data-target="#exampleModal" data-zurl="">


                    Tambah Item


                </button>


                <h1>Data Transaksi</h1>


                <table class="table table-stripped">


                    <thead>


                        <tr>


                            <th scope="col">Customer Name</th>


                            <th scope="col">Stock Name</th>


                            <th scope="col">Reorder Point</th>
							
							<th scope="col">Amount_#1</th>
							
							<th scope="col">Discount (Rp)</th>

							<th scope="col">Amount #2</th>

                            <th scope="col" width="200px">Action</th>


                        </tr>


                    </thead>


                    <tbody>


                        <?php


                        include "Connection.php";


                        $conn = sqlsrv_connect( $serverName, $connectionInfo);



                        $tsql = "select Customer_Name, Stock_Name, Reorder_Point, Price_Unit, Discount, '' from STOCK A
									inner join TRANSACTION_DETAIL B on B.Stock_Id = A.Stock_Id
									inner join TRANSACTION_HEADER C on C.Trans_Id = B.Trans_Id
									inner join CUSTOMER D on D.Customer_Id = C.Customer_Id";
                        $stmt = sqlsrv_query( $conn, $tsql);



                        do {


                  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {                                  


                                ?>


                                <tr>


                                    <td><?= $row['customername'];?></td>


                                    <td><?= $row['stockname'];?></td>


                                    <td><?= $row['reorderpoint'];?></td>
									
									
									<td><?= $row['amount1'];?></td>
									
									
									<td><?= $row['discount'];?></td>
									
									
									<td><?= $row['amount2'];?></td>

                                </tr>


                                <?php


                            }


                        } while ( sqlsrv_next_result($stmt) );


                        ?>


                    </tbody>


                </table>        


            </div>


        </div>


    </div>



    <!-- Modal -->


    <div class="modal fade" id="exampleModal" tabindex="-1"  


role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


        <div class="modal-dialog" role="document">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title" id="exampleModalLabel">Tambah Item</h5>


                    <button type="button" class="close" 


                    data-dismiss="modal" aria-label="Close">


                        <span aria-hidden="true">&times;</span>


                    </button>


                </div>


                <div class="modal-body">


                    <form action="Simpan.php" method="POST"  


                     enctype="multipart/form-data">


                        <div class="form-group">


                            <label for="customername">Customer Name</label>


                            <input type="text" name="customername"  


                           id="customername" class="form-control" required="true">


                        </div>


                        <div class="form-group">


                            <label for="stockname">Stock Name</label>


                            <input type="text" name="stockname"  


                           id="stockname" class="form-control" required="true">


                        </div>


                        <div class="form-group">


                            <label for="satuan">Satuan</label>


                            <select name="satuan" id="satuan" 


                                 class="form-control" required="true">


                                <option>-- Pilih Satuan--</option>


                                <option value="PC">Piece</option>


                                <option value="KG">Kilo Gram</option>


                                <option value="M">Meter</option>


                            </select>


                        </div>


                    </div>


                    <div class="modal-footer">


                        <button type="button" class="btn btn-secondary"  


                         data-dismiss="modal">Close</button>


                        <button type="submit"  


                         class="btn btn-primary">Simpan</button>


                    </div>


                </form>


            </div>


        </div>


    </div>



    <script src="js/jquery-3.2.1.min.js"></script>


    <script src="js/popper.min.js"></script>


    <script src="js/bootstrap.js"></script>



    <script type="text/javascript">


        $(function(){



        $('.btnTambahItem').on('click', function(){


            $('#exampleModalLabel').html('Tambah Item');


            $('.modal-footer button[type=submit]').html('Simpan');


            $('.modal-body form').attr('action', 'Simpan.php');


        });

    })


    </script>


</body>


</html>

