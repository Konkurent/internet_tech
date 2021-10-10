<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Дз</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script defer src="/lesson_01/index.js"></script>

    <style>
        .row_block {
            margin-top: 100px;
            padding: 30px;
            border-radius: 10px;
            background-color: #cacaca;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="row_block">
        <div class="row mb-4">
            <div class="col-sm-2">
                <label class="col-form-label">Маска файлов</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя файла">
            </div>
            <div class="col-sm-3">
                <div class="col-auto">
                    <select class="form-select" id="autoSizingSelect" name="mask">
                        <option value="0">Маска в DOS-формате</option>
                        <option value="1">*.*</option>
                        <option value="2">?.?</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Текст файла</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="text" name="text" placeholder="Поиск текста внутри файла"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="btn">Поиск</button>
    </form>

    <div class="row" id="block">

    </div>
</div>

</body>
</html>