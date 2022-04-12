
$('document').ready(function(){
    $('#imprimer').hide();
	$('#produits').hide();
	$('#produits_ord').hide();
	$('#produits_ordo').hide();
	$('#commenter').hide();
    $('#consulter').show();
	$('#comment').hide();
	$('#traiter').hide();
	$('#voircommentaires').hide();
});
function showtextarea(){
	$('document').ready(function(){
			$('#consulter').hide();
			$('#produits').show();
			$('#produits_ord').show();
			$('#commenter').show();
			$('#imprimer').show();
			$('#comment').hide();
			$('#form').hide();
			$('#fa-sort').hide();
			$('#traiter').hide();
			$('#voircommentaires').hide();
	});
}

$('document').ready(function(){
		$('#textecommenter').hide();
});
$('document').ready(function(){
		$('#envoyer').hide();
});

$('document').ready(function(){
		$('#fa-sort').hide();
});

$('document').ready(function(){
		$('#fa').click(function(){
		    $('#form').hide();
		    $('#fa-sort').hide();
			$('#envoyer').hide();
		      $('#commenter').show();
 			$('#imprimer').hide();
		$('#comment').hide();
		$('#traiter').hide();
		$('#voircommentaires').hide();
		});
});
function textcomment(){

	$('document').ready(function(){
		     $('#imprimer').hide();
			$('#commenter').hide();
			$('#fa-sort').hide();
			$('#envoyer').show();
			$('#comment').hide();
			$('#produits').hide();
			$('#form').show();
			$('#textecommenter').show();
			$('#voircommentaires').show();
			$('#traiter').hide();

	});
	
}
   function commenter(){
	$('document').ready(function(){
	      	$('#textecommenter').show();
    	});
}

    function detail(){
	  $('document').ready(function(){
			$('#commenter').hide();
			$('#form').hide();
			$('#comment').hide();
			$('#imprimer').hide();
			$('#fa-sort').hide();
			$('#textecommenter').hide();
			$('#envoyer').hide();
			$('#produits').hide()
			$('#voircommentaires').hide();
			$('#traiter').show();
			
			
	});
}
function textimprimer(){
	$('document').ready(function(){
			$('#commenter').hide();
			$('#commentaire').hide();
			$('#imprimer').hide();
			$('#monModal').hide();
			$('#commentaires').hide();
			$('#success').hide();
			$('li').hide();
			$('#traiter').hide();
			$('#voircommentaires').hide();
			$('#modalcomment').hide();
			$('#modalcontain').hide();
			$('#modalfooter').hide();
			
	});
	var imp = document.getElementById('imprimer');
	var imprimer = document.getElementById('imp');
	var contenu = window.open('','_blank');
	contenu.document.open();
	contenu.document.write('<html><body onload="window.print()">' + imprimer.innerHTML + '<html>');
	contenu.document.close();
	
	}
   


