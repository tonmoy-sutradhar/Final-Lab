console.log("Hi I an connected.");
// Donate button added---->>
// document.getElementById("donate-btn").addEventListener("click", function () {
//   console.log("Donate button clicked");
// });
// // History button added----->>
// document.getElementById("history-btn").addEventListener("click", function () {
//   console.log("History button clicked");
// });

//---------------------------------->>>>>
//Donate for Noakhali---->>
document
  .getElementById("donateNokhai-btn")
  .addEventListener("click", function () {
    const noakhaliBalance = parseFloat(
      document.getElementById("noakhaliBlance").innerText
    );
    console.log(noakhaliBalance);

    const inputFielFordNokhaili = parseFloat(
      document.getElementById("inputFieldNokhaili").value
    );

    const newBalance = inputFielFordNokhaili + noakhaliBalance;
    console.log(newBalance);

    document.getElementById("noakhaliBlance").innerText = newBalance;
    inputFielFordNokhaili.value = "";
  });

//Donate for Feni---->>
document
  .getElementById("feniDonate-btn")
  .addEventListener("click", function () {
    const noakhaliBalance = parseFloat(
      document.getElementById("feniBalance").innerText
    );
    console.log(noakhaliBalance);

    const inputFielFordNokhaili = parseFloat(
      document.getElementById("feniInputField").value
    );

    const newBalance = inputFielFordNokhaili + noakhaliBalance;
    console.log(newBalance);

    document.getElementById("feniBalance").innerText = newBalance;
    inputFielFordNokhaili.value = "";
  });

//Donate for Movement---->>
document
  .getElementById("movementDoante-btn")
  .addEventListener("click", function () {
    const noakhaliBalance = parseFloat(
      document.getElementById("movementBalance").innerText
    );
    console.log(noakhaliBalance);

    const inputFielFordNokhaili = parseFloat(
      document.getElementById("movementInputFiled").value
    );

    const newBalance = inputFielFordNokhaili + noakhaliBalance;
    console.log(newBalance);

    document.getElementById("movementBalance").innerText = newBalance;
    inputFielFordNokhaili.value = "";
  });
