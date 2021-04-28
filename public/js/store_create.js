$(document).ready(function () {

	//$('#verify_otp_frm').hide();
	//$('#register_store_frm').hide();
	//$('#add_store_content_frm').hide();

	$(document).off('click', '#generate_otp');
	$(document).on('click', '#generate_otp', function () {

		var me = this;
		var myFormId = $(me).parents('form').attr('id');
		if ($('#' + myFormId).validationEngine('validate')) {
			$.post($('#' + myFormId).attr('action'), $('#' + myFormId).serializeArray(), function (retValData) {

				$(this).hide();

				jRetValData = $.parseJSON(retValData);
				console.log(jRetValData);
				if (jRetValData.status != 1) {

					var msg = jRetValData.msg;
					$('#mobile').validationEngine('showPrompt', msg, 'red', '', true);
					$(this).show();

				} else {
					var message = Array();
					message.messageType = 'success';
					message.message = 'OTP sent to your mobile number';
					showMessageOnDiv(message, '#msg_div');

					$('#mobile_verify').val(jRetValData.data.mobile);

					$('#' + myFormId).hide();
					$('#verify_otp_frm').removeClass('hide');
				}
			});
		}
	});

	$(document).off('click', '#verify_otp');
	$(document).on('click', '#verify_otp', function () {

		var me = this;
		var myFormId = $(me).parents('form').attr('id');
		if ($('#' + myFormId).validationEngine('validate')) {
			$.post($('#' + myFormId).attr('action'), $('#' + myFormId).serializeArray(), function (retValData) {

				$(this).hide();

				jRetValData = $.parseJSON(retValData);
				if (jRetValData.status != 1) {

					var msg = jRetValData.msg;
					$('#otp').validationEngine('showPrompt', msg, 'red', '', true);
					$(this).show();

				} else {

					$('#uid').val(jRetValData.data.uid);

					var message = Array();
					message.messageType = 'success';
					message.message = 'OTP verified successfully...';
					showMessageOnDiv(message, '#msg_div', 17000);

					$('#' + myFormId).hide();
					$('#register_store_frm').removeClass('hide');
				}
			});
		}
	});

	$(document).off('click', '#register_store');
	$(document).on('click', '#register_store', function () {

		$(this).hide();

		var me = this;
		var myFormId = $(me).parents('form').attr('id');
		if ($('#' + myFormId).validationEngine('validate')) {
			$.post($('#' + myFormId).attr('action'), $('#' + myFormId).serializeArray(), function (retValData) {

				jRetValData = $.parseJSON(retValData);
				if (jRetValData.status != 1) {

					var msg = jRetValData.msg;
					$('#store_name').validationEngine('showPrompt', msg, 'red', '', true);
					$(this).show();

				} else {

					$('#uid_stote').val(jRetValData.data.uid);

					var message = Array();
					message.messageType = 'success';
					message.message = 'Store created...<a target="_blank" href="' + jRetValData.data.store_uri + '" style="text-decoration: underline;">' + jRetValData.data.store_uri + '</a>';
					showMessageOnDiv(message, '#msg_div', 17000);

					$('#' + myFormId).hide();
					$('#add_store_content_frm').removeClass('hide');
				}
			});
		}
	});

	$(document).off('click', '#add_store_content');
	$(document).on('click', '#add_store_content', function () {

		var me = this;
		var myFormId = $(me).parents('form').attr('id');
		if ($('#' + myFormId).validationEngine('validate')) {
			$.post($('#' + myFormId).attr('action'), $('#' + myFormId).serializeArray(), function (retValData) {

				$(this).hide();

				jRetValData = $.parseJSON(retValData);
				if (jRetValData.status != 1) {

					var msg = jRetValData.msg;
					$('#content').validationEngine('showPrompt', msg, 'red', '', true);
					$(this).ahow();

				} else {

					var message = Array();
					message.messageType = 'success';
					message.message = $('#txt_msg').html()+'. <b>Content added on store...</b>';
					showMessageOnDiv(message, '#msg_div', 17000);

					$('#' + myFormId).hide();

				}
			});
		}
	});


});



