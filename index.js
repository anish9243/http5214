// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import {
  getDatabase,
  ref,
  child,
  get,
  onValue,
} from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyC8X_v5CrONFcqCBDyWLu_uDj2hV3d1IOA",
  authDomain: "workshop-http5214.firebaseapp.com",
  projectId: "workshop-http5214",
  storageBucket: "workshop-http5214.appspot.com",
  messagingSenderId: "667006930781",
  appId: "1:667006930781:web:3ed6b5c6991ab927c8a2b4",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

const database = getDatabase(app);
const message = ref(database, "messages");

onValue(message, (snapshot) => {
  const ul = document.getElementById("message");
  console.log(snapshot.val());

  snapshot.forEach((childSnapShot) => {
    console.log(childSnapShot.key);
    console.log(childSnapShot.val());

    let childData = childSnapShot.val();

    let text = document.createTextNode(childData.message);
    let li = document.createElement("li");

    li.appendChild(text);
    ul.appendChild(li);
  });
});
