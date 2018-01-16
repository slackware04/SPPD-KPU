$(document).ready(function()
{
	$("#submenu2").on('show.bs.collapse', function()
	{
		//alert('The collapsible content is about to be shown.');
		$("#submenu3").collapse("hide");
		$("#submenu4").collapse("hide");
		$("#submenu5").collapse("hide");
	});
	
	$("#submenu3").on('show.bs.collapse', function()
	{
		//alert('The collapsible content is about to be shown.');
		$("#submenu2").collapse("hide");
		$("#submenu4").collapse("hide");
		$("#submenu5").collapse("hide");
	});
	
	$("#submenu4").on('show.bs.collapse', function()
	{
		//alert('The collapsible content is about to be shown.');
		$("#submenu2").collapse("hide");
		$("#submenu3").collapse("hide");
		$("#submenu5").collapse("hide");
	});
	
	$("#submenu5").on('show.bs.collapse', function()
	{
		//alert('The collapsible content is about to be shown.');
		$("#submenu2").collapse("hide");
		$("#submenu4").collapse("hide");
		$("#submenu3").collapse("hide");
	});
	
	
	$("#biaya1").on('change', function()
	{
		//alert('asdf');
		var total_biaya = document.getElementsByClassName('total-biaya')[0].innerHTML;
		var biaya1 = document.getElementById('biaya1').value;
		var satuan1 = document.getElementById('satuan1').value;
		var biaya2 = document.getElementById('biaya2').value;
		var satuan2 = document.getElementById('satuan2').value;
		var biaya3 = document.getElementById('biaya3').value;
		var satuan3 = document.getElementById('satuan3').value;
		var biaya4 = document.getElementById('biaya4').value;
		var satuan4 = document.getElementById('satuan4').value;
		var biaya5 = document.getElementById('biaya5').value;
		var satuan5 = document.getElementById('satuan5').value;
		var biaya6 = document.getElementById('biaya6').value;
		var satuan6 = document.getElementById('satuan6').value;
		var biaya7 = document.getElementById('biaya7').value;
		var satuan7 = document.getElementById('satuan7').value;
		var biaya8 = document.getElementById('biaya8').value;
		var satuan8 = document.getElementById('satuan8').value;

		for(i=0; 1<8; i++)
		{
			document.getElementsByClassName('biaya')[i].innerHTML = total_biaya - (biaya1 * satuan1) - (biaya2 * satuan2);
		}
	});
	/*
	$("#biaya2").on('change', function()
	{
		//alert('asdf');
		var total_biaya = document.getElementsByClassName('total-biaya')[0].innerHTML;
		var biaya1 = document.getElementById('biaya2').value;
		var satuan1 = document.getElementById('satuan2').value;
		for(i=0; 1<8; i++)
		{
			document.getElementsByClassName('biaya')[i].innerHTML = total_biaya - (biaya1 * satuan1) - (biaya2 * satuan2) - (biaya3 * satuan3) - (biaya4 * satuan4) - (biaya5 * satuan5) - (biaya6 * satuan6) - (biaya7 * satuan7) - (biaya8 * satuan8);
		}
	});
	*/
	
});



