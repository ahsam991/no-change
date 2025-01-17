function validateForm() {
    const cardNumber = document.getElementById("card_number").value;
    const cvv = document.getElementById("cvv").value;

    if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        alert("Card number must be exactly 16 digits.");
        return false;
    }

    if (cvv.length !== 3 || isNaN(cvv)) {
        alert("CVC/CVV must be exactly 3 digits.");
        return false;
    }

    return true;
}
