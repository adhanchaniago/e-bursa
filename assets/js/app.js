$(document).ready(function() {

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );

	$.fn.datepicker.language['en'] = {
		days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
		daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
		daysMin: ['Mi', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
		months: ['Januari','Februari','Maret','April','Mei','Juni', 'juli','Agustus','September','Oktober','November','Desember'],
		monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
	};

	$('#tanggal_lahir').datepicker({
		dateFormat: "yyyy-mm-dd",
		autoClose: true,
		language: 'en'
	});

	$('.tanggal_pl').datepicker({
		dateFormat: "yyyy-mm-dd",
		autoClose: true,
		language: 'en'
	});

	$('#tabel-data-user-akun').dataTable({
		responsive: true,
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		}
	});

	$('#tabel-data-pendidikan-formal').dataTable({
		responsive: true,
		info: false,
		searching: false,
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		}
	});

		$('#tabel-data-pendidikan-nonformal').dataTable({
			responsive: true,
			info: false,
			searching: false,
			language: {
				url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
			}
		});

	$('#tabel-data-pengalaman-kerja').dataTable({
		responsive: true,
		info: false,
		searching: false,
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
		}
	});

	tinymce.init({
		selector: '#konten',
		height: 300,
		theme: 'modern',
		plugins: [
		"advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste imagetools wordcount"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	});

});