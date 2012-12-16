window.onload = function() {
	/* variables */
	"use strict";
	var bf = document.getElementById('MPLandedBookingForm');
	var bookingForm = {};
	var output = document.getElementById('output');
	var ajaxurl = document.getElementById("ajaxurl").value;
	var xhr = new CreateAjax({
		'successCallback' : onAJAXSuccess,
		'errorCallback' : onAJAXError,
		'responsePendingCallback' : onAJAXPending,
		'params' : {
			'output' : output
		}
	});
	bf.submit.onclick = submitClick;
	/* envoie la requete ajax */
	function sendAJAXRequest(xhr) {
		var params = "action=" + encodeURIComponent("booking_form") +"&params='blop'"+ "&data="
				+ encodeURIComponent(JSON.stringify(bookingForm));
		xhr.open("POST", ajaxurl);
		// Send the proper header information along with the request
		xhr.setRequestHeader("Content-Type",
				"application/x-www-form-urlencoded");
		xhr.send(params);
	}
	/** creer un objet AJAX , dï¿½fini les callbacks */
	function CreateAjax(params) {
		/** champs * */
		var xhr = new XMLHttpRequest();
		var HandleXhrResponse = function(successCallback, errorCallback,
				responsePendingCallback, params) {
			/** classe qui traite le changement d'ï¿½tat de la requï¿½te ajax * */
			var _successCallback = successCallback;
			var _errorCallback = errorCallback;
			var _responsePendingCallback = responsePendingCallback;
			var _params = params;
			return function() {
				console.log("handleXhrResponse");
				if (this.readyState == 4 && this.status == 200) {
					_successCallback(this, _params);

				} else if (this.readyState == 4 && this.status != 200) {
					_errorCallback(this, _params);
				} else {
					_responsePendingCallback(this, _params);
				}
			};
		};
		var defaultSuccessCallback = function() {
			console.log('ajax Success');
		};
		var defaultErrorCallback = function() {
			console.log('ajax Error');
		};
		var defaultPendingResponseCallback = function() {
			console.log('ajax response pending');
		};
		var _params = params || {};
		_params.successCallback = params.successCallback
				|| defaultSuccessCallback;
		_params.errorCallback = params.errorCallback || defaultErrorCallback;
		_params.defaultPendingResponseCallback = params.responsePendingCallback
				|| defaultPendingResponseCallback;
		_params.params = params.params || {};
		/** procedure* */
		xhr.onreadystatechange = HandleXhrResponse(_params.successCallback,
				_params.errorCallback, _params.responsePendingCallback,
				_params.params);
		return xhr;
	}
	/* traite l'envoi du formulaire */
	function submitClick() {
		console.log("submitClick");
		bookingForm = {};
		bookingForm = formToObject(bf);
		sendAJAXRequest(xhr);
		console.log(bookingForm);
		return false;
	}
	function onAJAXSuccess($ajax, $params) {
		if ($params.output) {
			$params.output.innerHTML = "Ajax request completed";
			console.log($ajax);
			//$params.output.innerHTML += "<p>" + $ajax.responseText + "</p>";
			var $response = JSON.parse($ajax.responseText);
			$params.output.innerHTML += JSON.stringify($response);
		}
	}
	function onAJAXError($ajax, $params) {
		if ($params.output) {
			$params.output.innerHTML = "Ajax request error";
		}
	}
	function onAJAXPending($ajax, $params) {
		if ($params.output) {
			$params.output.innerHTML = "Waiting for ajax response";
		}
	}
        /**
         *@return Object
         */
	function formToObject($form/* a HTML form object */) {
		/**
		 * utilitaire pour ï¿½viter les rï¿½ferences circulaires lors de l'envoi
		 * d'un formulaire sous forme JSON
		 * 
		 * @TODO implémenter les autres types d'entrées
		 */
		var $result = {};
		for ( var i in $form.elements) {/* pour tout ï¿½lï¿½ment de formulaire */
			if (!isNaN(i)) { /* si i est un nombre */
				if (/* si l'element est un checkbox et n'est pas cochï¿½ */
				($form[i].type == "checkbox" && !$form[i].checked)
						|| $form[i].value == "") {
					continue;
				}
				$result[$form[i].name] = $result[$form[i].name] || [];
				$result[$form[i].name].push($form[i].value);
			}
		}
		return $result;
	}
};
