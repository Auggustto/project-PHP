
// Função para atualizar a tabela de clientes
    function updateClientTable() {
      $.ajax({
        url: 'api.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          var rows = '';
          $.each(response, function(index, client) {
            rows += '<tr>';
            rows += '<td>' + client.id + '</td>';
            rows += '<td>' + client.name + '</td>';
            rows += '<td>' + client.email + '</td>';
            rows += '<td>';
            rows += '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="' + client.id + '">Editar</button> ';
            rows += '<button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="' + client.id + '">Excluir</button>';
            rows += '</td>';
            rows += '</tr>';
          });
          $('#clientTableBody').html(rows);
        }
      });
    }

    // Função para preencher o formulário de cliente para edição
    function fillClientForm(clientId) {
      $.ajax({
        url: 'api.php?id=' + clientId,
        type: 'GET',
        dataType: 'json',
        success: function(client) {
          $('#clientId').val(client.id);
          $('#name').val(client.name);
          $('#email').val(client.email);
        }
      });
    }

    // Função para limpar o formulário de cliente
    function clearClientForm() {
      $('#clientId').val('');
    }

    echo "edefdwef";
    
