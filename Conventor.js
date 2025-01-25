// converter.js

document.addEventListener('DOMContentLoaded', function() {
    const amount = document.getElementById('amount');
    const fromCurrency = document.getElementById('fromCurrency');
    const toCurrency = document.getElementById('toCurrency');
    const convertBtn = document.getElementById('convertBtn');
    const result = document.getElementById('result');

    const exchangeRates = {
        USD: 1,
        EUR: 0.84,
        GBP: 0.72,
        JPY: 109.69,
        CAD: 1.21
    };

    for (const currency in exchangeRates) {
        const option1 = document.createElement('option');
        option1.value = currency;
        option1.textContent = currency;
        fromCurrency.appendChild(option1);

        const option2 = document.createElement('option');
        option2.value = currency;
        option2.textContent = currency;
        toCurrency.appendChild(option2);
    }

    convertBtn.addEventListener('click', function() {
        const fromRate = exchangeRates[fromCurrency.value];
        const toRate = exchangeRates[toCurrency.value];
        const convertedAmount = (amount.value / fromRate) * toRate;

        result.textContent = `${amount.value} ${fromCurrency.value} = ${convertedAmount.toFixed(2)} ${toCurrency.value}`;
    });
});