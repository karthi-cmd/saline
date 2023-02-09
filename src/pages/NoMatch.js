import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

function NoMatch() {
  const navigate = useNavigate();
  useEffect(() => {
    navigate("/");
  });

  return <h1>Page Not Found Error</h1>;
}

export default NoMatch;
