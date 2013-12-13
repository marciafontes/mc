(function(){

	$('#regLater').on('click', function(){

		$('#formRegister').children().each(function(index, value){
			var emailComp = $(value).attr('id') === 'email';
			var cpfComp = $(value).attr('id') === 'cpf';

			if(!( emailComp || cpfComp))
				$(value).removeAttr('required');
		});
	});
})();