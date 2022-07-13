const formatCurrency = (price, currency = 'VND') => {
    return price.toLocaleString('it-IT', {style : 'currency', currency : currency});
}

export { formatCurrency };
