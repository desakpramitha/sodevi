<!doctype html>

<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".default_option").click(function() {
                $(this).parent().toggleClass("active");
            })

            $(".select_ul li").click(function() {
                var currentele = $(this).html();
                $(".default_option li").html(currentele);
                $(this).parents(".select_wrap").removeClass("active");
            })
        });
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif;
        }

        /* body{
        background: #fdc75b;
        color: #555555;
        } 

        .wrapper .title{
        font-weight: 700;
        font-size: 24px;
        color: #fff;
        }*/

        .select_wrap {
            width: 240px;
            margin: 0;
            position: relative;
            user-select: none;
        }

        .select_wrap .default_option {
            background: #fff;
            border-radius: 0px;
            position: relative;
            cursor: pointer;
            margin: auto;
        }

        .select_wrap .default_option li {
            padding: 5px 5px;
        }

        .select_wrap .default_option:before {
            content: "";
            position: absolute;
            top: 5px;
            right: 18px;
            width: 15px;
            height: 15px;
            border: 2px solid;
            border-color: transparent transparent blue blue;
            transform: rotate(-45deg);
        }

        .select_wrap .select_ul {
            position: absolute;
            top: 44px;
            left: 0;
            width: 100%;
            background: #fff;
            border-radius: 0px;
            display: none;
        }

        .select_wrap .select_ul li {
            padding: 10px 10px;
            cursor: pointer;
        }

        /* .select_wrap .select_ul li:first-child:hover{
        border-top-left-radius: 0 px;
        border-top-right-radius: 0 px;
        }

        .select_wrap .select_ul li:last-child:hover{
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
        } */

        .select_wrap .select_ul li:hover {
            background: lightblue;
            border-radius: 0px;
        }

        .select_wrap .option {
            display: flex;
            align-items: center;
        }

        .select_wrap.active .select_ul {
            display: block;
        }

        .select_wrap.active .default_option:before {
            top: 15px;
            transform: rotate(-225deg);
        }

        .bars i,
        .arrow i {
            padding: 0px 15px;
        }

        .tabel {
            max-width: 600px;
        }

        .content {
            margin: 30px 0px 0px 165px;
        }

        .tombol {
            display: flex;
            justify-content: end;
        }

        .topbar {
            max-width: 1200px;
            width: 100%;
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 30px;
            display: flex;
            justify-content: start;
        }

        @media only screen and (max-width: 800px) {
            .content {
                margin-left: 50px;
            }
        }

        @media only screen and (max-width: 600px) {
            .kanan .topbar {
                max-width: 400px;
                width: 100%;
            }

            .content {
                margin-left: 0px;
            }

            .tabel {
                max-width: 100px;
                width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            h6 {
                font-size: 12px;
            }

            /* .bars i, .arrow i{
                font-size : 24px;
                padding : 0px 0px;
            } */
        }
    </style>
    <title>SoDevi - Save Evaluation</title>
</head>
<html lang="en">

<div class="content p-4" style="height:auto;">
    <div class="tabel" style="width: 100%">
        <table class="table table-sm" style="margin-bottom: 40px">
            <thead class="table-borderless" style="color:grey">
                <tr>
                    <th>Application</th>
                    <th>Build State</th>
                </tr>
            </thead>
            <tbody class="table-bordered shadow-sm">
                <form action="<?= base_url('software_controller/insertAppBuild/') ?>" method="POST">
                    <!-- <tr>
                        <td width="50%">Value</td>
                        <td>3 july 2020</td>
                    </tr> -->
                    <tr>
                        <td>

                            <select name="APPLICATION_ID" class="form-control form-control-sm" id="appProductSelect" value="<?= $ap['APPLICATION_ID'] ?>">
                                <option value="">- CHOOSE APPLICATION -</option>
                                <?php foreach ($appProduct as $ap) : ?>
                                    <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <!-- <td>
                        <div class="select_wrap">
                            <ul class="default_option">
                                <li>
                                    <div class="option pizza">
                                        <h6>CHOOSE APPLICATION</h6>
                                    </div>
                                </li>
                            </ul>
                            <ul class="select_ul">
                                <php foreach ($appProduct as $ap) : ?>
                                    <li value="<= $ap['APPLICATION_ID'] ?>" class="border">
                                        <div class="option">
                                            <h6><= $ap['NAME'] ?> <= $ap['VERSION'] ?></h6>
                                        </div>
                                    </li>
                                <php endforeach; ?>
                            </ul>
                        </div>

                    </td> -->
                        <td>
                            <input class="form-control form-control-sm" type="date" name="BUILD_DATE"></input>
                            <!-- <div class="select_wrap">
                            <ul class="default_option">
                                <li>
                                    <div class="option pizza">
                                        <h6>Pizzas</h6>
                                    </div>
                                </li>
                            </ul>
                            <ul class="select_ul border">
                                <li>
                                    <div class="option pizza">
                                        <h6>Pizzas</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="option burger">
                                        <h6>Burget</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="option ice">
                                        <h6>Ice Cream</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="option fries">
                                        <h6>Fried Potatoes</h6>
                                    </div>
                                </li>
                            </ul>
                        </div> -->

                        </td>
                    </tr>
            </tbody>
        </table>

        <div class="tombol d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="border-radius: 10px; width: 200px" data-bs-toggle="modal" data-bs-target="#exampleModal">SAVE EVALUATION</button>
        </div>
        </form>
    </div>
</div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>