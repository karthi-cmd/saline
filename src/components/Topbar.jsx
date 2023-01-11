import { onAuthStateChanged } from "firebase/auth";
// import React, { useLayoutEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useUserContext } from "../contexts/ContextProvider";
import { IsAuthenticated } from "../contexts/ContextProvider";
import { auth } from "../firebase-config";

export function Topbar() {
  const { isAuth, logout } = useUserContext;

  const navigate = useNavigate();

  

  return (
    <div>
      <Link to="/"> Home </Link>
      <Link to="/mydevices"> Devices </Link>
      {!isAuth ? (
        <Link to="/login">Log In</Link>
      ) : (
        <button
          onClick={() => {
            if (logout()) {
              navigate("/login");
            }
          }}
        >
          Log Out
        </button>
      )}
    </div>
  );
}
