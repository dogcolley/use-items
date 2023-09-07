import { initializeApp } from "firebase/app";
import { getMessaging } from "firebase/messaging";
import * as auth from "firebase/auth";
import * as firestore from "firebase/firestore";

const firebaseConfig = {
  apiKey: "AIzaSyAlLkFWTnUqcnJ_T-Q91WSPB2LpIb_v9_I",
  authDomain: "news-a6f5f.firebaseapp.com",
  projectId: "news-a6f5f",
  storageBucket: "news-a6f5f.appspot.com",
  messagingSenderId: "1003646455194",
  appId: "1:1003646455194:web:62d519143428870a98be23",
  measurementId: "G-X6JEW9ZQXK"
};

const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

export { app, auth, firestore,messaging };