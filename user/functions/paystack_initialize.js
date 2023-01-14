function payWithPaystack(email, firstname, lastname, amount) {
  var handler = PaystackPop.setup({
    key: "pk_test_c6e2fb1e6d698739afb320138fce24df2a718c8d", // Replace with your public key
    email: email,
    amount: amount * 100,
    firstname: firstname,
    lastname: lastname,
    ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function () {
      // alert('Window closed.');
    },
    callback: function (response) {
      // window.location = "verify.php?reference=" + response.reference;
      window.location= "success.php?reference="+ response.reference;
    }
  });

  handler.openIframe();
}
