import React, { useState } from "react";
import { useContext } from "react";
import { useNavigate } from "react-router-dom";
import { UserContext } from "../contexts/ContextProvider";

function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const navigate = useNavigate();

  const { login } = useContext(UserContext);

  return (
    <div>
      <h1>Login</h1>
      <label>Email</label>
      <input
        placeholder="Email"
        onChange={(event) => {
          setEmail(event.target.value);
        }}
      />
      <label>Password</label>
      <input
        placeholder="Password"
        onChange={(event) => {
          setPassword(event.target.value);
        }}
      />
      <button
        onClick={() => {
          if (login(email, password)) {
            navigate("/");
          }
        }}
      >
        Submit
      </button>
    </div>
  );
}

export default Login;
