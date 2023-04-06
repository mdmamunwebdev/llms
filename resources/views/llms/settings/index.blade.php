<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            padding: 15px;
            background: grey;
            width: 100%;
        }

        .row {
            display: flex;
            padding: 15px;
            background: red;
            justify-content: center;
        }

        .col-6 {
            width: 50%;
            padding: 5px;
            background: black;
        }

        .col-3 {
            width: 25%;
            background: grey;
            padding: 5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-3">
                        <label for="">name</label>
                    </div>
                    <div class="col-6">
                        <input type="text"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="">name</label>
                    </div>
                    <div class="col-6">
                        <input type="text"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="">name</label>
                    </div>
                    <div class="col-6">
                        <input type="text"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
