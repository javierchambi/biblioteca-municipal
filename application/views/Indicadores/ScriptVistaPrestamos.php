<script>
    $('#tablek').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                footer: true,
                title: 'Reporte de Prestamos',
                filename: 'Reporte',
                text: '<button class="btn btn-teal btn-lg">Descargar PDF</button>'
            }
        ],
        responsive: true,
        language: {
            searchPlaceholder: 'Buscar',
            sSearch: '',
            lengthMenu: '_MENU_ Registros',
        }
    });
</script>