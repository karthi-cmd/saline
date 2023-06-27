import { createContext, useContext, useEffect, useState } from "react";
import { auth } from "../firebase-config";
import {
  onAuthStateChanged,
  signInWithEmailAndPassword,
  signOut,
} from "firebase/auth";
// import { useNavigate } from "react-router-dom";

export const UserContext = createContext(null);

export const IsAuthenticated = () => {
  const { isAuth } = useContext(UserContext);
  return isAuth;
};

export const UserContextProvider = ({ children }) => {
  const [isAuth, setIsAuth] = useState(false);
  const [currentUser, setCurrentUser] = useState(null);

  // const navigate = useNavigate();

  useEffect(() => {
    onAuthStateChanged(auth, (user) => {
      if (user) {
        setCurrentUser(currentUser);
        setIsAuth(true);
      } else {
        setCurrentUser(null);
        setIsAuth(false);
      }
    });
  });

  const login = async (email, password) => {
    return await signInWithEmailAndPassword(auth, email, password)
      .then((userCredentials) => {
        console.log(userCredentials.user);
        setIsAuth(true);
        localStorage.setItem("isAuth", true);
        return true;
      })
      .catch((error) => {
        console.log(error.code);
        console.log(error.message);
        return false;
      });
  };

  const logout = async () => {
    return await signOut(auth)
      .then(() => {
        setIsAuth(false);
        localStorage.removeItem("isAuth");
        return true;
      })
      .catch((error) => {
        console.log(error.message);
        return false;
      });
  };

  const value = {
    isAuth,
    setIsAuth,
    currentUser,
    setCurrentUser,
    login,
    logout,
  };

  return <UserContext.Provider value={value}>{children}</UserContext.Provider>;
};

export const useUserContext = () => useContext(UserContext);
