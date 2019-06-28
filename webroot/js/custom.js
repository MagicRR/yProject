// Obliger les Required pour Safari

$("form").submit(function(e) {

var ref = $(this).find("[required]");

$(ref).each(function(){
    if ( $(this).val() == '' )
    {
        alert("Les champs marqués d'une * sont obligatoires");

        $(this).focus();

        e.preventDefault();
        return false;
    }
	});  return true;
});



// Initialize DataTable
var $table1 = jQuery( '.datatable' );

$table1.DataTable( {
	"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"bStateSave": true,
    "responsive": true,
    "aoColumnDefs" : [ { 'bSortable' : false, 'aTargets' : [ "no-sort" ] } ],
    "bLengthChange": true,
    "iDisplayLength": 25,
    "language": {
        "sProcessing": "Traitement en cours ...",
        "sLengthMenu": "Afficher _MENU_ lignes",
        "sZeroRecords": "Aucun résultat trouvé",
        "sEmptyTable": "Aucune donnée disponible",
        "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
        "sInfoEmpty": "Aucune ligne affichée",
        "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
        "sInfoPostFix": "",
        "sSearch": "Chercher :",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Chargement...",
        "oPaginate": {
            "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
        },
        "oAria": {
            "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
        }
    }
});

// Initalize Select Dropdown after DataTables is created
$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
	minimumResultsForSearch: -1
});
