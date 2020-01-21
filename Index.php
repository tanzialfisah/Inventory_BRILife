!DOCTYPE html>


<html>


<head>


    <title>INVENTORY</title>


    <link rel="stylesheet" href="css/bootstrap.css" />


</head>


<body>  


    <div class="container mt-3">


        <div class="row">


            <div class="col-sm-12">


                <button type="button"  


class="btn btn-primary btnTambahData" data-toggle="modal"  


data-target="#exampleModal" data-zurl="">


                    Tambah Barang


                </button>


                <h1>Data Barang</h1>


                <table class="table table-stripped">


                    <thead>


                        <tr>


                            <th scope="col">Nama</th>


                            <th scope="col">Nama Barang</th>


                            <th scope="col">Satuan</th>


                            <th scope="col" width="200px">Action</th>


                        </tr>


                    </thead>


                    <tbody>


                        <?php


                        include "Connection.php";


                        $conn = sqlsrv_connect( $serverName, $connectionInfo);



                        $tsql = "Select * From STOCK";


                        $stmt = sqlsrv_query( $conn, $tsql);



                        do {


                  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {                                  


                                ?>


                                <tr>


                                    <td><?= $row['kodebarang'];?></td>


                                    <td><?= $row['namabarang'];?></td>


                                    <td><?= $row['satuan'];?></td>


                                    <td>


     <a href="" class="badge badge-primary badge-pill tampilModalUbah"  


data-toggle="modal" data-target="#exampleModal"  


data-id="<?= $row['kodebarang'];?>" data-zurl="">Edit</a>


   <a href="hapus.php?kodebarang=<?= $row['kodebarang']; ?>"  


class="badge badge-primary badge-pill" 


 onclick="return confirm('Hapus data?');">Hapus</a>


                                    </td>


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


                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>


                    <button type="button" class="close" 


                    data-dismiss="modal" aria-label="Close">


                        <span aria-hidden="true">&times;</span>


                    </button>


                </div>


                <div class="modal-body">


                    <form action="simpan.php" method="POST"  


                     enctype="multipart/form-data">


                        <div class="form-group">


                            <label for="kodebarang">Kode Barang</label>


                            <input type="text" name="kodebarang"  


                           id="kodebarang" class="form-control" required="true">


                        </div>


                        <div class="form-group">


                            <label for="namabarang">Nama Barang</label>


                            <input type="text" name="namabarang"  


                           id="namabarang" class="form-control" required="true">


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



        $('.btnTambahData').on('click', function(){


            $('#exampleModalLabel').html('Tambah Data Barang');


            $('.modal-footer button[type=submit]').html('Simpan');


            $('.modal-body form').attr('action', 'simpan.php');


        });



        $('.tampilModalUbah').on('click', function(){


            $('#exampleModalLabel').html('Ubah Data Baranng');


            $('.modal-footer button[type=submit]').html('Ubah Data');


            $('.modal-body form').attr('action', 'update.php');



            const kodebarang = $(this).data('id');


            $.ajax({


                url: 'getdata.php',


                data: {kodebarang : kodebarang},


                method: 'post',


                dataType: 'json',


                success: function(data){


                    // alert(data[0].kodebarang);


                    $('#kodebarang').val(data[0].kodebarang);


                    $('#namabarang').val(data[0].namabarang);


                    $('#satuan').val(data[0].satuan);


                }


            });


        });



    })


    </script>


</body>


</html>