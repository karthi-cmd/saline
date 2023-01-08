import React, { useLayoutEffect } from "react";
import { useNavigate } from "react-router-dom";
import { IsAuthenticated } from "../contexts/ContextProvider";

function Devices() {
  const navigate = useNavigate();

  useLayoutEffect(() => {
    if (!IsAuthenticated()) {
      navigate("/login");
    }
  }, []);
  return <div>Devices</div>;
}

export default Devices;
