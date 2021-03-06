    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            url: 'src/disciplina/modelo/listdisciplina.php',
            success: function(dados) {
                for (var i = 0; i < dados.length; i++) {
                    let resultado = `  <tr>
                    <td>${dados[i].id}</td>
                    <td>${dados[i].nome}</td>
                    <td>${dados[i].professor}</td>
                    <td>${dados[i].nota}</td>
                    <td>
                        <button id="${dados[i].id}" class="btn btn-danger btn-sm btn-view"><i class="mdi mdi-eye"></i></button>
                        <button id="${dados[i].id}" class="btn btn-danger btn-sm btn-edit"><i class="mdi mdi-pencil"></i></button>
                        <button id="${dados[i].id}" class="btn btn-danger btn-sm btn-delete"><i class="mdi mdi-trash-can"></i></button>
                    </td>
                </tr>`
                    $('tbody').append(resultado)
                }
                $('body').append('<script src="src/disciplina/controle/viewdisciplina.js"></script>')
                $('body').append('<script src="src/disciplina/controle/editardisciplina.js"></script>')
                $('body').append('<script src="src/disciplina/controle/deletedisciplina.js"></script>')

            }

        })
    })