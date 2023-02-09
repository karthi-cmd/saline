import React from "react";
import { Outlet, Navigate } from "react-router-dom";

const ProtectedRoute = ({ auth }) => {
  // let auths={'token':false}
  if (!auth) {
    return <Navigate to="/login" replace />;
  }
  return <Outlet />;
};
export default ProtectedRoute;
