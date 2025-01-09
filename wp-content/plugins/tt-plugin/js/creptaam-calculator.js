/*
Author: TrendyTheme
Version: 1.0
*/
jQuery(function ($) {

    'use strict';

    (function () {

        const bodyEl = document.querySelector('body');
		const resultEl = document.querySelector('#result');
		const currencyFromSelect = document.querySelector('#currencyFrom');
		const amountFromInput = document.querySelector('#amountFrom');
		const currencyToSelect = document.querySelector('#currencyTo');

		let currencyFromValue = 'BTC';
		let amountFromValue = '1';
		let currencyToValue = 'USD';

		$(window).on('load', function () {
	        submit();
	    });

		currencyFromSelect.addEventListener('change', function() {
		    currencyFromValue = currencyFromSelect.value;
		    bodyEl.className = '';
		    bodyEl.classList.add(currencyFromSelect.value);
		    submit();
		});

		amountFromInput.addEventListener('change', function() {
		    amountFromValue = amountFromInput.value;
		    submit();
		});

		currencyToSelect.addEventListener('change', function() {
		    currencyToValue = currencyToSelect.value;
		    submit();
		});


		/**
		 * Multiplies two floats without losing precision.
		 */
		function multFloats(x, y) {
		    // debugger;
		    if (String(x).length > 1 && String(y).length > 1) {
		        const xP = String(x).split('.')[1].length;
		        const yP = String(y).split('.')[1].length;
		        const _x = x * (Math.pow(10, xP));
		        const _y = y * (Math.pow(10, yP));
		        return (_x * _y) / Math.pow(10, xP + yP);
		    } else {
		        return x * y;
		    }
		}

		/**
		 * Setup variables with result info and do request.
		 */

		function submit() {

			var getJSON = function(url, callback) {
			    var xhr = new XMLHttpRequest();
			    xhr.open('get', url, true);
			    xhr.responseType = 'json';
			    xhr.onload = function() {
			      var status = xhr.status;
			      if (status == 200) {
			        callback(null, xhr.response);
			      } else {
			        callback(status);
			      }
			    };
			    xhr.send();
			};

			getJSON('https://min-api.cryptocompare.com/data/price?fsym='+currencyFromValue+'&tsyms='+currencyToValue+'', function(err, data) {
			    if (err != null) {
			    	console.log('Error');
			    } else {
					const fromText = amountFromValue+currencyFromValue;
		            const inputAmount = parseFloat(amountFromValue);
		            const dataAmount = parseFloat(data[currencyToValue]);
		            const resultAmount = multFloats(inputAmount, dataAmount);
		            const toText = resultAmount;
		            result.innerText = toText;
	            }
			});
		}
    }());
});