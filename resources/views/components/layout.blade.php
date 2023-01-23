<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> 
    <title>Prova PHP IST</title>
</head>

<body>
{{$slot}}

 {{-- Primeira letra maiúscula --}}
 <script>
    var ignorar = ["das", "dos", "e", "é", "do", "da", "de"];
    function caixaAlta(string) {
        return String(string).toLowerCase().replace(/([^A-zÀ-ú]?)([A-zÀ-ú]+)/g, function(match, separator, word) {
            if (ignorar.indexOf(word) != -1) return separator + word;
            return separator + word.charAt(0).toUpperCase() + word.slice(1);
        });
    }
    function corrigirValor(el) {
        el.value = caixaAlta(el.value);
    }
</script>

{{-- Impedindo números no form de nome --}}
<script>
    var inputNome = document.querySelector("#nome");
    nome.addEventListener("keypress", function(e) {
        var keyCode = (e.keyCode ? e.keyCode : e.which);
        if (keyCode > 47 && keyCode < 58) {
            e.preventDefault();
        }
    });
</script>

{{-- máscara CPF --}}
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('cpf'), {
            mask: '000.000.000-00'
        }
    );
</script>
</body>
</html>
