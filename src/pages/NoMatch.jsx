import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

function NoMatch() {  const navigate = useNavigate();
  useEffect(() => {
    navigate("/");
  });

  return <div>NoMatch</div>;
}

export default NoMatch;
