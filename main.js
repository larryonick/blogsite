// Firebase Initialization script
// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyB_ilL5N14CLk3mXeCQC9IwngW8Gx0g99Y",
    authDomain: "contactformtut.firebaseapp.com",
    databaseURL: "https://contactformtut.firebaseio.com",
    projectId: "contactformtut",
    storageBucket: "contactformtut.appspot.com",
    messagingSenderId: "936984255580",
    appId: "1:936984255580:web:c74e3b7111de4a1b455a99",
    measurementId: "G-YWQCBSCZNS"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

var sendMessage = firebase.database().ref("messages");

document.getElementById("contactForm").addEventListener("submit", submitForm);

//submit form
function submitForm(e) {
    e.preventDefault();
    let name = getValue("name");
    let phone = getValue("phone");
    let email = getValue("email");
    let message = getValue("message");

    saveMessage(name, phone, email, message);
}

//get values
function getValue(id) {
    return document.getElementById(id).value;
}

//save message
function saveMessage(name, phone, email, message) {
    let save = sendMessage.push();
    save.set({
        name: name,
        phone: phone,
        email: email,
        message: message
    });
}